<?php

namespace App\Http\Controllers ;

use Illuminate\Http\Request ;

use App\Models\staff ;
use App\Models\transaction ;


class ShowStaffBalanceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $staffs         = staff::all()        ;
      $transactions   = NULL                ;
      $staff          = NULL                ;

      if(isset($request->staff)){
        $staff_id     = $request->staff        ;
        $staff        = staff::where('id', $staff_id)->first()        ;

      $transactions   = transaction::where('from_staff_id', $staff_id)->orwhere('to_staff_id', $staff_id)->get()  ;

      }

//            return $transactions ;


return view('report.show_staff_balance_details')->with('transactions', $transactions )->with('staffs', $staffs )->with('staff', $staff ) ;

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
