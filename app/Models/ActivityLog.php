<?php

// app/Models/ActivityLog.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = ['user_id', 'description', 'subject_type', 'subject_id', 'properties', 'ip_address'];
    protected $table = 'master.activity_logs';
    protected $casts = [
        'properties' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->morphTo();
    }
}
