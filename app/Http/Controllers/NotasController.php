<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;

class NotasController extends Controller
{
    public function index()
    {
        $users = User::all();
        $subjects = Subject::all();
        return view('Notas.index', compact('users', 'subjects'));
    }
}
