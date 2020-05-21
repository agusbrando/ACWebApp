<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;
use App\Models\Attachments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        

        if (!$request->session()->has('user_permissions')) {
            $permissions = $request->user()->role->permissions->pluck('name')->toArray();
            $request->session()->put('user_permissions', $permissions);
            $request->session()->put('user_role', $request->user()->role->name);
        }

        //$posts = Post::all();
        for($i=1;$i<3;$i++) {
            $posts = Post::all()->where('id', $i);
        }

        //$comments = Comment::all();
        for($i=1; $i<3;$i++) {
            $comments = Post::all()->where('id', $i);
        }

        return view('home', compact('posts', 'comments'));
    }
}
