<x-app-layout :menus=$menus>

  <x-slot:title> Add Vehicle </x-slot>

  <x-slot:menu>

  </x-slot>



  <br/
  <br/>
  <br/>



  @isset($banks->last()->b_name)

  Last Entry - {{$banks->last()->b_name ." ( " . $banks->last()->acc_no .  " ) - " . $banks->last()->acc_name  }}

  @endisset



  <br/>
  <br/>
  <br/>

  <form method="POST" action="{{url('/add_bank')}}">

   {!! csrf_field() !!}

    <div class="row mb-3">
      <div class="col-sm-1"> </div>
      <label for="name" class="col-sm-2 col-form-label"> Bank Name </label>
      <div class="col-sm-3">
        <input type="text" name="b_name" value="{{old('b_name', )}}" class=" form-control form-control-lg" id="b_name" autofocus required>


  <br/>
  @if ($errors->first("b_name") ) <div class="alert alert-danger"> {{ $errors->first("b_name") }} </div>
  @endif

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-sm-1"> </div>
      <label for="name" class="col-sm-2 col-form-label"> Account Name </label>
      <div class="col-sm-3">
        <input type="text" name="acc_name" value="{{old('acc_name', )}}" class="form-control form-control-lg" id="acc_name" autofocus required>


  <br/>
  @if ($errors->first("acc_name") ) <div class="alert alert-danger"> {{ $errors->first("acc_name") }} </div>
  @endif

      </div>
    </div>

    <div class="row mb-3">
      <div class="col-sm-1"> </div>
      <label for="acc_no" class="col-sm-2 col-form-label"> Account Number </label>
      <div class="col-sm-3">
        <input type="text" name="acc_no" value="{{old('acc_no', )}}" class="form-control form-control-lg" id="acc_no" autofocus required>


  <br/>
  @if ($errors->first("acc_no") ) <div class="alert alert-danger"> {{ $errors->first("acc_no") }} </div>
  @endif

      </div>
    </div>


    <div class="row mb-3">
      <div class="col-sm-1"> </div>
      <label for="name" class="col-sm-2 col-form-label"> Comment </label>
      <div class="col-sm-3">
        <input type="text" name="comment" value="{{old('comment', )}}" class="form-control form-control-lg" id="comment" >


  <br/>
  @if ($errors->first("comment") ) <div class="alert alert-danger"> {{ $errors->first("comment") }} </div>
  @endif

      </div>
    </div>





    <div class="row mb-3">
      <div class="col-sm-1"> </div>
      <div class="col-sm-10 offset-sm-2">
        <div class="form-check">

            <button type="submit" class="btn btn-primary"> Save </button>

        </div>
      </div>
    </div>






  </form>


</x-app-layout>
