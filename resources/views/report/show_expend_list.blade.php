<x-app-layout :menus=$menus>

  <x-slot:title> Show Trips </x-slot>

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

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Purpose</th>
        <th scope="col">Amount </th>
      </tr>
    </thead>
    <tbody>

<?php $num = 1; ?>



    @foreach ($trip_details->groupBy('ex_purpose') as $trip)
        @if( $trip->last()->ex_purpose != NULL )
  <tr>
    <td scope="row">{{$num++}}</td>
    <td scope="row"> {{ $trip->last()->ex_purpose_f->ex_purpose }} </td>
    <td scope="row"> {{ $trip->sum('out_amount') }} </td>
  </tr>
    @endif
@endforeach


@endif


    </tbody>
  </table>




</x-app-layout>
