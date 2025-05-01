<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    protected $fillable = [
        "type",
        "file_url",
        "description",
        "project_id",
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
