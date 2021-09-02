<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
Use Redirect;

class RegisterController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
    * Where to redirect users after registration.
    *
    * @var string
    */

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct() {
        $this->middleware( 'guest' );
    }

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */

    protected function validator( array $data ) {

        if ( !\Session::get( 'uid' ) ) {
            return Validator::make( $data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],

            ] );

        } else {
            return Validator::make( $data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            ] );
        }
    }

    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\User
    */
    protected function create( array $data ) {

        // dd( \Session::get( 'uid' ) );
        if ( !\Session::get( 'uid' ) ) {
            return User::create( [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make( $data['password'] ),
                'date_of_birth'=>$data['birthdate'],
                'designation'=>$data['designation'],
                'office'=>$data['officename'],
                'designation'=>$data['mobile'],
            ] );
        } else {

            return User::create( [
                'is_admin'=>1,
                'usercode'=>\Session::get( 'uid' ),
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make( 'test@123' ),

            ] );

        }

    }

    public function logout( Request $request ) {
        \Auth::logout();
        return redirect()->route( 'login' );
    }
}
