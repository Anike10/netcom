<x-app-layout :menus=$menus>

  <x-slot:title> Update Trip </x-slot>
  <x-slot:script>

// Add more Field

  $(document).ready(function() {

/*
@if($trip != NULL) @if($trip->status == 0)

// ফর্ম এর ইনপুট একবার কপি করে রাখছে
    var html = $(".copy_income").html();
    $(".after-add-more_income").before(html);

    var html = $(".copy_expend").html();
    $(".after-add-more_expend").before(html);

@endif @endif

*/


    $(".add-more-field_status").click(function(){
        var html = $(".copy_status").html();
        $(".after-add-more_status").before(html);
        $(this).parents(".control-group").remove();
    });



    $(".add-more-field_income").click(function(){
        var html = $(".copy_income").html();
        $(".after-add-more_income").before(html);
    });

    $(".add-more-field_expend").click(function(){
        var html = $(".copy_expend").html();
        $(".after-add-more_expend").before(html);
    });


    $("body").on("click",".remove",function(){
        $(this).parents(".control-group").remove();
    });

  });

// Add more Field End




//Equation start

      $(document).ready(function () {
// Trigger All Calculate Function by Button
    $(".calculate").click(function(){    calculate();   }); });

    $(document).ready(function () {
// Trigger All Calculate Function by Button
  $(".save").click(function(){    calculate();   }); });


  function calculate() {
          var total_income = 0;     //  sum মানে সর্বোমোট
          //iterate through each textboxes and add the values
          $(".income").each(function () {
              //add only if the value is number
              if (!isNaN(this.value) && this.value.length != 0) {
                  total_income += parseFloat(this.value);
              }
          });


          //document.getElementById("total_income").innerHTML = total_income ;
          //.toFixed() method will roundoff the final sum to 2 decimal places
          //$(".total_income").val(total_income.toFixed(2));
          $(".total_income").val(total_income);


                var total_expend = 0;     //  sum মানে সর্বোমোট
                //iterate through each textboxes and add the values
                $(".expend").each(function () {
                    //add only if the value is number
                    if (!isNaN(this.value) && this.value.length != 0) {
                        total_expend += parseFloat(this.value);
                    }
                });


                //.toFixed() method will roundoff the final sum to 2 decimal places
                // $(".total_expend").val(total_expend.toFixed(2));
                $(".total_expend").val(total_expend);




      var com_per   =  document.getElementById("com_per").value ;
      var allowance   =  document.getElementById("allowance").value ;
      var commition =  document.getElementById("total_income").value * com_per / 100 ;
      var driver    =  commition * .6 ;
      var helper    =  commition * .4 ;
      var allow_driver    =  allowance * .6 ;
      var allow_helper    =  allowance * .4 ;


      var balance       =  total_income - total_expend - commition - allowance ;
      var advance       =  document.getElementById("advance").value ;
      var receivable    =  Number(balance) + Number(advance) ;




                //      document.getElementById("result").innerHTML = num1 * num2;
                      $(".balance").val(balance.toFixed(2));
                      $(".receivable").val(receivable.toFixed(2));



                    $(".commition").val(commition.toFixed(2));
                    $(".driver").val(driver.toFixed(2));
                    $(".helper").val(helper.toFixed(2));
                    $(".allow_driver ").val(allow_driver.toFixed(2));
                    $(".allow_helper ").val(allow_helper.toFixed(2));


            }


//Equation End


calculate();

</x-slot> <!-- Script -->




<x-slot:style>


/* Div Table Start */

.body {
height: 100%
width: 100%;
font-size: 8px;
background-color: #fff;
}
.divTable{
display: table;
width: 100%;
}
.divTableRow, .divTableRowBig {
display: table-row;
}

.divTableRowBig {
height: 120px;
writing-mode: vertical-rl;
  text-orientation: upright;
}

.divTableHeading {
background-color: #EEE;
display: table-header-group;
}
.divTableCell, .divTableHead {
border: 1px solid #999999;
display: table-cell;
padding: 2px 2px;
width: 30px;
text-align: center;
}
.divTableCellBig {
border: 1px solid #999999;
display: table-cell;
padding: 2px 2px;
width: 120px;
text-align: right;

}
.divTableHeading {
background-color: #EEE;
display: table-header-group;
font-weight: bold;
}
.divTableFoot {
background-color: #EEE;
display: table-footer-group;
font-weight: bold;
}
.divTableBody {
display: table-row-group;
}

