<x-app-layout :menus=$menus>

  <x-slot:title> Add Vehicle </x-slot>

  <x-slot:menu>

  </x-slot>



  @isset($vehicles->last()->number)

  Last entry - {{ $vehicles->last()->number ." ( " . $vehicles->last()->brand .  " ) - " . $vehicles->last()->type  }}

  @endisset



  <br/>
  <br/>
  <br/>

  <form method="POST" action="{{url('/add_vehicle')}}">

   {!! csrf_field() !!}

   @isset($errors ) <div class="alert alert-danger"> {{ $errors }} </div>    @endisset


    <div class="row mb-3">
      <div class="col-sm-1"> @php $form_name = "brand" ; @endphp </div>

      <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Brand </label>
      <div class="col-sm-3">
        <input type="text" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus required>


  <br/>
  @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
  @endif

      </div>
    </div>



        <div class="row mb-3">
          <div class="col-sm-1"> @php $form_name = "model" ; @endphp </div>

          <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Model </label>
          <div class="col-sm-3">
            <input type="text" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus required>


      <br/>
      @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
      @endif

          </div>
        </div>



        <div class="row mb-3">
          <div class="col-sm-1"> @php $form_name = "number" ; @endphp </div>

            <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Number </label>
            <div class="col-sm-3">
                <input type="text" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus required>


              <br/>
              @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
              @endif

              </div>
        </div>


        <div class="row mb-3">
          <div class="col-sm-1"> @php $form_name = "type" ; @endphp </div>

            <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Type </label>
            <div class="col-sm-3">

              <select name="{{ $form_name }}" class="form-control form-control-lg" required>
                <option value=''> </option>
                <option value='open_truck'> Open Truck </option>
                <option value='covered_van'> Covered Van </option>
                <option value='motor_cycle'> Motor Cycle </option>
                <option value='mpv'> MPV </option>


              </select>

              <br/>
              @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
              @endif

              </div>
        </div>





        <div class="row mb-3">
          <div class="col-sm-1"> @php $form_name = "capacity" ; @endphp </div>

            <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Capacity </label>
            <div class="col-sm-3">
                <input type="text" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus required>


              <br/>
              @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
              @endif

              </div>
        </div>


        <div class="row mb-3">
          <div class="col-sm-1"> @php $form_name = "comment" ; @endphp </div>

            <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Comment </label>
            <div class="col-sm-3">
                <input type="text" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus >


              <br/>
              @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
              @endif

              </div>
        </div>










    <div class="row mb-3">
      <div class="col-sm-10 offset-sm-2">
        <div class="form-check">

            <button type="submit" class="btn btn-primary"> Save </button>

        </div>
      </div>
    </div>






  </form>



</x-app-layout>
