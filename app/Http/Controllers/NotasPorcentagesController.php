<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;

class NotasPorcentagesController extends Controller
{
    public function index()
    {
        $users = User::all();
        $subjects = Subject::all();
        return view('NotesPercentages.index', compact('users', 'subjects'));
    }
}
