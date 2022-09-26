<x-app-layout :menus=$menus>

  <x-slot:title> Show Trips </x-slot>

  <x-slot:menu>

  </x-slot>

</br>

<form class="form-inline" action="{{url('/show_trips')}}">
    <div class="form-group">
&nbsp &nbsp &nbsp From &nbsp &nbsp &nbsp
<input type="date" name="from_date" value="{{old('b_name', )}}" class="form-control " autofocus >
    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp To &nbsp &nbsp &nbsp
<input type="date" name="to_date" value="{{old('b_name', )}}" class="form-control " >

    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp Driver &nbsp &nbsp &nbsp

<select name="driver" value="" class="form-control form-control-lg" id="" >
    <option > </option >


</select>

    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp Helper &nbsp &nbsp &nbsp

<select name="helper" value="" class="form-control form-control-lg" id="" >
    <option > </option >


</select>

    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp vehicle &nbsp &nbsp &nbsp

<select name="vehicle" value="" class="form-control form-control-lg" id="" >
  <option > </option >



</select>


    </div>

    <div class="form-group">

    </div>


    &nbsp &nbsp &nbsp

                <button type="submit" class="btn btn-primary"> Show </button>


  </form>

</br>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Project ID</th>
        <th scope="col">Client name</th>
        <th scope="col"> Address </th>
        <th scope="col"> Map Location </th>
        <th scope="col"> Comment</th>
        <th scope="col">Entry By</th>
      </tr>
    </thead>
    <tbody>

@php $num = 1 ; @endphp

@foreach ($projects as $project)

  <tr>
    <th scope="row">  {{$num++}}              </th>
    <td>              {{ $project->id }}      </td>
    <td>              {{ $project->party_f->name }}    </td>
    <td>              {{ $project->address }}      </td>
    <td>  <a href=" https://maps.google.com/?q={{ $project->map_location }}" target="_blank" >  {{ $project->map_location }}   </a>   </td>
    <td>              {{ $project->comment }}      </td>
    <td>              {{ $project->entry_by }}      </td>



  </tr>

@endforeach




    </tbody>
  </table>




</x-app-layout>