/* End div table */



.grid-striped .row:nth-of-type(even) {
    background-color: rgba(0,0,0,.05);
}



</x-slot> <!-- Style -- >



  <x-slot:menu>

  </x-slot>

@if($trip != NULL)

  <!-- Java copy final check -->
          <div class="copy_status d-none">  <!-- This Div not Sent -->
<span  class="form-inline" >
&nbsp &nbsp &nbsp Driver&Helper payment done - &nbsp

<input type="checkbox" id="vehicle1" name="driver_helper_payment_done" value="1"  checked>

<input type="hidden" id="vehicle1" name="status" value="1"  checked required>

&nbsp
&nbsp
&nbsp
Return date - &nbsp <input type="datetime-local" name="to_date_final" value="{{old('to_date', $trip->to_date)}}" class="form-control form-control-lg" id="to_date"  style="width:250px"  required autofocus >
&nbsp
&nbsp
&nbsp
KM - &nbsp <input type="text" name="km" value="{{old('km', $trip->km)}}" class="form-control form-control-lg" id="km"  style="width:100px"  required >
&nbsp
&nbsp
&nbsp
Fuel - &nbsp <input type="text" name="fuel" value="{{old('fuel', $trip->fuel)}}" class="form-control form-control-lg" id="fuel"  style="width:100px"  required >
</span>
          </div>  <!-- This Div not Sent Java copy final check -->
 @else

@endif

  <!-- Java copy Income field -->
          <div class="copy_income d-none">  <!-- This Div not Sent -->



  <div class="row p-2 text-center control-group">

          <div class="col-md-1 ">
              <input type="date" name="in_date[]" value="{{date("Y-m-d")}}" class="form-control d-inline" id="date"  style="width:125px;" required>
          </div>

          <div class="col-md-2 ">
                        <select name="in_purpose[]" value="{{old('in_purpose', )}}" class="form-control" autofocus required>
                            <option value="">                        </option>


@if($trip != NULL)
    @foreach($in_purposes as $in_purpose)
                    <option value="{{$in_purpose->id}}">     {{$in_purpose->in_purpose}}    </option>
    @endforeach
@endif
                        </select>
                			</div>
              <div class="col-md-1 ">
                 <input type="text" name="income[]" size="2"  class="income form-control" required >
              </div>
              <div class="col-md-2 ">
                        <select name="in_party[]" class="form-control"  required>

            @foreach($parties as $party)

            <option value="{{$party->id}}"> {{$party->name}} </option>

            @endforeach
                        </select>
                      </div>
                	<div class="col-md-5 ">
             <input  type="text"  name="comment_income[]"   class="form-control" >
                  </div>

                				<button class="btn-xs btn-danger remove" type="button">  -  </button>




    </div> <!-- Javascript remove control-group -->



          </div>  <!-- This Div not Sent Java copy Income field-->




            <!-- Java copy Expend field -->
          <div class="copy_expend d-none">  <!-- This Div not Sent -->


            <div class=" control-group row p-2 text-center">
              <div class=""> # </div>
              <div class="col-md-1 ">
<input type="date" name="ex_date[]" value="{{date("Y-m-d")}}" class="form-control d-inline" id="date"  style="width:125px;" required>
              </div>
      <div class="col-md-2">
                        <select name="ex_purpose[]" value="{{old('in_purpose', )}}" class="form-control" autofocus required >
                          <option value="">                        </option>


@if($trip != NULL)
  @foreach($ex_purposes as $ex_purpose)
                  <option value="{{$ex_purpose->id}}">     {{$ex_purpose->ex_purpose}}    </option>
  @endforeach
@endif


                        </select>
                			</div>

                			<div class="col-md-1">
                			     <input type="text"  name="expend[]" size="2"  class="expend form-control" required >
                			</div>


                			<div class="col-md-7">
             <input type="text"  name="comment_expend[]"   class="form-control" >
                      </div>
                			<div class="">
                				<button class="btn-xs btn-danger remove" type="button">  -  </button>
                			</div>
                		</div>
                  </div> <!-- Javascript remove control-group -->


          </div>  <!-- This Div not Sent Java copy Expend field-->

