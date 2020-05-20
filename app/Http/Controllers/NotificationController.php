<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Attachment;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;




class NotificationController extends Controller
{

public function index()
    {
        $user = Auth::user();

        return view('notifications.index', compact('user'));
    }
}
