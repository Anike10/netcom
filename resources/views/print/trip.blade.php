<x-app-layout :menus=$menus>


  <x-slot:script>



</x-slot> <!-- Script -->




<x-slot:style>


@media print {
   p.bodyText {font-family:georgia, times, serif;}


body {
  margin : 0 100px ;
}




}



.column_1 {
  float: left;
  width: 30mm;
  padding: 10px;
}
.column_2 {
  float: left;
  width: 45mm;
  padding: 10px;
}

.column_3 {
  float: left;
  width: 30mm;
  padding: 10px;
}
.column_4 {
  float: left;
  width: 30mm;
  padding: 10px;
}
.column_5 {
  float: left;
  width: 30mm;
  padding: 10px;
}
.column_6 {
  float: left;
  width: 20mm;
  padding: 10px;
}
.column_7 {
  float: left;
  width: 30mm;
  padding: 10px;
}
.column_8 {
  float: left;
  width: 20mm;
  padding: 10px;
}







</x-slot> <!-- Style -- >



  <x-slot:menu>

  </x-slot>
  <x-slot:title> Print Trip </x-slot>




<div style=" padding: 40px 0px; "> <!-- Main -->



<div class=""	style="font-size: 20px; width: 250mm;">

		<div class="row">
		  <div class="" style=" width: 105mm; text-align: left;">
		        <img src="{{ asset('images/KNB-Logo.png') }}" alt="KNB Logo">
      </div>

      <div class="" style="  width: 150mm; text-align: right;">
        <b class="h3">	KNB Agro Industries Limited </b> <br/>
    			Kushtia <br/>

        </div>




		</div> <!--div row -->


</div> <!-- Print Text Size -->

</br/>




<div class="" >


 <h5 class="float-left"> Vehicle : {{$trip->vehicles->number }} </h5> &nbsp &nbsp &nbsp	Driver – {{$trip->drivers->name }} ({{$trip->com_driver }} + {{$trip->allow_driver }}) = {{$trip->com_driver + $trip->allow_driver }}  &nbsp &nbsp &nbsp
 	                                                                                      Helper – {{$trip->helpers->name }} ({{$trip->com_helper }} + {{$trip->allow_helper }}) = {{$trip->com_helper + $trip->allow_helper }}


</div>

</br>
<div class=""	style="font-size: 20px; width: 250mm;">

		<div class="row">
		  <div class="column_1 text-right " style="background-color:#ddd;">
          Date
		  </div>
		  <div class="column_2 text-right " style="background-color:#ddd;">
          <input type="text" class="text-right form-control p-1 d-inline"  value="@if($trip->to_date == NULL) Running @else {{date('Y-m-d', strtotime($trip->to_date)) }} @endif"  style="width:150px"  >
      </div>
		  <div class="column_3 text-right " style="background-color:#ddd;">
          Balance
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
          <input type="text text-right " class="text-right form-control p-1 d-inline"  name="" value="{{$trip->balance}}"  style="width:75px"  >
		  </div>
		  <div class="column_3 text-right " style="background-color:#ddd;">
        Advance
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
        <input type="text" class="text-right form-control p-1 d-inline"  name="" value="{{$trip->advance}}"  style="width:75px"  >
      </div>
      <div class="column_3 text-right " style="background-color:#ddd;">
        Receivable
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
        <input type="text" class="text-right form-control p-1 d-inline"  name="" value="{{$trip->receivable}}"  style="width:75px"  >
      </div>

		</div> <!--div row -->

    <div class="row">
		  <div class="column_1 text-right  " style="background-color:#ddd;">
          Trip ID
		  </div>
		  <div class="column_2 text-right " style="background-color:#ddd;">
        <input type="text" class="text-right form-control p-1 d-inline"  name="" value="{{$trip->id}}"  style="width:150px"  >
      </div>
		  <div class="column_3 text-right " style="background-color:#ddd;">
          Com: <span style="font-size: 15px;" > ({{$trip->commition_per}}%) </span>
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
        <input type="text" class="text-right form-control p-1 d-inline"  name="" value="{{$trip->com_amount}}"  style="width:75px"  >
		  </div>
		  <div class="column_3 text-right " style="background-color:#ddd;">
        Allowance
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
          <input type="text" class="text-right form-control p-1 d-inline"  name="" value="{{$trip->allowance}}"  style="width:75px"  >
      </div>
      <div class="column_3 text-right " style="background-color:#ddd;">
        Total
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
        <input type="text" class="text-right form-control p-1 d-inline"  name="" value="{{$trip->com_amount + $trip->allowance}}"  style="width:75px"  >
      </div>

		</div> <!--div row -->

    <div class="row">
		  <div class="column_1 text-right  " style="background-color:#ddd;">

		  </div>
		  <div class="column_2 text-right " style="background-color:#ddd;">
      </div>
		  <div class="column_3 text-right " style="background-color:#ddd;">
          Total KM
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
        700
		  </div>
		  <div class="column_3 text-right " style="background-color:#ddd;">
        Fuel
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
          100
      </div>
      <div class="column_3 text-right " style="background-color:#ddd;">
        Efficiency
		  </div>
		  <div class="column_4 text-right " style="background-color:#ddd;">
        7
      </div>

		</div> <!--div row -->

