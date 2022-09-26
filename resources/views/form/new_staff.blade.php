<x-app-layout :menus=$menus>

  <x-slot:title> Add Vehicle </x-slot>

  <x-slot:menu>

  </x-slot>


</br>



  </br>
  </br>

    <div class="row mb-3">

      <div class="col-sm-1">    </div>
      <div class="col-sm-10">

  <form method="POST" action="{{url('/new_staff')}}">

   {!! csrf_field() !!}

<h1>    @if   (isset($staff) ) ID - {{ $staff->id }}

            <input type="hidden" value="{{ $staff->id }}" name="id">

        @else
            @isset( $staffs->last()->id )

                Last entry - {{ $staffs->last()->name ." ( " .  $staffs->last()->mobile .  " ) - " . $staffs->last()->f_name  }}

            @endisset

        @endif
</h1>

</br>


   @php $name = "status" ; @endphp

     <div class="row mb-3">
       <label for="{{$name}}" class="col-sm-2 col-form-label"> Status </label>
       <div class="col-sm-6">
          <select name="{{$name}}" value="{{old($name)}}" class=" form-control form-control-lg" id="{{$name}}" required>

              @if(isset($staff) )  <option > {{ $staff->status }} </option> @endif

                <option > </option>
                <option > Active </option>
                <option > InActive </option>

          </select>
       </div>
     </div>

   <br/>

   @php $name = "join_date" ; @endphp

     <div class="row mb-3">
       <label for="{{$name}}" class="col-sm-2 col-form-label"> Date </label>
       <div class="col-sm-6">
         <input type="date" name="{{$name}}" value="@if(isset($staff)){{$staff->join_date}}@else{{date("Y-m-d")}}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
       </div>
     </div>

   <br/>

  @php $name = "name" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> Name </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="@if(isset($staff) ){{ $staff->$name }}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>

  @php $name = "f_name" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> Fathers Name </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="@if(isset($staff) ){{ $staff->$name }}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>


  @php $name = "nid" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> NID </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="@if(isset($staff) ){{ $staff->$name }}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>


  @php $name = "d_licence" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> Driving Licence No </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="@if(isset($staff) ){{ $staff->driving_no }}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>


  @php $name = "address" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> Address </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="@if(isset($staff) ){{ $staff->$name }}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>



  @php $name = "mobile" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> Mobile </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="@if(isset($staff) ){{ $staff->$name }}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>

    @php $name = "role" ; @endphp

      <div class="row mb-3">
        <label for="{{$name}}" class="col-sm-2 col-form-label"> Role </label>
        <div class="col-sm-6">
          <select name="{{$name}}" value="@if(isset($staff) ){{ $staff->$name }}@endif" class=" form-control form-control-lg" id="{{$name}}" required>
              <option> @if(isset($staff) ){{ $staff->$name }}@endif </option>
              <option>  </option>
              <option> Driver </option>
              <option> Helper </option>
              <option> Incharge </option>
              <option> Officer </option>
          </select>
        </div>
      </div>

    <br/>



                <div class="row mb-3">
                    <label for="comment" class="col-sm-2 col-form-label"> Comment </label>
                    <div class="col-sm-3">
                      <input type="testarea" name="comment" value="@if(isset($staff) ){{ $staff->$name }}@endif" class=" form-control form-control-lg" id="comment" >

                <br/>
                @if ($errors->first("comment") ) <div class="alert alert-danger"> {{ $errors->first("comment") }} </div> @endif


                    </div>
                  </div>


        <br/>






    <div class="row mb-3">
      <div class="col-sm-10 offset-sm-2">
        <div class="form-check">

            <button type="submit" class="btn btn-primary"> @if(isset($staff) ) Update @else Save @endif </button>

        </div>
      </div>
    </div>




  </form>


</div>  <!-- End Form Collumn -->
</div>  <!-- End Main Row -->




</x-app-layout>
