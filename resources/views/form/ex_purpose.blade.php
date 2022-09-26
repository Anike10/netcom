<x-app-layout :menus=$menus>

  <x-slot:title> Add In Purpose</x-slot>

  <x-slot:menu>

  </x-slot>


</br>

    @isset( $ex_purposes->last()->id )

    Last entry - {{ $ex_purposes->last()->ex_purpose   }}

    @endisset

  </br>
  </br>

    <div class="row mb-3">

      <div class="col-sm-1">    </div>
      <div class="col-sm-10">

  <form method="POST" action="{{url('/ex_type')}}">

   {!! csrf_field() !!}




       @php $name = "ex_purpose" ; @endphp

         <div class="row mb-3">
           <label for="{{$name}}" class="col-sm-2 col-form-label"> Expend Type </label>
           <div class="col-sm-6">
             <input type="text" name="{{$name}}" value="{{old($name)}}" class=" form-control form-control-lg" id="{{$name}}"   required>
           </div>
         </div>

       <br/>

       @if ($errors->first("ex_purpose") ) <div class="alert alert-danger"> {{ $errors->first("ex_purpose") }} </div> @endif

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
