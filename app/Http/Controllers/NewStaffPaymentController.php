<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\staff ;
use App\Models\Bank ;
use App\Models\transaction ;


class NewStaffPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $banks = bank::get();
       $staffs = staff::get();
       $staff = NULL ;

       if(isset($request->staff)){
         $staff_id = $request->staff ;

         $staff = staff::where('id', $staff_id)->first();

       }


return view('form.staff_payment')->with('staffs',$staffs)->with('staff',$staff)->with('banks', $banks ) ;

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
        $validatedData = $request->validate([


            // 'email' => 'unique:clients', // unique:table name
            // 'facebook' => 'unique:clients',
            'staff_id'        => 'required',
            'date'           => 'required',
            'bank'           => 'required',
            'amount'         => 'required',


        ]);


// return $request->all();




        $task = new transaction;

        $task->type                = 'salary'              ;
        $task->date                = $request->date        ;
        $task->to_staff_id         = $request->staff_id    ;
        $task->from_acc            = $request->bank        ;
        $task->amount              = $request->amount      ;
        $task->comment             = $request->comment     ;
        $task->entry_by            = \Auth::user()->id     ;
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

        $staff_id   = $request->staff ;
        $staff      = staff::where('id', $staff_id)->first();

        $staffs     = staff::get();
        $banks      = bank::get();


  //      return $trip ;


  return back()->with('staffs', $staffs )->with('staff', $staff )->with('banks', $banks ) ;




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
