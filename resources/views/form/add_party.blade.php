<x-app-layout :menus=$menus>

  <x-slot:title> Add Party </x-slot>

  <x-slot:menu>

  </x-slot>


</br>

    @isset( $partys->last()->id )

    Last entry - {{ $partys->last()->name ." ( " .  $partys->last()->mobile .  " ) "  }}

    @endisset

  </br>
  </br>

    <div class="row mb-3">

      <div class="col-sm-1">    </div>
      <div class="col-sm-10">

  <form method="POST" action="{{url('/add_party')}}">

   {!! csrf_field() !!}


     @php $name = "type" ; @endphp

       <div class="row mb-3">
         <label for="{{$name}}" class="col-sm-2 col-form-label"> Type </label>
         <div class="col-sm-6">

           <select name="{{$name}}" value="{{old($name)}}" class=" form-control form-control-lg" id="{{$name}}" style="width:150px" required>
                <option value='1' > Both  </option>
                <option value='2' > Customer  </option>
                <option value='3' > Vendor  </option>
           </select >

         </div>
       </div>

     <br/>

       @php $name = "name" ; @endphp

         <div class="row mb-3">
           <label for="{{$name}}" class="col-sm-2 col-form-label"> Name </label>
           <div class="col-sm-6">
             <input type="text" name="{{$name}}" value="{{old($name)}}" class=" form-control form-control-lg" id="{{$name}}"   required>
           </div>
         </div>

       <br/>



  @php $name = "address" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> Address </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="{{old($name)}}" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>



  @php $name = "mobile" ; @endphp

    <div class="row mb-3">
      <label for="{{$name}}" class="col-sm-2 col-form-label"> Mobile </label>
      <div class="col-sm-6">
        <input type="text" name="{{$name}}" value="{{old($name)}}" class=" form-control form-control-lg" id="{{$name}}" required>
      </div>
    </div>

  <br/>





                <div class="row mb-3">
                    <label for="comment" class="col-sm-2 col-form-label"> Comment </label>
                    <div class="col-sm-3">

                      <textarea name="comment" value="{{old('comment', )}}" class=" form-control form-control-lg" id="comment" >

                      </textarea>


                <br/>
                @if ($errors->first("comment") ) <div class="alert alert-danger"> {{ $errors->first("comment") }} </div> @endif


                    </div>
                  </div>


        <br/>






    <div class="row mb-3">
      <div class="col-sm-10 offset-sm-2">
        <div class="form-check">

            <button type="submit" class="btn btn-primary"> Save </button>

        </div>
      </div>
    </div>




  </form>


</div>  <!-- End Form Collumn -->
</div>  <!-- End Main Row -->




</x-app-layout>
