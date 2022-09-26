<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\party ;

class AddPartyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


      public function index()
      {

                   $partys = party::all();




          return view('form.add_party')->with('partys', $partys );
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
                                 'name' => 'required',
                                 'mobile' => 'required',
                              //   'acc_no' => 'required',
                              //    'acc_no' => 'required|unique:banks',


                             ]);



                //  return $request->all();



                             $task = new party;

                             $task->name        = $request->name ;

                             $task->address     = $request->address;
                             $task->mobile      = $request->mobile;
                             $task->type        = $request->type;

                             $task->comment     = $request->comment;
                             $task->entry_by = \Auth::user()->id;
                             $task->save();



                             $partys = party::all();

                      return back()->with('partys', $partys ) ;



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