</br>

          <form class="form-inline" method="GET" action="{{url('/update_trip')}}">


              &nbsp &nbsp &nbsp      &nbsp &nbsp &nbsp      &nbsp &nbsp &nbsp




  Find Trip &nbsp &nbsp <select name="trip">

              <option>                </option>
              @foreach($trips->Where('status' , 0) as $trip_op)
                  <option value='{{$trip_op->id}}'> {{$trip_op->id . " - " . $trip_op->vehicles->number . " - " .$trip_op->drivers->name}} </option>
              @endforeach
            </select>
              &nbsp &nbsp &nbsp
                          <button type="submit" class="btn btn-primary"> Show </button>
            </form>


</br>


@if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif


@if($trip != NULL)


<form method="POST" action="{{url('/update_trip')}}">

 {!! csrf_field() !!}


<div  class="form-inline" >

        <div class="form-group">
      &nbsp &nbsp &nbsp Trip ID &nbsp &nbsp &nbsp
      {{ $trip->id }}

        </div>

        <div class="form-group">
    &nbsp &nbsp &nbsp From &nbsp &nbsp &nbsp
    {{ $trip->from_date }}
        </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp To &nbsp &nbsp &nbsp

  <input type="datetime-local" name="to_date_normal" value="{{old('to_date', $trip->to_date)}}" class="form-control form-control-lg " id="to_date"  style="width:275px"   >


      </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp Driver &nbsp &nbsp &nbsp
{{ $trip->drivers->name }}
<input type="hidden" name="driver_id" value="{{$trip->driver_id}}" >

      </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp Helper &nbsp &nbsp &nbsp
{{ $trip->helpers->name }}
<input type="hidden" name="helper_id" value="{{$trip->helper_id}}" >

      </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp vehicle &nbsp &nbsp &nbsp
{{ $trip->vehicles->number }}

      </div>

      <div class="form-group">

      </div>

</div> <!-- class="form-inline" -->



      &nbsp &nbsp &nbsp




  <br/>




    <div class="row d-inline ">



<!-- ডিভ নেওয়া ডাটা ছোট করে দেখাতে আর হিডেন ইনপুট ডাটা পাঠাতে -->

Commition <input type="text" id="com_per" name="com_per" value="{{$trip->commition_per}}" class="com_per text-right form-control d-inline p-1"  style="width:30px"  > %
          <input type="text" id="commition" name="commition" class="commition text-right form-control col-sm-1 d-inline p-1"  style="width:70px"  readonly="readonly">
          ( <input type="text" id="driver" name="com_driver" class="driver text-right form-control col-sm-1 d-inline p-1"  style="width:70px"  readonly="readonly">
          + <input type="text" id="helper" name="com_helper" class="helper text-right form-control col-sm-1 d-inline p-1"  style="width:70px"  readonly="readonly"> )

Allowance <input type="text" id="allowance" name="allowance" value="{{$trip->allowance}}" class="allowance text-right form-control d-inline p-1"  style="width:50px"  >
          ( <input type="text" id="allow_driver" name="allow_driver" class="allow_driver text-right form-control col-sm-1 d-inline p-1"  style="width:70px"  readonly="readonly">
          + <input type="text" id="allow_helper" name="allow_helper" class="allow_helper text-right form-control col-sm-1 d-inline p-1"  style="width:70px"  readonly="readonly"> )


Balance   <input type="text" id="balance" name="balance" class="balance form-control col-sm-1 d-inline" readonly="readonly">
Advance <input type="text" id="advance" name="advance" value="{{$advance}}" class="advance form-control col-sm-1 d-inline" id="advance" style="width:70px"   readonly="readonly" >
Receivable <input type="text" name="receivable" value="{{old('receivable', )}}" class="receivable form-control d-inline" id="receivable" style="width:100px"   readonly="readonly">


      </div>


  <br/>
  <br/>



  <span class="after-add-more_status"> </span>  <!-- Javascript add .copy HTML before it -->
  <br/>


