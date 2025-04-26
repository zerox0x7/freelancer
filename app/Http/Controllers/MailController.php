<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MailController extends Controller
{
    /**
     * Show the mail inbox page.
     */
    public function index(): View
    {
        return view('mail.index');
    }
} 