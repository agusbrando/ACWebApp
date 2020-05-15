<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ComportamientoController extends Controller
{
    public function index(){
        $users = User::all();
        return view('comportamiento.index', compact('users'));
    }
}
