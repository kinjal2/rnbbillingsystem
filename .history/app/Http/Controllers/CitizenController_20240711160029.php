<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator, Response;

class CitizenController extends Controller
{
    public function __construct() 
    {
     
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
    public function saveRegistration(request $request)
    {
        $rules = [
            'plot_area' => 'required|string',
        ];
        $validator = Validator::make( $request->all(), $rules );
        if ( $validator->fails() ) {
            return redirect( 'newtconnection' )
            ->withInput()
            ->withErrors( $validator );
        } else {
            $data = $request->input();
        }

    }
 
}
