<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\trip ;
use App\Models\staff ;
use App\Models\vehicle ;


class NewTripController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }






    public function index()
    {
         $trips     = trip::all();
         $staffs    = staff::all();
         $vehicles  = vehicle::all();

// return $staffs ;

        return view('form.new_trip')->with('trips', $trips ) ->with('vehicles', $vehicles) ->with('staffs', $staffs );



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


                           // 'email' => 'unique:clients', // unique:table name
                           // 'facebook' => 'unique:clients',
                           'from_date'        => 'required',
                           'driver_id'        => 'required',
                           'helper_id'        => 'required',

                       ]);







                       $task = new trip;

                       $task->from_date   = $request->from_date     ;
                       $task->to_date     = $request->to_date       ;
                       $task->driver_id   = $request->driver_id     ;
                       $task->helper_id   = $request->helper_id     ;
                       $task->vehicle_id  = $request->vehicle_id    ;
                       $task->comment     = $request->comment       ;

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

                       $trips     = trip::all();
              // return $staffs ;

              $staffs    = staff::all();
              $vehicles  = vehicle::all();

                       return back()->with('trips', $trips ) ->with('vehicles', $vehicles) ->with('staffs', $staffs );





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
