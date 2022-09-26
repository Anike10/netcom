<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project ;
use App\Models\party ;


class NewProjectController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }






    public function index()
    {




$parties  = party::all();
$projects     = project::all();



return view('form.new_project')->with('projects', $projects )->with('parties', $parties );




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

//    return $request->all();


//    return $request->date  .  $request->clint_id   . $request->address . $request->map_location . $request->comment         ;



                       $validatedData = $request->validate([


                           // 'email' => 'unique:clients', // unique:table name
                           // 'facebook' => 'unique:clients',
                           'date'             => 'required',
                           'clint_id'         => 'required',
                           'address'          => 'required'

                       ]);







                       $task = new project;


                       $task->date          = $request->date           ;
                       $task->party_id      = $request->clint_id        ;
                       $task->address       = $request->address         ;
                       $task->map_location  = $request->map_location    ;
                       $task->comment       = $request->comment         ;

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

                       $parties  = party::all();
                       $projects     = project::all();



                       return view('form.new_project')->with('projects', $projects )->with('parties', $parties );



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
