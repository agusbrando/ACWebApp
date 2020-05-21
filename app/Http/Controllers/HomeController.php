<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Attachment;
use App\Models\User;

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

        $posts = Post::all();
        $users = User::all();
        $comments = Comment::all();

        return view('home', compact('posts', 'users', 'comments'));
    }
}
