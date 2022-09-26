<x-app-layout :menus=$menus>

  <x-slot:title> Expend Details </x-slot>

  <x-slot:menu>

  </x-slot>

</br>






<form class="form-inline" action="{{url('/expend_type')}}">

  <div class="form-group">
&nbsp &nbsp &nbsp Purpose &nbsp &nbsp &nbsp

<select name="purpose" class="form-control " autofocus >
@foreach( $ex_purpose as $pur )
          <option value="{{$pur->id}}" > {{$pur->ex_purpose}} </option>
@endforeach
</select>


  </div>

    <div class="form-group">
&nbsp &nbsp &nbsp From &nbsp &nbsp &nbsp
<input type="date" name="from_date" value="{{old('$from_date', date("Y-m-d") )}}" class="form-control " autofocus >
    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp To &nbsp &nbsp &nbsp
<input type="date" name="to_date" value="{{old('b_name', date("Y-m-d") )}}" class="form-control " >

    </div>


    <div class="form-group">

    </div>



    <select name="vehicle" class="form-control " autofocus >
      <option value="all" >   All    </option>
    @foreach( $vehicles as $vehicle )
              <option value="{{$vehicle->id}}" > {{$vehicle->number}} </option>
    @endforeach
    </select>




    &nbsp &nbsp &nbsp

                <button type="submit" class="btn btn-primary"> Show </button>


  </form>









@if( $trip_details != NULL )
</br>

<?php

$num = 1;

$t_expend = 0 ;

if(!isset($r_vehicle)){
  $r_vehicle = "all" ;
}

?>



@if(isset($from_date) AND isset($to_date) )

From {{$from_date}} To {{$to_date}} For {{$r_purpose}} Vehicle - {{$r_vehicle}}

@endif
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Vehicle</th>
        <th scope="col">Amount </th>
        <th scope="col">Comment </th>
      </tr>
    </thead>
    <tbody>




@foreach ($trip_details as $trip)

@if( $trip->trip_id_f->vehicles->id == $r_vehicle OR $r_vehicle == "all")

  <tr>
    <td scope="row">{{$num++}}</td>
    <td scope="row"> {{ $trip->date }} </td>
    <td scope="row"> {{ $trip->trip_id_f->vehicles->number }} </td>
    <td scope="row"> {{ $trip->out_amount }} </td>
    <td scope="row"> {{ $trip->comment }} </td>
  </tr>
<?php $t_expend = $t_expend + $trip->out_amount  ;?>

@endif

@endforeach
  <tr>
    <td scope="row"></td>
    <td scope="row"></td>
    <td scope="row"> Total </td>
    <td scope="row"> {{ $t_expend }} </td>
    <td scope="row"> </td>
  </tr>



    </tbody>
  </table>


@endif

</x-app-layout>
