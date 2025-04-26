<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Display the user's account settings page.
     */
    public function settings(): View
    {
        return view('account.settings');
    }
} 