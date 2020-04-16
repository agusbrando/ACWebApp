<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DesgloseController extends Controller
{
    public function index(){
        $titulo = "Examen";
        $users = User::all();
        return view('Notas.desglose', compact('users','titulo'));
    }
}
