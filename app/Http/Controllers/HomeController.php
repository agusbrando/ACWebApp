<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }
}
