<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\NewConnectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BillGenerateController;
use App\Http\Controllers\BillCollectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CTPBillCollectionController;
use App\Http\Controllers\CitizenController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::get('/departmentlogin', [RegistrationController::class, 'apiLogin'])->name('departmentlogin');
Route::post('/designationselection', [RegistrationController::class, 'designationselection'])->name('designationselection');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/', function () {
    return view('welcome');
})->middleware('prevent.clickjacking')->name('main');//->middleware(GlobalErrorHandling::class); Route::middleware(['prevent.clickjacking'])->group(function ()
/*Route::get('/test-error', function () {
    abort(500);
});*/ 
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/newtconnection', [NewConnectionController::class, 'index'])->name('newtconnection');

Route::get('/getcustomerlist', [NewConnectionController::class, 'getcustomerlist'])->name('getcustomerlist');
Route::post('/getcustomerlist1', [NewConnectionController::class, 'getcustomerlist1'])->name('getcustomerlist1');

Route::get('/billgenrate/{cust_no}', [NewConnectionController::class, 'billgenrate'])->name('billgenrate');
Route::post('/savenewconnection', [NewConnectionController::class, 'savenewconnection'])->name('savenewconnection');
//BillGenerateController
Route::get('/generatenewbill', [BillGenerateController::class, 'index'])->name('generatenewbill');
Route::Post('/savegenratenewbill', [BillGenerateController::class, 'savegenratenewbill'])->name('savegenratenewbill');
// serch custmor for bill collection 

Route::get('generate_pdf/{id}', [billcollectController::class, 'generate_pdf'])->name('generate_pdf');
Route::get('generate_pdf1/{id}', [billcollectController::class, 'generate_pdf1'])->name('generate_pdf1');
Route::Post('serchcustomer', [NewConnectionController::class, 'serchcustomer'])->name('serchcustomer');
Route::Post('savepayment', [BillCollectController::class,'savepayment'])->name('savepayment');
Route::get('billcollect/{id}', [BillCollectController::class, 'index'])->name('index');
Route::get('/generateragister', [BillCollectController::class,'generateRagister'])->name('generateragister');
Route::post('/generateRagister1', [BillCollectController::class,'generateRagister1'])->name('generateRagister1');
Route::get('logout', [RegisterController::class, 'Logout']);
//ctp 
Route::POST('makepayment', [CTPBillCollectionController::class,'makepayment'])->name('makepayment');
Route::get('payment_handshake', [CTPBillCollectionController::class,'payment_handshake'])->name('payment_handshake');
Route::get('payment_handshake1', [CTPBillCollectionController::class,'payment_handshake'])->name('payment_handshake1');


Route::group(['middleware' => ['auth']], function() {
Route::get('billcollection', [NewConnectionController::class, 'billcollection'])->name('billcollection');

});

//citizan login
Route::get('/citizenlogin', [CitizenController::class, 'index'])->name('citizenlogin');
Route::Post('/saveregistration', [CitizenController::class, 'saveRegistration'])->name('saveregistration');
Route::Post('/userlogin', [CitizenController::class, 'userLogin'])->name('userlogin');
Route::get('/citizenlogout', [CitizenController::class, 'citizenlogout'])->name('citizenlogout');

Route::get('/citizendetails', [CitizenController::class, 'citizenDetails'])->name('citizendetails')->middleware('valid.user');
Route::get('/bill/{cust_no}', [CitizenController::class, 'showDetails'])->name('bill.show')->middleware('valid.user');



