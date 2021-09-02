<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billdetail extends Model {
    use HasFactory;
    protected $table = 'public.bill_details';
   
    /**
     * Get the post that owns the comment.
     */
    public function customerdetail()
    {
        return $this->belongsTo(Customerdetail::class);
    }
}
