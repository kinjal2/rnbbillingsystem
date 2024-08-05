<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinYearMaster extends Model
{
    use HasFactory;

    protected $table="master.fin_year_master";
    protected $primaryKey ="fin_year";
}
