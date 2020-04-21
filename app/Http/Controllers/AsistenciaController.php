<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index(){
        $users = User::all();
        return view('asistencia.index', compact('users'));
    }
}
