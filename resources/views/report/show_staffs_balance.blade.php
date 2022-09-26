<x-app-layout :menus=$menus>

  <x-slot:title> Stafs Balance List </x-slot>

  <x-slot:menu>

  </x-slot>

</br>

<form class="form-inline" action="{{url('/show_staffs')}}">
    <div class="form-group">
&nbsp &nbsp &nbsp Brand &nbsp &nbsp &nbsp
<input type="text" name="brand" value="{{old('b_name', )}}" class="form-control " autofocus >
    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp Model &nbsp &nbsp &nbsp
<input type="text" name="model" value="{{old('b_name', )}}" class="form-control " >

    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp Type &nbsp &nbsp &nbsp
<input type="text" name="type" value="{{old('b_name', )}}" class="form-control " >

    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp Capacity &nbsp &nbsp &nbsp
<input type="text" name="capacity" value="{{old('b_name', )}}" class="form-control " >

    </div>

    <div class="form-group">

    </div>


    &nbsp &nbsp &nbsp

                <button type="submit" class="btn btn-primary"> Show </button>
                &nbsp &nbsp &nbsp
            <button class="btn btn-primary" onclick="window.print()">Print this page</button>


  </form>

</br>

  <table class="table table-striped print-container">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Balance</th>
        <th scope="col">Name</th>
        <th scope="col">Mobile</th>
        <th scope="col">Role</th>
      </tr>
    </thead>
    <tbody>

@php $num = 1 ; @endphp




@foreach ($staffs as $staff)

  <tr>
    <th scope="row">{{$num++}}</th>
    <td>
@php

$bal_out  = $staff->transaction_out_f->sum('amount') ;
$bal_in   = $staff->transaction_in_f->sum('amount') ;

@endphp

<a href="staff_balance_details?staff={{$staff->id}}">      {{$balance = $bal_out - $bal_in}} </a>

       <!-- ( {{ $bal_out }} - {{ $bal_in }} ) -->

    </td>
    <td>
        <a href="new_staff?update={{$staff->id}}" > {{ $staff->name }} </a>
    </td>
    <th scope="col">Mobile</th>
    <td>{{ $staff->role }}</td>

  </tr>

@endforeach




    </tbody>
  </table>




</x-app-layout>
