<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function createReport(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'type' => 'required|in:bribery,nepotism,theft,quality_violation',
            'status' => 'nullable|in:submitted,under_review,resolved,dismissed',
            'priority' => 'nullable|in:low,medium,high',
            'project_id' => 'nullable|exists:projects,id',
        ]);
        
        $report = Report::create($validated);

        Return response(['message' => 'Report created successfully', 'report' => $report], 201);
    }

    public function getAllReports() {
        $reports = Report::with('project.evidences')->get();

        return response($reports);
    }
}
