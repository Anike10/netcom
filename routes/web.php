<?php

use App\Http\Controllers\NewStaffController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddVehicleController;
use App\Http\Controllers\ShowVehiclesController;
use App\Http\Controllers\ShowStaffsController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BankTransactionController;
use App\Http\Controllers\AddPartyController;
use App\Http\Controllers\AddInPurposeController;
use App\Http\Controllers\AddExPurposeController;
use App\Http\Controllers\ShowPartiesController;
use App\Http\Controllers\ShowBanksController;
use App\Http\Controllers\ShowExpend_listController;
use App\Http\Controllers\ShowStaffsBalanceController;
use App\Http\Controllers\NewStaffPaymentController;
use App\Http\Controllers\ShowStaffBalanceDetailsController;
use App\Http\Controllers\NewProjectController;
use App\Http\Controllers\ShowProjectsController;
use App\Http\Controllers\QuotationController;


use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

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

// Route::get('/', function () {     return view('welcome'); });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::resource('/dashboard',HomeController::class);
    // Route::get('/dashboard', function () {   return view('dashboard'); })->name('dashboard');
    // Route::get('/news', function () {   return view('dashboard'); })->name('dashboard');

    Route::resource('/home',HomeController::class);
    Route::resource('/contact',HomeController::class);

    Route::resource('/add_vehicle',AddVehicleController::class);

    Route::resource('/show_vehicles',ShowVehiclesController::class);
    Route::resource('/show_staffs',ShowStaffsController::class);
    Route::resource('/show_projects',ShowProjectsController::class);

    Route::resource('/new_project',NewProjectController::class);

    Route::resource('/add_bank',BankController::class);

    Route::resource('/bank_transaction',BankTransactionController::class);

    Route::resource('/bank_balance',BankBalanceController::class);

    Route::resource('/new_staff',NewStaffController::class);

    Route::resource('/',NewProjectController::class);

    Route::resource('/new_trip',NewTripController::class);

    Route::resource('/trip_advance',TripAdvanceController::class);

    Route::resource('/add_party',AddpartyController::class);
    Route::resource('/in_type',AddInPurposeController::class);
    Route::resource('/ex_type',AddExPurposeController::class);

    Route::resource('/show_parties',ShowpartiesController::class);
    Route::resource('/bank_list',ShowBanksController::class);
    Route::resource('/ex_list',ShowExpend_listController::class);
    Route::resource('/quotation', QuotationController::class);

    Route::resource('/staff_balance_details',ShowStaffBalanceDetailsController::class);
    Route::resource('/staff_payment',NewStaffPaymentController::class);

    Route::get('/expend_type',[ShowExpend_listController::class, 'ex_purpose_details']);


  });

// $new_staff = 'add_staff' ;
//
// Route::resource( $new_staff ,HomeController::class)->middleware('auth');
