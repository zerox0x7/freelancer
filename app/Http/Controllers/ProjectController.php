<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index(): View
    {
        return view('projects.index');
    }

    /**
     * Display a listing of the user's projects.
     */
    public function myProjects(): View
    {
        return view('projects.my');
    }

    /**
     * Show the form for creating a new project.
     */
    public function create(): View
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'min_budget' => 'required|numeric',
            'max_budget' => 'required|numeric|gte:min_budget',
            'category_id' => 'required|exists:categories,id',
        ]);

        // TODO: Create the project
        
        return redirect()->route('projects.my')->with('success', 'تم إنشاء المشروع بنجاح');
    }

    /**
     * Display the specified project.
     */
    public function show(string $id): View
    {
        // TODO: Fetch the project
        
        return view('projects.show', [
            'project' => null, // Replace with actual project
        ]);
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(string $id): View
    {
        // TODO: Fetch the project
        
        return view('projects.edit', [
            'project' => null, // Replace with actual project
        ]);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'min_budget' => 'required|numeric',
            'max_budget' => 'required|numeric|gte:min_budget',
            'category_id' => 'required|exists:categories,id',
        ]);

        // TODO: Update the project
        
        return redirect()->route('projects.my')->with('success', 'تم تحديث المشروع بنجاح');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // TODO: Delete the project
        
        return redirect()->route('projects.my')->with('success', 'تم حذف المشروع بنجاح');
    }
} 