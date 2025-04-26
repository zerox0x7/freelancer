<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    /**
     * Show the messages page.
     */
    public function index(): View
    {
        return view('messages.index');
    }
} 