<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotasPorcentagesController extends Controller
{
    public function index()
    {
        return view('NotesPercentages.index');
    }
}
