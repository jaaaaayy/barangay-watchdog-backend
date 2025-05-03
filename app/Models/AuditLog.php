<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = [
        "type",
        "description",
        "entity_type",
        "entity_id",
        "user_id"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
