<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportEvidence extends Model
{
    protected $fillable = [
        "type",
        "file_url",
        "report_id"
    ];

    public function report() {
        return $this->belongsTo(Report::class);
    }
}
