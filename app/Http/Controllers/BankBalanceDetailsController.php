<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankTransaction;


use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BankBalanceDetailsController extends Controller

{

       public function __construct()
       {
           $this->middleware('auth');
       }


       // $users = DB::table('users')
       //             ->join('contacts', 'users.id', '=', 'contacts.user_id')
       //             ->join('orders', 'users.id', '=', 'orders.user_id')
       //             ->select('users.*', 'contacts.phone', 'orders.price')
       //             ->get();


      public function index()
      {

DB::enableQueryLog();

$joins =  DB::select (' SELECT account, ex_type, NULL as income_type, date, amount FROM expenditure_details UNION SELECT account,NULL as ex_type, income_type,date, amount FROM income_details; ') ;

// return $joins ;



$income_union = DB::table("income_details")
->select('account', 'date', 'income_type', DB::raw("NULL as ex_type")) ;
                ;


$income_expenditure_union = DB::table("expenditure_details")
->select('account', 'date',  DB::raw("NULL as income_type"), 'ex_type' )
    ->union($income_union)
    ->get();


return $income_expenditure_union ;






$ex =  DB::table('expenditure_details')->get() ;

return $ex->last() ;





  //  return "index" ;
  $banks = Bank::all();


  return view("admin.report.bank_balance_details")->with('banks',$banks ) ;


      }




  }
