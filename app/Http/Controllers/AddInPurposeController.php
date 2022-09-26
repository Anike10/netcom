<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\in_purpose ;

class AddInPurposeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


      public function index()
      {

                   $in_purposes = in_purpose::all();




          return view('form.in_purpose')->with('in_purposes', $in_purposes );
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


                             $validatedData = $request->validate([
                                 'in_purpose' => 'required','unique'
                                 

                             ]);



                //  return $request->all();



                             $task = new in_purpose;

                             $task->in_purpose        = $request->in_purpose ;
                             $task->entry_by = \Auth::user()->id;
                             $task->save();



                             $in_purposes = in_purpose::all();

                      return back() ;



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
