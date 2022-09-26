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


  </form>


  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>




</x-app-layout>