</div> <!-- Print Text Size -->



<!--					<tr>
              <td >   Vehicle    </td >
          <td><input type="text" class="text-right form-control p-1 d-inline"  name="" value="{{$trip->vehicle_id}}"  style="width:150px"  ></td>
              <td >    Distance   </td >
          <td><input type="text" class="text-right form-control p-1 d-inline"  name="" value="1400"  style="width:150px"  ></td>
    					<td  class="text-right">			Fuel 	 </td>
          <td><input type="text" class="text-right form-control p-1 d-inline"  name="" value="200"  style="width:150px"  ></td>
    					<td  class="text-right">	Mileage    </td>
          <td><input type="text" class="text-right form-control p-1 d-inline"  name="" value="7"  style="width:150px"  ></td>

        </tr> -->


</br>
</br>





&nbsp <h4> Total Income - {{$trip->t_income}} </h4>

<div class=""	style="font-size: 20px; width: 250mm;">

		<div class="row  bg-secondary">
      <div class="text-center border border-2  " style="  width: 10mm;">
          #
      </div>
      <div class="text-center border border-2  " style="  width: 40mm;">
          Purpose
      </div>
      <div class="text-center border border-2  " style="  width: 27mm; text-align: right;">
          Amount
      </div>
      <div class="text-center border border-2  " style="  width: 50mm; text-align: right;">
          Party
      </div>

      <div class="text-center border border-2  " style="  width: 130mm; text-align: right;">
          Comment
      </div>

		</div> <!--div row -->

@php $x=1; @endphp

    @foreach($trip->trip_details_f as $trip_detail  )
      @if($trip_detail->in_amount != NULL)

    <div class="row  ">
      <div class="text-center border border-2  " style="  width: 10mm;">
          {{$x++}}
      </div>
      <div class="text-center border border-2  " style="  width: 40mm;">
          {{ $trip_detail->in_purpose_f->in_purpose }}
      </div>
      <div class="text-center border border-2  " style="  width: 27mm; text-align: right;">
          {{ $trip_detail->in_amount }}
      </div>
      <div class="text-center border border-2  " style="  width: 50mm; text-align: right;">
          {{ $trip_detail->parties->name }}
      </div>

      <div class="text-center border border-2  " style="  width: 130mm; text-align: right;">
          {{ $trip_detail->comment }}
      </div>

		</div> <!--div row -->
    @endif
@endforeach


</div> <!-- Print Text Size -->



<br/>



&nbsp <h4> Total Expend - {{$trip->t_expend}} </h4>

<div class=""	style="font-size: 20px; width: 250mm;">

		<div class="row  bg-secondary">
      <div class="text-center border border-2  " style="  width: 10mm;">
          #
      </div>
      <div class="text-center border border-2  " style="  width: 60mm;">
          Purpose
      </div>
      <div class="text-center border border-2  " style="  width: 30mm; text-align: right;">
          Amount
      </div>
      <div class="text-center border border-2  " style="  width: 157mm; text-align: right;">
          Comment
      </div>

		</div> <!--div row -->

@php $x=1; @endphp

    @foreach($trip->trip_details_f as $trip_detail  )
      @if($trip_detail->out_amount != NULL)

    <div class="row  ">
      <div class="text-center border border-2  " style="  width: 10mm;">
          {{$x++}}
      </div>
      <div class="text-center border border-2  " style="  width: 60mm;">
          {{ $trip_detail->ex_purpose_f->ex_purpose }}
      </div>
      <div class="text-center border border-2  " style="  width: 30mm; text-align: right;">
          {{ $trip_detail->out_amount }}
      </div>
      <div class="text-center border border-2  " style="  width: 157mm; text-align: right;">
          {{ $trip_detail->comment }}
      </div>

		</div> <!--div row -->
    @endif
@endforeach


</div> <!-- Print Text Size -->







</div> <!-- Main -->











</x-app-layout>
