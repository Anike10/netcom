<?php

//      আপডেট ট্রিপ অনেক অনেক কাজ করবে, কাজেই এইটা পড়া দরকার
//      এইবারে ট্রানজাকশন টেবিল পুরোপুরি আপডেট হবে না
//      ট্রিপ থেকে পাওনা টাকা মূল ক্যাশ একাউন্টে পাওনা হিসাবে মানে from_acc > to trip_id তে যাবে
//      অন্য ফরম থেকে পরে আপডেট হবে




namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\trip ;
use App\Models\trip_detail ;
use App\Models\transaction ;
use App\Models\in_purpose ;
use App\Models\ex_purpose ;

class UpdateTripController extends Controller
{



    public function index(Request $request)
    {





                if(isset($request->trip)){
                  $trip_id          = $request->trip ;
                  $trip             = trip::where('id', $trip_id)->first();
                  // $trip_details     = DB::table('trip_details')->where('trip_id', $trip_id)->get() ;
                  //
                  //       return $trip_details ;
                  $in_purposes = in_purpose::get();
                  $ex_purposes = ex_purpose::get();


                  $advance = transaction::where('to_trip_id', $trip_id)->where('type', 'advance')->sum('amount');
      //            return $advance ;
                } else {
                $trip = NULL ;
                $advance = 0 ;

                $in_purposes = NULL;
                $ex_purposes = NULL;



                }
// return $request ;

      $trips            = trip::get();
      $parties          = DB::table('parties')->get() ;

if(isset($request->print)){
  return view('print.print_trip') ->with('trips', $trips )->with('parties', $parties )
                                  ->with('in_purposes', $in_purposes )->with('ex_purposes', $ex_purposes)
                                  ->with('trip', $trip )->with('advance', $advance ) ;

}

$update = NULL ;

if(isset($request->update)){ $update = $request->update ; }

      return view('form.update_trip') ->with('trips', $trips )->with('parties', $parties )
                                      ->with('in_purposes', $in_purposes )->with('ex_purposes', $ex_purposes)
                                      ->with('update', $update )
                                      ->with('trip', $trip )->with('advance', $advance ) ;

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

//     return $request ;

//        Return $request->to_date_normal ;


$to_date          =   $request->to_date_normal        ;
$status           =   0                               ;
$km              =    0                               ;
$fuel            =    0                               ;

if(isset($request->to_date_final)){

   $to_date         =   $request->to_date_final  ;
   $status          =   $request->status         ;
   $km              =   $request->km             ;
   $fuel            =   $request->fuel           ;

}




// if Status is not 0 then not able to update

if(DB::table('trips')->where('id', $request->trip_id )->first()->status  != 0 ){ return back();  }





//    return $request->to_date_normal ;


// transaction::where('type', $request->income_trip_details_id[$i])


// return transaction::where('type', "driver_commition" ) ;




// এটা ট্রানজাকশন ফাংশন কাজ করলে সব করবে, একটা সমস্যা হলে কিছুই করবে না
DB::transaction(function () use ($request, $to_date , $status, $km, $fuel) {


trip::where('id', $request->trip_id)->update([


  'to_date'            =>   $to_date                 ,
  'status'             =>   $status                  ,
  'km'                 =>   $km                      ,
  'fuel'               =>   $fuel                    ,
  'commition_per'      =>   $request->com_per        ,
  'com_amount'         =>   $request->commition      ,
  'com_driver'         =>   $request->com_driver     ,
  'com_helper'         =>   $request->com_helper     ,
  'allowance'          =>   $request->allowance      ,
  'allow_driver'       =>   $request->allow_driver   ,
  'allow_helper'       =>   $request->allow_helper   ,
  'balance'            =>   $request->balance        ,
  'advance'            =>   $request->advance        ,
  'receivable'         =>   $request->receivable     ,
  't_income'           =>   $request->t_income       ,
  't_expend'           =>   $request->t_expend       ,

  'entry_by'           =>   \Auth::user()->id

]);



// ড্রাইভার হেলপারের কমিশন ও এলাউন্স এন্ট্রি বা আপডেট হবে



if( count(transaction::where('type', "driver_commition" )->where('to_trip_id', $request->trip_id  )->get()) > 0   ){


  transaction::where('type', "driver_commition" )->where('to_trip_id', $request->trip_id  )->update([

    'from_staff_id'          =>   $request->driver_id                           ,
    'date'                   =>   $request->to_date_normal                      ,
    'amount'                 =>   $request->com_driver                          ,
    'entry_by'               =>   \Auth::user()->id


  ]);

}else{

$task = new transaction;

  $task->type                   =   "driver_commition"                            ;
  $task->to_trip_id             =   $request->trip_id                             ;
  $task->from_staff_id          =   $request->driver_id                           ;
  $task->date                   =   $request->to_date_normal                      ;
  $task->amount                 =   $request->com_driver                          ;
  $task->entry_by               =   \Auth::user()->id                             ;
  $task->save();

}


if( count(transaction::where('type', "helper_commition" )->where('to_trip_id', $request->trip_id  )->get()) > 0   ){

  transaction::where('type', "helper_commition" )->where('to_trip_id', $request->trip_id  )->update([

    'from_staff_id'          =>   $request->helper_id                          ,
    'date'                   =>   $request->to_date_normal                      ,
    'amount'                 =>   $request->com_helper                           ,
    'entry_by'               =>   \Auth::user()->id

  ]);

}else{

  $task = new transaction;

    $task->type                   =   "helper_commition"              ;
    $task->to_trip_id             =   $request->trip_id               ;
    $task->from_staff_id          =   $request->helper_id             ;
    $task->date                   =   $request->to_date_normal        ;
    $task->amount                 =   $request->com_helper            ;
    $task->entry_by               =    \Auth::user()->id              ;
    $task->save();
    }


    if( count(transaction::where('type', "driver_allowance" )->where('to_trip_id', $request->trip_id  )->get()) > 0   ){
      transaction::where('type', "driver_allowance" )->where('to_trip_id', $request->trip_id  )->update([

        'from_staff_id'          =>   $request->driver_id                           ,
        'date'                   =>   $request->to_date_normal                      ,
        'amount'                 =>   $request->allow_driver                           ,
        'entry_by'               =>   \Auth::user()->id

      ]);

    }else{

    $task = new transaction;

      $task->type                   =   "driver_allowance"               ;
      $task->to_trip_id             =   $request->trip_id                ;
      $task->from_staff_id          =   $request->driver_id              ;
      $task->date                   =   $request->to_date_normal         ;
      $task->amount                 =    $request->allow_driver          ;
      $task->entry_by               = \Auth::user()->id                  ;
      $task->save();

      }

  if( count(transaction::where('type', "helper_allowance" )->where('to_trip_id', $request->trip_id  )->get()) > 0   ){
        transaction::where('type', "helper_allowance" )->where('to_trip_id', $request->trip_id  )->update([

          'from_staff_id'          =>   $request->helper_id                           ,
          'date'                   =>   $request->to_date_normal                      ,
          'amount'                 =>   $request->allow_helper                           ,
          'entry_by'               =>   \Auth::user()->id

        ]);

      }else{

      $task = new transaction;

        $task->type                   =   "helper_allowance"               ;
        $task->to_trip_id             =   $request->trip_id                ;
        $task->from_staff_id          =   $request->helper_id              ;
        $task->date                   =   $request->to_date_normal         ;
        $task->amount                 =   $request->allow_helper          ;
        $task->entry_by               = \Auth::user()->id                  ;
        $task->save();

}










// ইনকাম দুই জায়গায় কাজ করবে একটা ট্রিপ ডিটেইলস এ
// আরেকটা ট্রানজাকশন এ
// এক্সপেন্ড শুধু ট্রিপ ডিটেইলস এ

// ইনকাম এক্সপেন্ড লুপ হবে



// ইনকাম মানে ইনকাম এমাউন্ট
if(isset($request->income)){

$i = 0  ;

foreach($request->in_party as $in_party){


//if update = 1 then update or insert new data

  if($request->update == 1 AND isset($request->income_trip_details_id[$i])){



// ট্রিপ ডিটেইলস এ

trip_detail::where('id', $request->income_trip_details_id[$i])->update([


  'date'                  =>   $request->in_date[$i]                     ,
  'in_purpose'            =>   $request->in_purpose[$i]                  ,
  'in_amount'            =>   $request->income[$i]                     ,
  'comment'               =>   $request->comment_income[$i]              ,
  'entry_by'              =>   \Auth::user()->id

]);






// এটা ট্রানজাকশন টেবিল
    transaction::where('trip_details_id', $request->income_trip_details_id[$i])->update([


       'date'                  =>   $request->in_date[$i]                     ,
//       'income_purpose'        =>   $request->in_purpose[$i]                ,
       'to_party_id'           =>   $request->in_party[$i]                ,
       'amount'                =>   $request->income[$i]                      ,
       'comment'               =>   $request->comment_income[$i]              ,
      'entry_by'              =>   \Auth::user()->id

    ]);







  }else{


// ট্রিপ ডিটেইলস এর ডাটা হিসাবের জন্য ট্রানজাকসন টেবিলে যাবে

        $task = new trip_detail;

          $task->trip_id          =   $request->trip_id                         ;
          $task->date             =   $request->in_date[$i]                     ;
          $task->in_purpose       =   $request->in_purpose[$i]                  ;
          $task->party            =   $request->in_party[$i]                    ;
          $task->in_amount        =   $request->income[$i]                      ;
          $task->comment          =   $request->comment_income[$i]              ;

          $task->entry_by         =     \Auth::user()->id                       ;
          $task->save();



$trip_details_id      =   $task->id ;





    $task = new transaction;


      $task->from_trip_id           =   $request->trip_id              ;
      $task->date                   =   $request->in_date[$i]          ;
      $task->type                   =   "trip_income"                  ;
      $task->trip_details_id        =   $trip_details_id               ;
//      $task->income_purpose       =   $request->in_purpose[$i]       ;
      $task->to_party_id            =   $request->in_party[$i]       ;
      $task->amount                 =   $request->income[$i]           ;
      $task->comment                =   $request->comment_income[$i]   ;
      $task->entry_by               = \Auth::user()->id                ;
      $task->save();






} // else insert new data

$i++ ;

} // end foreach income


} // isset income




// $request->expend মানে খরচের এমাউন্ট

if(isset($request->expend)){

$i = 0  ;

foreach($request->expend as $expend){




//if update = 1 then update or insert new data

  if($request->update == 1 AND isset($request->trip_expend_id[$i])){


    trip_detail::where('id', $request->trip_expend_id[$i])->update([


      'date'                  =>   $request->ex_date[$i]                     ,
      'ex_purpose'            =>   $request->ex_purpose[$i]                  ,
      'out_amount'            =>   $request->expend[$i]                     ,
      'comment'               =>   $request->comment_expend[$i]              ,
      'entry_by'              =>   \Auth::user()->id

    ]);


  }else{



    $task = new trip_detail;

      $task->trip_id          =   $request->trip_id                         ;
      $task->date             =   $request->ex_date[$i]                        ;
      $task->ex_purpose       =   $request->ex_purpose[$i]                  ;
      $task->out_amount       =   $request->expend[$i]                      ;
      $task->comment          =   $request->comment_expend[$i]              ;

      $task->entry_by = \Auth::user()->id                                   ;
      $task->save();



} // else insert new data

$i++ ;

} // end foreach expend


} // isset Expend












if($request->status == 1){ // if Only final than thansaction table update



// যদি আগে থেকে ট্রিপ আইডির ডাটা থাকে তাহলে আপডেট করবে
if(transaction::where('to_trip_id', $request->trip_id)->count() > 0){


  // for driver commition
transaction:: where('type', 'trip_commition')->
              where('to_trip_id', $request->trip_id)->
              where('from_staff_id', $request->driver_id)->
              update([


                    "date"             =>   $request->date                ,
                    "amount"           =>   $request->com_driver          ,
                    "entry_by"         =>  \Auth::user()->id

                  ]) ;

  // for driver allowance
transaction:: where('type', 'trip_allowance')->
              where('to_trip_id', $request->trip_id)->
              where('from_staff_id', $request->driver_id)->
              update([


                    "date"             =>   $request->date                ,
                    "amount"           =>   $request->allow_driver         ,
                    "entry_by"         =>  \Auth::user()->id

                  ]) ;



  // for Helper commition
transaction:: where('type', 'trip_commition')->
              where('to_trip_id', $request->trip_id)->
              where('from_staff_id', $request->helper_id)->
              update([


                    "date"             =>   $request->date                ,
                    "amount"           =>   $request->com_helper          ,
                    "entry_by"         =>  \Auth::user()->id

                  ]) ;

  // for helper allowance
transaction:: where('type', 'trip_allowance')->
              where('to_trip_id', $request->trip_id)->
              where('from_staff_id', $request->helper_id)->
              update([


                    "date"             =>   $request->date                ,
                    "amount"           =>   $request->allow_helper         ,
                    "entry_by"         =>  \Auth::user()->id

                  ]) ;







// আগে থেকে ট্রিপ আইডির ডাটা না থাকলে নতুন করে এন্টি করবে
 }else{



// transaction::where('type', 'trip_commition')->where('to_trip_id', $request->trip_id)->where('from_staff_id', from_staff_id)->update([

// for driver commition
$task = new transaction;

  $task->date             =   $request->date                ;
  $task->type             =   "trip_commition"        ;
  $task->amount           =   $request->com_driver          ;
  $task->to_trip_id       =   $request->trip_id                ;
  $task->from_staff_id    =   $request->driver_id           ;

  $task->comment          =   $request->comment  ;
  $task->entry_by = \Auth::user()->id                       ;
  $task->save();


// for driver allowance
$task = new transaction;

  $task->date             =   $request->date                ;
  $task->type             =   "trip_allowance"              ;
  $task->amount           =   $request->allow_driver          ;
  $task->to_trip_id       =   $request->trip_id                ;
  $task->from_staff_id    =   $request->driver_id           ;

  $task->comment          =   $request->comment           ;
  $task->entry_by = \Auth::user()->id                       ;
  $task->save();




// for helper commition
$task = new transaction;

  $task->date             =   $request->date                ;
  $task->type             =   "trip_commition"        ;
  $task->amount           =   $request->com_helper          ;
  $task->to_trip_id       =   $request->trip_id                ;
  $task->from_staff_id    =   $request->helper_id           ;

  $task->comment          =   $request->comment           ;
  $task->entry_by = \Auth::user()->id                       ;
  $task->save();


// for helper allowance
$task = new transaction;

  $task->date             =   $request->date                ;
  $task->type             =   "trip_allowance"              ;
  $task->amount           =   $request->allow_helper          ;
  $task->to_trip_id       =   $request->trip_id                ;
  $task->from_staff_id    =   $request->helper_id           ;

  $task->comment          =   $request->comment           ;
  $task->entry_by = \Auth::user()->id                       ;
  $task->save();










   } // আগে থেকে ট্রিপ আইডির ডাটা না থাকলে নতুন করে এন্টি করবে








   // driver_helper_payment_done চেক করা থাকলে এবং পেমেন্টে আগের ডাটা থাকলে ট্রানজাকশন টেবিলে তাদের পেমেন্ট update করে দেবে
   if(transaction::where('from_trip_id', $request->trip_id)->count() > 0){
   if(isset($request->driver_helper_payment_done ) ){



          transaction::  where('from_trip_id', $request->trip_id)->
                          where('to_acc', '!= ', NULL ) ->
                          update([


                                "date"             =>   $request->date        ,
                                "amount"           =>   $request->receivable  ,
                                "entry_by"         =>  \Auth::user()->id

                              ]) ;



       // for driver commition
     transaction:: where('type', 'trip_commition')->
                   where('from_trip_id', $request->trip_id)->
                   where('to_staff_id', $request->driver_id)->
                   update([


                         "date"             =>   $request->date                ,
                         "amount"           =>   $request->com_driver          ,
                         "entry_by"         =>  \Auth::user()->id

                       ]) ;

       // for driver allowance
     transaction:: where('type', 'trip_allowance')->
                   where('from_trip_id', $request->trip_id)->
                   where('to_staff_id', $request->driver_id)->
                   update([


                         "date"             =>   $request->date                ,
                         "amount"           =>   $request->allow_driver         ,
                         "entry_by"         =>  \Auth::user()->id

                       ]) ;



       // for Helper commition
     transaction:: where('type', 'trip_commition')->
                   where('from_trip_id', $request->trip_id)->
                   where('to_staff_id', $request->helper_id)->
                   update([


                         "date"             =>   $request->date                ,
                         "amount"           =>   $request->com_helper          ,
                         "entry_by"         =>  \Auth::user()->id

                       ]) ;

       // for helper allowance
     transaction:: where('type', 'trip_allowance')->
                   where('from_trip_id', $request->trip_id)->
                   where('to_staff_id', $request->helper_id)->
                   update([


                         "date"             =>   $request->date                ,
                         "amount"           =>   $request->allow_helper         ,
                         "entry_by"         =>  \Auth::user()->id

                       ]) ;



   }
   // driver_helper_payment_done চেক করা থাকলে ট্রানজাকশন টেবিলে তাদের পেমেন্ট করে দেবে


   else{



     transaction::  where('from_trip_id', $request->trip_id)->
                     where('to_acc', '!= ', NULL ) ->
                     update([


                           "date"             =>   $request->date                ,
                           "amount"           =>   $request->receivable +  $request->commition + $request->allowance   ,
                           "entry_by"         =>  \Auth::user()->id

                         ]) ;


     transaction::  where('from_trip_id', $request->trip_id)->
                    where('to_staff_id', '!= ', NULL ) ->
                    delete();

   } // driver_helper_payment_done চেক করা  না থাকলে সব পেমেন্ট ডাটা মুছে দিতে হবে,
   // ট্রিপ স্টাটাস ফাইনাল থেকে আবার এডিট করলে আগে ফাইনাল করার সময়ে পেমেন্ট করা থাকতে পারে



   }    // transaction::where('from_trip_id', $request->trip_id)->count() > 0

   else{


       // driver_helper_payment_done চেক করা থাকলে ট্রানজাকশন টেবিলে তাদের পেমেন্ট করে দেবে
       if(isset($request->driver_helper_payment_done)){


         $task = new transaction;

           $task->date             =   $request->date                ;
           $task->type             =   "trip_to_account"             ;
           $task->amount           =   $request->receivable          ;
           $task->from_trip_id     =   $request->trip_id             ;
           $task->to_acc           =   1                             ;

           $task->comment          =   $request->comment             ;
           $task->entry_by = \Auth::user()->id                       ;
           $task->save();





         // for driver commition
         $task = new transaction;

           $task->date             =   $request->date                ;
           $task->type             =   "trip_commition"        ;
           $task->amount           =   $request->com_driver          ;
           $task->from_trip_id     =   $request->trip_id                ;
           $task->to_staff_id      =   $request->driver_id           ;

           $task->comment          =   $request->comment  ;
           $task->entry_by = \Auth::user()->id                       ;
           $task->save();


         // for driver allowance
         $task = new transaction;

           $task->date             =   $request->date                ;
           $task->type             =   "trip_allowance"              ;
           $task->amount           =   $request->allow_driver          ;
           $task->from_trip_id       =   $request->trip_id                ;
           $task->to_staff_id    =   $request->driver_id           ;

           $task->comment          =   $request->comment           ;
           $task->entry_by = \Auth::user()->id                       ;
           $task->save();




         // for helper commition
         $task = new transaction;

           $task->date             =   $request->date                ;
           $task->type             =   "trip_commition"        ;
           $task->amount           =   $request->com_helper          ;
           $task->from_trip_id     =   $request->trip_id                ;
           $task->to_staff_id      =   $request->helper_id           ;

           $task->comment          =   $request->comment           ;
           $task->entry_by = \Auth::user()->id                       ;
           $task->save();


         // for helper allowance
         $task = new transaction;

           $task->date             =   $request->date                ;
           $task->type             =   "trip_allowance"              ;
           $task->amount           =   $request->allow_helper          ;
           $task->from_trip_id       =   $request->trip_id                ;
           $task->to_staff_id    =   $request->helper_id           ;

           $task->comment          =   $request->comment           ;
           $task->entry_by = \Auth::user()->id                       ;
           $task->save();






       } // driver_helper_payment_done চেক করা থাকলে ট্রানজাকশন টেবিলে তাদের পেমেন্ট করে দেবে


       else { // ড্রাইভার হেল্পারের কমিশন বাদ রেখেছে সেটা যোগ হয়ে একাউন্টে ফেরত আসবে

         $task = new transaction;

           $task->date             =   $request->date                ;
           $task->type             =   "trip_to_account"             ;
           $task->amount           =   $request->receivable + $request->commition + $request->allowance    ;
           $task->from_trip_id     =   $request->trip_id             ;
           $task->to_acc           =   1                             ;

           $task->comment          =   $request->comment             ;
           $task->entry_by = \Auth::user()->id                       ;
           $task->save();


       }  // ড্রাইভার হেল্পারের কমিশন বাদ রেখেছে সেটা যোগ হয়ে একাউন্টে ফেরত আসবে








   } // else transaction::where('from_trip_id', $request->trip_id)->count() > 0


} // if Only final than thansaction table update












            }); // End transaction



    return back();




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
