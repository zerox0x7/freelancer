<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Show the services page.
     */
    public function index(): View
    {
        return view('services.index');
    }
} 