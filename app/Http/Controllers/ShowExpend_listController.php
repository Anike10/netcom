<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\trip_detail ;
use App\Models\ex_purpose ;
use App\Models\vehicle ;

class ShowExpend_listController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

  //  return  1111 ;
        $trip_details         = trip_detail::get();
        $vehicles             = vehicle::get();
        $ex_purpose           = ex_purpose::get();
  //          return $trip_details ;
  return view('report.show_expend_list')
            ->with('trip_details', $trip_details )
            ->with('vehicles', $vehicles )
            ->with('ex_purpose',$ex_purpose) ;
    }





    public function ex_purpose_details(Request $request)
    {

//  return 2222 ;
//  return $request->purpose ;

$from_date         = $request->from_date ;
$to_date          = $request->to_date ;

$ex_purpose = $request->purpose ;



if(isset($request->purpose)){
// Pupose এরে আকারে আনা হয়েছে

      $trip_details = trip_detail::
                    where('ex_purpose',$request->purpose)
                    ->whereBetween('date', [$from_date, $to_date])
                    ->get();


}else{
        $trip_details = NULL;


}

$ex_purpose     = ex_purpose::get();
$vehicles       = vehicle::get();

// return $Vehicles ;

//     return $trip_details ;
return view('report.show_expend_details')
          ->with('trip_details', $trip_details )
          ->with('vehicles',  $vehicles )
          ->with('r_vehicle',  $request->vehicle )
          ->with('r_purpose',  $request->purpose )
          ->with('from_date',  $from_date )
          ->with('to_date',  $to_date )
          ->with('ex_purpose',$ex_purpose) ;

    }










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
