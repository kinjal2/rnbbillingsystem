<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customerdetail extends Model Model implements Authenticatable {
    use HasFactory;
    protected $table = 'customer_details';
    protected $primaryKey = 'cust_no';
    protected $casts = [
        'cust_no' => 'integer',
    ];
    protected $fillable = [ 
        'cust_no', 'mobile_no', 'email_id', 'password'
    ];
    public static  function customer_number( $sector_number ) {
        $cust = Customerdetail::select( 'cust_no' )
        ->where( 'sector_no', $sector_number )
        ->orderBy( 'cust_no', 'DESC' )
        ->first();
        if ( $cust == null ) {
            if ( $sector_number > 10 ) {
                $cust_no = $sector_number.'0001';
            } else {
                $cust_no = '0'.$sector_number.'0001';
            }

        } else {
            $cust = $cust->cust_no + 1 ;
            if ( $sector_number > 10 ) {
                $cust_no =  $cust;
            } else {
                $cust_no = '0'. $cust;
            }
        }
        return $cust_no;
    }
    public function Billdetail()
    {
        return $this->hasMany(Billdetail::class);
    }
}
