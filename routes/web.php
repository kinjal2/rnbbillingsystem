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
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
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
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/newtconnection', [NewConnectionController::class, 'index'])->name('newtconnection');
    // Add other routes here
});


Route::get('/', function () { //dd("fghgfh");
    return view('welcome');
})->middleware('prevent.clickjacking')->name('main');//->middleware(GlobalErrorHandling::class); Route::middleware(['prevent.clickjacking'])->group(function ()
/*Route::get('/test-error',function () {
    abort(500);
});*/
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/newtconnection', [NewConnectionController::class, 'index'])->name('newtconnection')->middleware('auth');

Route::get('/getcustomerlist', [NewConnectionController::class, 'getcustomerlist'])->name('getcustomerlist')->middleware('auth');
Route::post('/getcustomerlist1', [NewConnectionController::class, 'getcustomerlist1'])->name('getcustomerlist1')->middleware('auth');

Route::get('/billgenrate/{cust_no}', [NewConnectionController::class, 'billgenrate'])->name('billgenrate')->middleware('auth');
Route::get('/viewdetails/{cust_no}', [NewConnectionController::class, 'viewDetails'])->name('viewdetails')->middleware('auth');
Route::post('/savenewconnection', [NewConnectionController::class, 'savenewconnection'])->name('savenewconnection')->middleware('auth');
//03-08-2024
Route::get('/namechangerequest', [NewConnectionController::class, 'NameChangeRequest'])->name('namechangerequest')->middleware('auth');
Route::post('/serchcustomerno', [NewConnectionController::class, 'SerchCustomerNo'])->name('serchcustomerno')->middleware('auth');
Route::Post('serchcustomer', [NewConnectionController::class, 'serchcustomer'])->name('serchcustomer')->middleware('auth');
Route::get('/viewdoc/{cust_no}/{doc_id}', [NewConnectionController::class, 'viewDocument'])->name('viewdoc');





//BillGenerateController
Route::get('/generatenewbill', [BillGenerateController::class, 'index'])->name('generatenewbill');
Route::Post('/savegenratenewbill', [BillGenerateController::class, 'savegenratenewbill'])->name('savegenratenewbill');
// serch custmor for bill collection

Route::get('generate_pdf/{id}', [billcollectController::class, 'generate_pdf'])->name('generate_pdf');
Route::get('generate_pdf1/{id}', [billcollectController::class, 'generate_pdf1'])->name('generate_pdf1');

Route::Post('savepayment', [BillCollectController::class,'savepayment'])->name('savepayment');
Route::get('billcollect/{id}', [BillCollectController::class, 'index'])->name('index');
Route::get('/generateragister', [BillCollectController::class,'generateRagister'])->name('generateragister');
Route::post('/generateRagister1', [BillCollectController::class,'generateRagister1'])->name('generateRagister1');
Route::get('logout', [RegistrationController::class, 'logout']);
//ctp
//ctp
Route::POST('makepayment', [CTPBillCollectionController::class,'makepayment'])->name('makepayment');
Route::post('payment_handshake', [CTPBillCollectionController::class, 'payment_handshake'])->name('payment_handshake');

//Route::get('payment_handshake', [CTPBillCollectionController::class,'payment_handshake'])->name('payment_handshake');
//Route::get('payment_handshake1', [CTPBillCollectionController::class,'payment_handshake'])->name('payment_handshake1');

Route::POST('payment_response', [CTPBillCollectionController::class,'payment_response'])->name('payment_response');

Route::group(['middleware' => ['auth']], function() {
Route::get('billcollection', [NewConnectionController::class, 'billcollection'])->name('billcollection');

});

//citizan login
//Route::get('/citizenlogin', [CitizenController::class, 'index'])->name('citizenlogin');
Route::get('/citizenlogin', [CitizenController::class, 'citizenlogin'])->name('citizenlogin');
Route::get('/citizenregistration', [CitizenController::class, 'citizenregistration'])->name('citizenregistration');

Route::Post('/saveregistration', [CitizenController::class, 'saveRegistration'])->name('saveregistration');
Route::Post('/userlogin', [CitizenController::class, 'userLogin'])->name('userlogin');
Route::get('/citizenlogout', [CitizenController::class, 'citizenlogout'])->name('citizenlogout');

Route::get('/citizendetails', [CitizenController::class, 'citizenDetails'])->name('citizendetails')->middleware('valid.user');
Route::get('/bill/{cust_no}', [CitizenController::class, 'showDetails'])->name('bill.show')->middleware('valid.user');
Route::get('reload-captcha', [CitizenController::class, 'reloadCaptcha'])->name('reload-captcha');
Route::get('/clear-cache', function () {
    try {
        // Clear the application cache
        Artisan::call('cache:clear');
        Log::info('Application cache cleared.');

        // Clear the route cache
        Artisan::call('route:clear');
        Log::info('Route cache cleared.');

        // Clear the configuration cache
        Artisan::call('config:clear');
        Log::info('Configuration cache cleared.');

        // Clear the view cache
        Artisan::call('view:clear');
        Log::info('View cache cleared.');

        // Optionally clear compiled files
        Artisan::call('optimize:clear');
        Log::info('Compiled files cleared.');

        // Redirect with a success message
        return redirect()->back()->with('message', 'All caches cleared successfully!');
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error clearing caches: ' . $e->getMessage());

        // Redirect with an error message
        return redirect()->back()->with('error', 'Failed to clear caches: ' . $e->getMessage());
    }
})->name('clear.cache');



