<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


          public function __construct()
          {
              $this->middleware('auth');
          }





    public function index()
    {
      //  return "index" ;
      $banks_t  = transaction::whereNotNull('from_acc')->whereNotNull('to_acc')->latest()->first();

// return $banks_t ;

      $banks    = Bank::all();
      return view("form.bank_transaction")->with('banks_t',$banks_t )->with('banks',$banks ) ;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    //    return $request->all();

                         $validatedData = $request->validate([
                             'from_acc'   => 'required',
                             'to_acc'     => 'required',
                          //   'acc_no' => 'required',
                              'amount' => 'integer',


                         ]);



      //      return $request->all();



                         $task = new transaction;

                         $task->date      = $request->date;
                         $task->amount    = $request->amount;
                         $task->to_acc    = $request->to_acc;
                         $task->from_acc  = $request->from_acc;
                         $task->type      = 'transaction';

                         $task->comment   = $request->comment;
                         $task->entry_by = \Auth::user()->id;
                         $task->save();







        //  return "index" ;
        $banks_t  = transaction::all();
        $banks    = Bank::all();
    //    return view("admin.form.bank_transaction")->with('banks_t',$banks_t )->with('banks',$banks ) ;
        return back()->with('banks_t',$banks_t )->with('banks',$banks ) ;



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(BankTransaction $bankTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(BankTransaction $bankTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankTransaction $bankTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankTransaction  $bankTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankTransaction $bankTransaction)
    {
        //
    }
}
