<x-app-layout :menus=$menus>

  <x-slot:title> Show parties </x-slot>

  <x-slot:menu>

  </x-slot>

</br>

<form class="form-inline" action="{{url('/show_parties')}}">
    <div class="form-group">
&nbsp &nbsp &nbsp Nameame &nbsp &nbsp &nbsp
<input type="text" name="name" value="{{old('b_name', )}}" class="form-control " autofocus >
    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp Mobile &nbsp &nbsp &nbsp
<input type="text" name="mobile" value="{{old('b_name', )}}" class="form-control " >

    </div>

    <div class="form-group">
&nbsp &nbsp &nbsp Type &nbsp &nbsp &nbsp
<input type="text" name="type" value="{{old('b_name', )}}" class="form-control " >

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
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Mobile</th>
        <th scope="col">Comment</th>
        <th scope="col">Entry By</th>
      </tr>
    </thead>
    <tbody>

@php $num = 1 ; @endphp

@foreach ($parties as $party)

  <tr>
    <th scope="row">{{$num++}}</th>
    <td>{{ $party->name }}</td>
    <td>{{ $party->address }}</td>
    <td>{{ $party->mobile }}</td>
    <td>{{ $party->comment }}</td>
    <td>{{ $party->users_f->name }}</td>


  </tr>

@endforeach




    </tbody>
  </table>




</x-app-layout>
