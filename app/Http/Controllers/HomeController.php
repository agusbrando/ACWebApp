<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

    public function __construct(Request $request)
    {
        $this->middleware('auth');

            $user = Auth::user();
            if($user != null){
                $notifications = $user->unreadNotifications;
                $countNotifications = $user->unreadNotifications->count();
            }else{
                $notifications = [];
                $countNotifications = 0;
            }

            $request->session()->put('notifications', $notifications);
            $request->session()->put('countNotifications', $countNotifications);





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

        foreach($posts as $post) {
            $post->user=$post->user;
            //$comment->post=$comment->post;
        }

        return view('home', compact('posts', 'comment'));
    }
}
