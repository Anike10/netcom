<x-app-layout :menus=$menus>

  <x-slot:title> New Project </x-slot>

  <x-slot:menu>

  </x-slot>




  <br/>
  <br/>
  <br/>

  <form method="POST" action="{{url('/new_project')}}">

   {!! csrf_field() !!}


   @isset( $projects->last()->id )

   Last entry - {{ $projects->last()->address   }}

   @endisset



    <div class="row mb-3">
      <div class="col-sm-1"> @php $form_name = "date" ; @endphp </div>

      <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Date </label>
      <div class="col-sm-3">
        <input type="date" name="{{$form_name}}" value="{{old('', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus >


  <br/>
  @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
  @endif

      </div>
    </div>



        <div class="row mb-3">
          <div class="col-sm-1"> @php $form_name = "clint_id" ; @endphp </div>

            <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Client </label>
            <div class="col-sm-3">
                <select name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" required>
                    <option > </option >


      @foreach($parties as $party )
                        <option value='{{ $party->id }}'>  {{ $party->name . ' ( ' .  $party->mobile . ' )' }}  <option>
      @endforeach

                </select>

              <br/>
              @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
              @endif

              </div>
        </div>




                <div class="row mb-3">
                  <div class="col-sm-1"> @php $form_name = "address" ; @endphp </div>

                    <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Address </label>
                    <div class="col-sm-3">
                        <input type="test" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus >


                      <br/>
                      @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
                      @endif

                      </div>
                </div>



                <div class="row mb-3">
                  <div class="col-sm-1"> @php $form_name = "map_location" ; @endphp </div>

                    <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Map Location </label>
                    <div class="col-sm-3">
                        <input type="test" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus >


                      <br/>
                      @if ($errors->first("$form_name") ) <div class="alert alert-danger"> {{ $errors->first("$form_name") }} </div>
                      @endif

                      </div>
                </div>







        <div class="row mb-3">
          <div class="col-sm-1"> @php $form_name = "comment" ; @endphp </div>

            <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Comment </label>
            <div class="col-sm-3">
                <input type="test" name="{{ $form_name }}" value="{{old('b_name', )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus >


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
