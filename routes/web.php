<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\NewConnectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BillGenerateController;
use App\Http\Controllers\BillCollectController;
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
Route::get('/dashboard', [RegistrationController::class, 'dashboard'])->name('dashboard');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/newtconnection', [NewConnectionController::class, 'index'])->name('newtconnection');
Route::get('/getcustomerlist', [NewConnectionController::class, 'getcustomerlist'])->name('getcustomerlist');
Route::get('/billgenrate/{id}', [NewConnectionController::class, 'billgenrate'])->name('billgenrate');
Route::post('/savenewconnection', [NewConnectionController::class, 'savenewconnection'])->name('savenewconnection');
Route::get('billcollection', [NewConnectionController::class, 'billcollection'])->name('billcollection');
//BillGenerateController
Route::get('/generatenewbill', [BillGenerateController::class, 'index'])->name('generatenewbill');
Route::Post('/savegenratenewbill', [BillGenerateController::class, 'savegenratenewbill'])->name('savegenratenewbill');
// serch custmor for bill collection 

Route::get('generate_pdf', [billcollectController::class, 'generate_pdf'])->name('generate_pdf');
Route::Post('serchcustomer', [NewConnectionController::class, 'serchcustomer'])->name('serchcustomer');
Route::Post('savepayment', [BillCollectController::class,'savepayment'])->name('savepayment');
Route::get('billcollect/{id}', [BillCollectController::class, 'index'])->name('index');
Route::get('logout', [RegisterController::class, 'Logout']);

