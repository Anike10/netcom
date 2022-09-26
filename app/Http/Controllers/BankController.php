<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
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
        // return "Index" ;

//  return "index" ;
$banks = Bank::all();
return view("form.add_bank")->with('banks',$banks ) ;


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

    // return $request->all();


                 $validatedData = $request->validate([
                     'b_name' => 'required',
                     'acc_name' => 'required',
                  //   'acc_no' => 'required',
                  //    'acc_no' => 'required|unique:banks',


                 ]);



    //  return $request->all();



                 $task = new Bank;

                 $task->b_name    = $request->b_name;
                 $task->acc_name  = $request->acc_name;
                 $task->acc_no    = $request->acc_no;
                 $task->comments  = $request->comments;

                 $task->entry_by = \Auth::user()->id;
                 $task->save();


                 //
                 // if(Input::hasFile('file')){
                 //
                 //     $file = Input::file('file');
                 //     $file->move('uploads/client_photos', $request->N_ID .'.jpg');
                 //
                 // }
                 //
                 //
                 // $client 		= client::where('id',$task->id)->first();
                 // $clients 		= client::get();
                 // //    return $clients ;


                 $banks = Bank::all();
                 return back()->with('banks',$banks ) ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bank_details  $bank_details
     * @return \Illuminate\Http\Response
     */
    public function show(bank_details $bank_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bank_details  $bank_details
     * @return \Illuminate\Http\Response
     */
    public function edit(bank_details $bank_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bank_details  $bank_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bank_details $bank_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bank_details  $bank_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(bank_details $bank_details)
    {
        //
    }
}
