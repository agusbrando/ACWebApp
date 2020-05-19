<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Attachment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required',
            'text' => 'required'
        ]);

        $post = new Post([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'text' => $request->get('text')
        ]);

        $post->save();

        $attachment = null;

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
        
        if($attachment != null) {
            $attachment->save();
        }
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
        $post = Post::find($id);
        $attachments = $post->attachmentablements;
        $comments = Comments::all();
        return view('posts.show', compact('post', 'attachments', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
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
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        $post = Post::find($id);

        $post->user_id = $request->get('user_id');
        $post->title = $request->get('title');
        $post->text = $request->get('text');

        $post->save();
        return redirect('/posts')->with('success', '¡Post actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', '¡Post borrado!');
    }
}