<div>
  Income <input type="text" id="total_income" name="t_income" class="total_income text-right form-control d-inline p-1 m-1"  style="width:100px" readonly="readonly">


  Date <input type="date" name="date" value="{{date("Y-m-d")}}" class="form-control col-sm-3 d-inline" id="date" required>
   <input type="hidden" name="trip_id" value="{{ $trip->id }}" class="form-control col-sm-1 d-inline" required>

   &nbsp &nbsp
  <button class="btn-xs btn-primary calculate" type="button"> Calculate </button>
  &nbsp
  &nbsp
  @if($trip != NULL) @if($trip->status == 0)

  <a class="btn btn-xs btn-danger" type="button" href="{{url('/update_trip?update=1')}}&trip={{$trip->id}}"> Edit  </a>



  <span class="control-group">
  <button class="save btn-xs btn-success add-more-field_status" type="button"> Final </button> &nbsp
  </span>



  &nbsp &nbsp &nbsp &nbsp
  <button type="submit" class="btn-xs btn-danger save"> Save </button> &nbsp &nbsp &nbsp &nbsp

  @endif  @endif
  <a href="{{url('/')}}/update_trip?trip={{$trip->id}}&print=1" class="btn btn-primary btn-xs "> Print  </a> &nbsp &nbsp &nbsp &nbsp




  @if($update==1)
  <input type="hidden" name="update" value="1" style="width:1px;">
  @endif
</div>

</br>


<div > <!-- Income Table -->


    <div class="row bg-light p-2 text-center">
      <div class=""> # </div>
      <div class="col-md-1 ">Date</div>
      <div class="col-md-2">Purpose</div>
      <div class="col-md-1">Amount</div>
      <div class="col-md-2">Party</div>
      <div class="col-md-5">Comment</div>
      <div class=""> - </div>
    </div>




<!-- // {{$trip->trip_details_f}} -->

<div class="grid-striped" >

<?php $x = 1 ; ?>
    <!-- ডাটাবেজের আগের এন্ট্রিগুলো এখানে আর ফমর জাভাস্কিপ্ট দিয়ে কপি করা -->


    @foreach($trip->trip_details_f as $trip_detail  )
      @if($trip_detail->in_amount != NULL)


@if($update == 1)

<input type="hidden" name="income_trip_details_id[]" value="{{ $trip_detail->id }}" >

@endif


    <div class="row p-2 text-center">
      <div class=""> {{$x++}} </div>
      <div class="col-md-1 ">
                @if($update == 1)
                <input type="date" value="{{ $trip_detail->date }}" name="in_date[]" class="income form-control" style="width:125px;" required>
                @else

  {{$trip_detail->date}}

                @endif

      </div>
      <div class="col-md-2">
        @if($update == 1)

                        <select name="in_purpose[]" value="{{old('in_purpose', )}}" class="form-control" autofocus required>
                            <option value="{{ $trip_detail->in_purpose }}">    {{ $trip_detail->in_purpose_f->in_purpose }}  </option>


        @if($trip != NULL)
        @foreach($in_purposes as $in_purpose)
                    <option value="{{$in_purpose->id}}">     {{$in_purpose->in_purpose}}    </option>
        @endforeach
        @endif
                        </select>

        @else  {{ $trip_detail->in_purpose_f->in_purpose }}  @endif
      </div>
      <div class="col-md-1">
        @if($update == 1)
        <input type="text" value="{{ $trip_detail->in_amount }}" name="income[]" size="2"  class="income form-control" @if($update != 1) disabled @endif>

        @else {{ $trip_detail->in_amount }}
        <input type="hidden" value="{{ $trip_detail->in_amount }}" name="income[]" size="2"  class="income form-control" @if($update != 1) disabled @endif>
        <!-- Hidden input for javascript Equation -->
         @endif


      </div>
      <div class="col-md-2">
        @if($update == 1)

             <select name="in_party[]" class="form-control"  required>
               <option value="{{ $trip_detail->party  }} ">    {{ $trip_detail->parties->name  }}   </option>


                @foreach($parties as $party)

                <option value="{{$party->id}}"> {{$party->name}} </option>

                @endforeach
             </select>


        @else {{ $trip_detail->parties->name  }}  @endif
      </div>
      <div class="col-md-5">
        @if($update == 1)
          <input type="text" value="{{ $trip_detail->comment }}" name="comment_income[]" size="2"  class=" form-control" @if($update != 1) disabled @endif>
        @else {{ $trip_detail->comment }}  @endif
      </div>
      <div class=""> - </div>
    </div>

