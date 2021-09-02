<?php
//Use Session;
use App\Models\Sector;

function printLastQuery() {
    ini_set( 'xdebug.var_display_max_depth', 5 );
    ini_set( 'xdebug.var_display_max_children', 256 );
    ini_set( 'xdebug.var_display_max_data', -1 );
    $queries = \DB::getQueryLog();
    dd( $queries );
}
if ( !function_exists( 'getSector' ) ) {
    function getSector()
 {
        $sectorlist = Sector::get();

        $quarterdetails = [];
        foreach ( $sectorlist as $q )
 {

            $quarterdetails[$q->id] = $q->name;
        }
        return $quarterdetails;
    }
}
if ( !function_exists( 'paymentStatus' ) ) {
        function paymentStatus()
 {
            $yesno = [];
            $yesno = ['C' => 'Cash', 'B' => 'Bank','D'=>'Demand Draft'];
            return $yesno;
        }
    }
