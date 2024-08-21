<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filelist extends Model
{
    use HasFactory;
    protected $table = 'public.file_lists';
    protected $fillable = [
        'cust_no',
        'file_name',
        'rev_id',
        'mimetype',
        'doc_id',
        'document_id',
    ];

}
