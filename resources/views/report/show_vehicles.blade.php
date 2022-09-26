<x-app-layout :menus=$menus>

  <x-slot:title> Show Vehicles </x-slot>

  <x-slot:menu>

  </x-slot>






</br>



<form class="form-inline" action="{{url('/show_vehicles')}}">
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
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Number</th>
      <th scope="col">Type</th>
      <th scope="col">Capacity</th>
      <th scope="col">Comment</th>
      <th scope="col">Entry By</th>
    </tr>
  </thead>

</table>


  <table class="table table-striped print-container">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Brand</th>
        <th scope="col">Model</th>
        <th scope="col">Number</th>
        <th scope="col">Type</th>
        <th scope="col">Capacity</th>
        <th scope="col">Comment</th>
        <th scope="col">Entry By</th>
      </tr>
    </thead>
    <tbody>

@php $num = 1 ; @endphp

@foreach ($vehicles as $vehicle)

  <tr>
    <th scope="row">{{$num++}}</th>
    <td>{{ $vehicle->brand }}</td>
    <td>{{ $vehicle->model }}</td>
    <td>{{ $vehicle->number }}</td>
    <td>{{ $vehicle->type }}</td>
    <td>{{ $vehicle->capacity }}</td>
    <td>{{ $vehicle->comment }}</td>
    <td>{{ $vehicle->users_f->name }}</td>

  </tr>

@endforeach




    </tbody>
  </table>




</x-app-layout>
