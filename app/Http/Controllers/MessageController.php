<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    private $user;

    public function __construct(){

        $this->user = User::find(1);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
       

        $messages = $this->user->messagesSent;
        
        //TODO review afterlogin
        //$user = User::find(1);
        // $messages = $user-> Nombre de la funcion que los conecte
        //  $messages = Message::all();
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();

        return view('messages.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'users'=>'required',
            'title'=>'required',
            'text'=>'required'
        ]);

        $message = new Message([
            'user_id' => $this->user->id,
            'title' => $request->get('title'),
            'text' => $request->get('text')
        ]);
        $message->save();
        $users=$request->get('users');
       
        foreach ($users as $user) {
            User::find($user)->messagesReceive()->attach($message->id);

        }
if($request->hasfile('image')){
        $imageName = time().'.'.$request->image->extension();  
   

        $request->image->move(storage_path("app/messages/$message->id"), $imageName);
    }

//storage/app/messages/id_messages/files

        return redirect('/messages')->with('success', 'Message Send!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);

        return view('messages.show',compact('message'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
