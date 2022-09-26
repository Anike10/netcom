<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ex_purpose ;

class AddExPurposeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


      public function index()
      {

                   $ex_purposes = ex_purpose::all();




          return view('form.ex_purpose')->with('ex_purposes', $ex_purposes );
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
                                 'ex_purpose' => 'required','unique'

                             ]);



                //  return $request->all();



                             $task = new ex_purpose;

                             $task->ex_purpose        = $request->ex_purpose ;
                             $task->entry_by = \Auth::user()->id;
                             $task->save();



                             $ex_purposes = ex_purpose::all();

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
