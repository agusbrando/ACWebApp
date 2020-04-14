<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class NotasPorcentagesController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('NotesPercentages.index', compact('users'));
    }
}
