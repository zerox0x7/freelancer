<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CompetitionController extends Controller
{
    /**
     * Show the competitions page.
     */
    public function index(): View
    {
        return view('competitions.index');
    }
} 