<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\staff ;
use App\Models\vehicle ;

class NewStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


         $staffs  = staff::all();
         $staff   = NULL;


if( isset($request->update) ){
  $staff = staff::where('id', $request->update )->first();
}


         return view('form.new_staff')->with('staff', $staff)->with('staffs', $staffs)   ;


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

// Return $request ;

                       $validatedData = $request->validate([
                           'name' => 'required',
                           'mobile' => 'required',
                        //   'acc_no' => 'required',
                        //    'acc_no' => 'required|unique:banks',


                       ]);


                  $staffs = staff::all();

    //       return back()->with('staffs', $staffs ) ;




if(isset($request->id)) {


staff::where('id', $request->id)->update([

  'status'      =>   $request->status     ,
  'join_date'   =>   $request->join_date  ,
  'name'        =>   $request->name       ,
  'f_name'      =>   $request->f_name    ,
  'nid'         =>   $request->nid       ,
  'driving_no'  =>   $request->d_licence ,
  'address'     =>   $request->address   ,
  'mobile'      =>   $request->mobile    ,
  'role'        =>   $request->role      ,
  'comment'     =>   $request->comment   ,

  'entry_by'           =>   \Auth::user()->id

]);

 // return $staff ;

   $staff = staff::where('id', $request->id )->first();

  return view('form.new_staff')->with('staff', $staff )->with('staffs', $staffs ) ;

}else{

  $task = new staff;

  $task->status      = $request->status    ;
  $task->join_date   = $request->join_date ;
  $task->name        = $request->name      ;
  $task->f_name      = $request->f_name    ;
  $task->nid         = $request->nid       ;
  $task->driving_no  = $request->d_licence ;
  $task->address     = $request->address   ;
  $task->mobile      = $request->mobile    ;
  $task->role        = $request->role      ;
  $task->comment     = $request->comment   ;

  $task->entry_by = \Auth::user()->id;
  $task->save();





}


                       $staffs = staff::all();

                return back()->with('staffs', $staffs ) ;

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
