<x-app-layout :menus=$menus>

  <x-slot:title> Show Trips </x-slot>

  <x-slot:menu>

  </x-slot>

</br>


{{$search  ?? NULL }}

</br>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Trip ID</th>
        <th scope="col">Balance</th>
        <th scope="col">Start Date </th>
        <th scope="col">End Date</th>
        <th scope="col">Driver</th>
        <th scope="col">Helper </th>
        <th scope="col">Vehicle</th>
        <th scope="col">Comment</th>
        <th scope="col">Entry By</th>
      </tr>
    </thead>
    <tbody>

@php $num = 1 ; @endphp

@foreach ($trips as $trip)

  <tr>
    <th scope="row">{{$num++}}</th>
    <td> @if($trip->status == 0) <a href="{{url('update_trip').'?trip='.$trip->id}}"> {{ $trip->id }} </a> @else {{ $trip->id }} @endif </td>
    <td> <a href="{{url('update_trip').'?trip='.$trip->id}}"> {{ $trip->balance }}</td> </a>
    <td>{{ $trip->from_date }}</td>

    <td>
@if($trip->status == 0) Running
@else
      {{ $trip->to_date }}
@endif

    </td>

    <td>{{ $trip->drivers->name }}</td>
    <td>{{ $trip->helpers->name }}</td>
    <td>{{ $trip->vehicles->number }}</td>
    <td>{{ $trip->comment }}</td>
    <td>{{ $trip->users->name }}</td>


  </tr>

@endforeach




    </tbody>
  </table>




</x-app-layout>
