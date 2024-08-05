<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;
use App\Models\Customerdetail;
use App\Models\Billdetail;
use App\Models\Receipt;
class DashboardController extends Controller 
 {
    public function __construct()
   {
        $this->middleware( 'auth' );
        $this->_viewContent = [];
    }
    public function index( request $request )
    {
       
       $this->_viewContent['total_cust']= $count = Customerdetail::count(); 
       $this->_viewContent['total_recei']= $count = Receipt::where('fin_year',202122)->count(); 
       return view( \Config::get( 'app.theme' ) . '.dashboard.index', $this->_viewContent ); 
    }

    
}
