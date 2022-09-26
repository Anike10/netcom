<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\vehicle ;

class AddVehicleController extends Controller
{


  public function __construct()
  {
      $this->middleware('auth');
  }






    public function index()
    {

                 $vehicles = vehicle::all();




        return view('form.add_vehicle')->with('vehicles', $vehicles );
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


                     // 'email' => 'unique:clients', // unique:table name
                     // 'facebook' => 'unique:clients',
                     'brand'    => 'required',
                     'model'    => 'required',
                     'number'   => 'required',
                     'capacity' => 'required'

                 ]);



  //  return $request->all();



                 $task = new vehicle;

                 $task->brand     = $request->brand     ;
                 $task->model     = $request->model     ;
                 $task->number    = $request->number    ;
                 $task->type      = $request->type    ;
                 $task->capacity  = $request->capacity  ;
                 $task->comment   = $request->comment   ;



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


                 $vehicles = vehicle::all();

// return $vehicles ;


                 return back()->with('vehicles',$vehicles ) ;








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
