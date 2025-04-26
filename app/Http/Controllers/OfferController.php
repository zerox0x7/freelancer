<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OfferController extends Controller
{
    /**
     * Display a listing of the user's offers.
     */
    public function myOffers(): View
    {
        return view('offers.my');
    }

    /**
     * Store a newly created offer in storage.
     */
    public function store(Request $request, string $projectId): RedirectResponse
    {
        $validated = $request->validate([
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
            'delivery_time' => 'required|integer|min:1',
        ]);

        // TODO: Create the offer
        
        return redirect()->route('projects.show', $projectId)->with('success', 'تم تقديم العرض بنجاح');
    }
} 