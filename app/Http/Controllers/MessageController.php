<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Attachment;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (URL::current() == url("/messages_send")) {

            $messages = $user->messagesSent;
        } else {
            $messages = $user->messagesReceive;
        }

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('messages.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'filenames' => 'required',
            'users' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $message = new Message([
            'user_id' => $user->id,
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);
        $message->save();
        $users = $request->get('users');

        foreach ($users as $user) {
            User::find($user)->messagesReceive()->attach($message->id);
        }

            if($request->hasfile('filenames'))
             {
                foreach($request->file('filenames') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $file->move(storage_path("app/messages/$message->id"), $name);

                   $attachment = new Attachment([
                    'name' => $name,
                    'attachmentable_id' => $message->id,
                    'attachmentable_type' => Message::class

                   ]);
                    $attachment->save();
                }
             }



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
        $message = Message::all()->load('attachments');

        return view('messages.show', compact('message'));
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
