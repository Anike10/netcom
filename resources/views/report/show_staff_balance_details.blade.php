<x-app-layout :menus=$menus>

  <x-slot:title> Stafs Balance List </x-slot>

  <x-slot:menu>

  </x-slot>

</br>


<form class="form-inline" action="{{url('/staff_balance_details')}}">


      &nbsp &nbsp &nbsp      &nbsp &nbsp &nbsp      &nbsp &nbsp &nbsp
Find Staff &nbsp &nbsp
    <select name="staff">
      <option>  </option>
      @foreach($staffs->Where('status' , 'Active') as $staff_d)
          <option value='{{$staff_d->id}}'> {{$staff_d->id . " - " . $staff_d->name . " - " .$staff_d->mobile}} </option>
      @endforeach
    </select>
      &nbsp &nbsp &nbsp
                  <button type="submit" class="btn btn-primary"> Show </button>


  </form>

</br>

@if($staff != NULL)

          <a href='{{url('/staff_payment')}}?staff={{$staff->id}}'>  <button class="btn btn-primary" >Make New Payment</button>   </a>

  <table class="table table-striped print-container">
    <thead>
      <tr>
        <th scope="col"> #        </th>
        <th scope="col"> Date     </th>
        <th scope="col"> Purpose  </th>
        <th scope="col"> Payable  </th>
        <th scope="col"> payment  </th>
        <th scope="col"> Balance  </th>
      </tr>
    </thead>
    <tbody>


@php

  $num      =   1 ;
  $balance  =   0 ;

@endphp

@foreach ($transactions as $transaction)

  <tr>
    <th scope="row">{{$num++}}</th>
    <th scope="col">  {{ $transaction->date     }}  </th>
    <th scope="col">  {{ $transaction->type  }} - {{ $transaction->comment  }}  </th>
    <th scope="col">
      @if($transaction->from_staff_id != Null)
          {{ $transaction->amount }}
          @php    $balance =  $balance +  $transaction->amount   @endphp
      @endif

     </th>
    <th scope="col">
      @if($transaction->to_staff_id != Null)
          {{ $transaction->amount }}
          @php    $balance =  $balance - $transaction->amount   @endphp
      @endif
    </th>
    <th scope="col">  {{ $balance  }}  </th>


  </tr>

@endforeach


@endif



    </tbody>
  </table>




</x-app-layout>
