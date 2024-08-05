<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitizenController extends Controller
{
    public function __construct() {
     
         $this->_viewContent = [];
     }
 
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 
     public function index() {
         return view( \Config::get( 'app.theme_path' ) . '.newconnection.manage' );
 
     }
 
}
