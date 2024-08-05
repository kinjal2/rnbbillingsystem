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
 
    public function index() 
    {
         return view('citizenmain');
    }
    public saveRegistration(request $request )
    {

    }
 
}
