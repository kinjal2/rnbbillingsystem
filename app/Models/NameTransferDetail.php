<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameTransferDetail extends Model
{
    use HasFactory;
    protected $table="public.name_transfer_details";
    protected $fillable = [
        'cust_no',
        'full_name',
        'created_at',
        'updated_at',
        'status'
    ];

    // Define the timestamps if they are not managed by Eloquent
    public $timestamps = true;
}
