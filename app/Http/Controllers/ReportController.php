<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
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
            'status' => 'nullable|in:submitted,under_review,resolved,dismissed',
            'file_url' => 'required|file|mimes:jpg,jpeg,png,gif,mp4,mp3,pdf,doc,docx,wav,avi',
            'project_id' => 'required|integer|exists:projects,id',
        ]);

        DB::beginTransaction();
        
        try {
            $report = new Report();
            $report->title = $validated['title'];
            $report->description = $validated['description'];
            $report->type = $validated['report_type'];
            $report->project_id = $validated['project_id'];
            $report->save();

            $imagePath = $request->file('file_url')->store('reports', 'public');
            $validated['file_url'] = $imagePath;

            $report_evidence = new ReportEvidence();
            $report_evidence->type = $validated["evidence_type"];
            $report_evidence->file_url = $validated["file_url"];
            $report_evidence->report_id = $report->id;
            $report_evidence->save();

            $audit_log = new AuditLog();
            $audit_log->type = "Create";
            $audit_log->description = "Anonymous citizen submitted a discrepancy report.";
            $audit_log->entity_type = "Report";
            $audit_log->entity_id = $report->id;
            $audit_log->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response(['message' => 'Failed to create report', "error" => $e], 500);
        }

        Return response(['message' => 'Report created successfully', 'report' => $report, 'evidence' => $report_evidence, 'audit_log' => $audit_log], 201);
    }

    public function getAllReports() {
        $reports = Report::with(['project', 'evidences'])->get();

        return response($reports);
    }
}
