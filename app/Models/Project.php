<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "title",
        "description",
        "budget",
        "contractor",
        "start_date",
        "end_date",
        "status",
        "created_by"
    ];

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function evidences() {
        return $this->hasMany(ProjectEvidence::class);
    }
}