@endif

@endforeach


</div> <!-- Stiped -->


</div > <!-- Income Table -->


<span class="after-add-more_income clearfix"> </span>  <!-- Javascript add .copy HTML before it -->

</br>


@if($trip != NULL) @if($trip->status == 0)

<button class="btn-xs btn-success add-more-field_income" type="button"> Add New Field </button> &nbsp
<button class="btn-xs btn-primary calculate" type="button"> Calculate </button> &nbsp &nbsp
<button type="submit" class="btn-xs btn-danger save"> Save </button>

@endif @endif

</br>
</br>


Expenditure <input type="text" id="total_expend" name="t_expend" class="total_expend text-right form-control d-inline p-1 m-1"  style="width:100px"  readonly="readonly" >
 &nbsp &nbsp &nbsp &nbsp


</br>



    <div class="row bg-light p-2 text-center">
      <div class=""> # </div>
      <div class="col-md-1 ">Date</div>
      <div class="col-md-2">Purpose</div>
      <div class="col-md-1">Amount</div>
      <div class="col-md-7">Comment</div>
      <div class=""> - </div>
    </div>





<div class="grid-striped" >

<?php $x = 1 ; ?>
    <!-- ডাটাবেজের আগের এন্ট্রিগুলো এখানে আর ফমর জাভাস্কিপ্ট দিয়ে কপি করা -->

@foreach($trip->trip_details_f as $trip_detail  )


@if($trip_detail->out_amount != NULL)

@if($update == 1)
<input type="hidden" name="trip_expend_id[]" value="{{ $trip_detail->id }}" >
@endif


    <div class="row p-2 text-center">
      <div class=""> {{$x++}} </div>
      <div class="col-md-1 ">
                @if($update == 1)
<input type="date" value="{{ $trip_detail->date }}" name="ex_date[]" class="income form-control" style="width:125px;" required>
                @else

{{ $trip_detail->date }}

                @endif

      </div>
      <div class="col-md-2">
        @if($update == 1)

    <select name="ex_purpose[]" value="{{old('ex_purpose', )}}" class="form-control" autofocus required>
                            <option value="{{ $trip_detail->ex_purpose }}">    {{ $trip_detail->ex_purpose_f->ex_purpose }}  </option>

        @if($trip != NULL)
        @foreach($ex_purposes as $ex_purpose)
                    <option value="{{$ex_purpose->id}}">     {{$ex_purpose->ex_purpose}}    </option>
        @endforeach
        @endif
                        </select>

        @else  {{ $trip_detail->ex_purpose_f->ex_purpose }}   @endif
      </div>
      <div class="col-md-1">
        @if($update == 1)
        <input type="text" value="{{ $trip_detail->out_amount }}" name="expend[]" size="2"  class="expend form-control" @if($update != 1) disabled @endif>

        @else {{ $trip_detail->out_amount }}
        <input type="hidden" value="{{ $trip_detail->out_amount }}" name="expend[]" size="2"  class="expend form-control" @if($update != 1) disabled @endif>
        <!-- Hidden input for javascript Equation -->
         @endif


      </div>

      <div class="col-md-7">
        @if($update == 1)
          <input type="text" value="{{ $trip_detail->comment }}" name="comment_expend[]" size="2"  class=" form-control" @if($update != 1) disabled @endif>
        @else {{ $trip_detail->comment }}  @endif
      </div>
      <div class=""> - </div>
    </div>


    @endif
@endforeach


</div> <!-- Stiped -->



      <span class="after-add-more_expend clearfix"> </span>  <!-- Javascript add .copy HTML before it -->




</div > <!-- Expend Table -->





</br>


<div> </div>


</div>

</div>	<!-- Expend div Table -->


</br>
@if($trip != NULL) @if($trip->status == 0)

<button class="btn-xs btn-success add-more-field_expend" type="button"> Add New Field </button> &nbsp
<button class="btn-xs btn-primary calculate" type="button"> Calculate </button> &nbsp &nbsp
<button type="submit" class="btn-xs btn-danger save"> Save </button>

@endif  @endif

      </div> <!-- Expenditure -->

    </div>



  </form>


@endif


</x-app-layout>
