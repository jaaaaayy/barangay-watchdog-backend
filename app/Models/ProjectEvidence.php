<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEvidence extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "type",
        "file_url",
        "project_id",
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
