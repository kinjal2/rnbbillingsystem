<?php // app/Helpers/ActivityLogger.php
namespace App\Helpers;

use App\Models\ActivityLog;

class ActivityLogger
{
    public static function log($description, $subject = null, $properties = [])
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'description' => $description,
            'subject_type' => $subject ? get_class($subject) : null,
            'subject_id' => $subject ? $subject->id : null,
            'properties' => $properties,
        ]);
    }
}
