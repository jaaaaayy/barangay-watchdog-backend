<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function getAllAuditLogs() {
        $auditLogs = AuditLog::with('user')->get();

        return response($auditLogs);
    }
}
