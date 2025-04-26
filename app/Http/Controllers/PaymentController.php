<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the user's payments.
     */
    public function index(): View
    {
        return view('payments.index');
    }
} 