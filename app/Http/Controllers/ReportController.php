<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\ReportEvidence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function createReport(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'report_type' => 'required|in:bribery,nepotism,theft,quality_violation,delayed',
            'evidence_type' => 'required|in:image,video,document,audio',
            'status' => 'required|in:submitted,under_review,resolved,dismissed',
            'priority' => 'nullable|in:low,medium,high',
            'file_url' => 'required|image',
        ]);

        DB::beginTransaction();
        
        try {
            $report = new Report();
            $report->title = $validated['title'];
            $report->description = $validated['description'];
            $report->type = $validated['report_type'];
            $report->status = $validated['status'];
            $report->priority = $validated['priority'];
            $report->save();

            $imagePath = $request->file('file_url')->store('reports', 'public');
            $validated['file_url'] = $imagePath;

            $report_evidence = new ReportEvidence();
            $report_evidence->type = $validated["evidence_type"];
            $report_evidence->file_url = $validated["file_url"];
            $report_evidence->report_id = $report->id;
            $report_evidence->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response(['error' => 'Failed to create report', $e], 500);
        }
        
        $report = Report::create($validated);

        Return response(['message' => 'Report created successfully', 'report' => $report, 'evidence' => $report_evidence], 201);
    }

    public function getAllReports() {
        $reports = Report::with(['project, evidences'])->get();

        return response($reports);
    }
}
