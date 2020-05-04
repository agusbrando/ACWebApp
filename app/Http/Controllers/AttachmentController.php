<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attachment;
use App\Models\Post;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = Attachment::all();
        return view('attachments.index', compact('attachments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attachments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'text' => 'required'
        ]);

        $post = new Post([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'text' => $request->get('text')
        ]);

        $post->save();

        if($request->hasfile('name'))
        {
            foreach($request->file('name') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(storage_path("app/attachments/".$post->id),$name);
                $attachment = new Attachment([
                    'name' => $request->get('name'),
                    'attachmentable_id' => $post->id,
                    'attachmentable_type' => Post::class
                ]);
            }
        }
        
        $attachment->save();
        return back()->with('success', 'Archivos subidos correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $attachment = Attachment::find($id);
        $attachment->delete();

        return redirect('/attachments')->with('success', '¡Attachment eliminado!');
    }
}
