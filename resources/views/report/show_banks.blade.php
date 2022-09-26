<x-app-layout :menus=$menus>

  <x-slot:title> Show banks </x-slot>

  <x-slot:menu>

  </x-slot>

</br>

<form class="form-inline" action="{{url('/show_banks')}}">
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
        <th scope="col">Balance</th>
        <th scope="col">Bank Name</th>
        <th scope="col">Account Name</th>
        <th scope="col">Account Number</th>
        <th scope="col">Comment</th>
        <th scope="col">Entry By</th>
      </tr>
    </thead>
    <tbody>

@php $num = 1 ; @endphp

@foreach ($banks as $bank)

  <tr>
    <th scope="row">{{$num++}}</th>
    <td>
{{ $bank->transaction_to_f->sum('amount')  - $bank->transaction_from_f->sum('amount')}}
    </td>
    <td>{{ $bank->b_name }}</td>
    <td>{{ $bank->acc_name }}</td>
    <td>{{ $bank->acc_no }}</td>
    <td>{{ $bank->comments }}</td>
    <td>{{ $bank->users_f->name }}</td>


  </tr>

@endforeach




    </tbody>
  </table>




</x-app-layout>
