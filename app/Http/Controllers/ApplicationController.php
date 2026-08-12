<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        $today = today();

        $applications = Application::query()
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest('applied_at')->get();

        $interviewReminders = Application::query()
            ->whereNotNull('interview_on')
            ->whereBetween('interview_on', [$today, $today->copy()->addDays(2)])
            ->orderBy('interview_on')
            ->get();

        $stats = [
            'total' => Application::count(),
            'applied' => Application::where('status', 'applied')->count(),
            'interview' => Application::where('status', 'interview')->count(),
            'offer' => Application::where('status', 'offer')->count(),
            'rejected' => Application::where('status', 'rejected')->count(),
        ];

        return view('applications.index', compact('applications', 'status', 'stats', 'interviewReminders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('applications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'applied_at' => 'required|date',
            'status' => 'required|in:applied,interview,offer,rejected',
            'current_ctc' => 'nullable|numeric',
            'expected_ctc' => 'nullable|numeric',
            'location' => 'nullable|string|max:255',
            'interview_on' => 'nullable|date',
            'notice_period' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        try {
            Application::create($validatedData);

            return redirect()->route('applications.index')->with('success', 'Application created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create application: '.$e->getMessage()])->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application): View
    {
        return view('applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $validatedData = $request->validate([
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'applied_at' => 'required|date',
            'status' => 'required|in:applied,interview,offer,rejected',
            'current_ctc' => 'nullable|numeric',
            'expected_ctc' => 'nullable|numeric',
            'location' => 'nullable|string|max:255',
            'interview_on' => 'nullable|date',
            'notice_period' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        try {
            $application->update($validatedData);

            return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update application: '.$e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        try {
            $application->delete();

            return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete application: '.$e->getMessage()]);
        }
    }
}
