<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\trip ;
use App\Models\transaction ;
use App\Models\bank ;

class TripAdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
// return 1 ;
                 if(isset($request->trip)){
                   $trip_id = $request->trip ;
                   $trip = trip::where('id', $trip_id)->first();

                 } else {
                 $trip = NULL ;
                 }
// return $trip ;
 // return $request ;

       $trips = trip::get();
       $banks = bank::get();


 //      return $trip ;


 return view('form.trip_advance')->with('trips', $trips )->with('trip', $trip )->with('banks', $banks ) ;

}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return 1 ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                             $validatedData = $request->validate([


                                 // 'email' => 'unique:clients', // unique:table name
                                 // 'facebook' => 'unique:clients',
                                 'trip_id'        => 'required',
                                 'date'           => 'required',
                                 'bank'           => 'required',
                                 'amount'         => 'required',


                             ]);


// return $request->all();




                             $task = new transaction;

                             $task->type                = 'advance'             ;
                             $task->date                = $request->date        ;
                             $task->to_trip_id          = $request->trip_id     ;
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

                             $trip_id = $request->trip ;
                             $trip = trip::where('id', $trip_id)->first();

                             $trips = trip::get();
                             $banks = bank::get();


                       //      return $trip ;


                       return back()->with('trips', $trips )->with('trip', $trip )->with('banks', $banks ) ;






    }



    public function show($id)
    {
return 1 ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
return 1 ;
    }



    public function update(Request $request, $id)
    {
return 1 ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
return 1 ;
    }
}
