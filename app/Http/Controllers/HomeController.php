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

        $post1 = Post::select('created_at')->where('id', 1)->get();
        $post2 = Post::select('created_at')->where('id', 2)->get();
        $post3 = Post::select('created_at')->where('id', 3)->get();
        
        //$comment = Comment::select('text')->where('id', 1)->get();

        return view('home', compact('post1', 'post2', 'post3'));
    }
}
