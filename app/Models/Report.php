<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "title",
        "description",
        "type",
        "status",
        "priority",
    ];

    public function evidences() {
        return $this->hasMany(ReportEvidence::class);
    }
}
