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
   function getMenu(){
    $activeMenu = \Config::get('menu.superadmin');
   $permitted_menu = [];
        foreach ($activeMenu as $menukey => $menuitem) {
           // if (isset($permissions[$menukey])) {
             $permitted_menu[$menukey] = $menuitem;
               
                    if (empty($menuitem['submenu']) === false) {
                        foreach ($menuitem['submenu'] as $subkey => $submenu) {
                          
                                $permitted_menu[$menukey]['submenu'][$subkey] = $submenu;
                           
                        }
                    }
              //  }
            
        }
        return $permitted_menu;
//$activeMenu = array_intersect_key($activeMenu, array_filter($permissions));
}
function checkRequestIs($request_array) {
    $is = '';
	
    if (empty($request_array) === false) {
        foreach ($request_array as $uri) {
			
            if (Request::is($uri)) {
                $is = 'mm-active';
                break;
            }
        }
    }
  
}
// 26_07_2024 function for financial year
if ( !function_exists( 'getFinYear' ) ) 
{
    function getFinYear()
    {
        $fin_year_list=DB::table('master.fin_year_master')->orderBy('fin_year', 'desc')->get();
        $finYearDetails=[];
        foreach ( $fin_year_list as $f )
        {
            $finYearDetails[$f->fin_year] = $f->fin_year;
        }
        return $finYearDetails;
    }
}





   
   
