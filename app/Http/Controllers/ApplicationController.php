<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');

        $applications = Application::query()
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->latest('applied_at')->get();

        $stats = [
            'total' => Application::count(),
            'applied' => Application::where('status', 'applied')->count(),
            'interview' => Application::where('status', 'interview')->count(),
            'offer' => Application::where('status', 'offer')->count(),
            'rejected' => Application::where('status', 'rejected')->count(),
        ];

        return view('applications.index', compact('applications', 'status', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
