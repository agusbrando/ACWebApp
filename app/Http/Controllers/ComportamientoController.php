<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ComportamientoController extends Controller
{

    public function __construct(Request $request)
    {
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

    public function index(){
        $users = User::all();
        return view('comportamiento.index', compact('users'));
    }
}
