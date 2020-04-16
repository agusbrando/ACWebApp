<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EvaluacionesController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Notas.evaluations', compact('users'));
    }
}
