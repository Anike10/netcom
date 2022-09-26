<x-app-layout :menus=$menus>

  <x-slot:title> Advance </x-slot>
  <x-slot:script> </x-slot> <!-- Script -->

  <x-slot:menu>  </x-slot>

  <x-slot>



    &nbsp &nbsp &nbsp

    <form class="form-inline" method="GET" action="{{url('/trip_advance')}}">


        &nbsp &nbsp &nbsp      &nbsp &nbsp &nbsp      &nbsp &nbsp &nbsp
Find Trip &nbsp &nbsp
      <select name="trip">
        <option>  </option>
        @foreach($trips->Where('status' , 0) as $trip_op)
            <option value='{{$trip_op->id}}'> {{$trip_op->id . " - " . $trip_op->vehicles->number . " - " .$trip_op->drivers->name}} </option>
        @endforeach
      </select>
        &nbsp &nbsp &nbsp
                    <button type="submit" class="btn btn-primary"> Show </button>
      </form>

    <br/>

@if($trip != NULL)

<div  class="form-inline" >

      <div class="form-group">
  &nbsp &nbsp &nbsp From &nbsp &nbsp &nbsp
  {{ $trip->from_date }}
      </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp To &nbsp &nbsp &nbsp
  @if($trip->to_date == NULL) Running @else  {{ $trip->to_date }} @endif

      </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp Driver &nbsp &nbsp &nbsp
{{ $trip->drivers->name }}

      </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp Helper &nbsp &nbsp &nbsp
{{ $trip->helpers->name }}

      </div>

      <div class="form-group">
  &nbsp &nbsp &nbsp vehicle &nbsp &nbsp &nbsp
{{ $trip->vehicles->number }}

      </div>

      <div class="form-group">

      </div>

</div> <!-- class="form-inline" -->


  <br/>


  <div class="row mb-3">
    <div class="col-sm-1">  </div>
    <div class="col-sm-6">



        <form method="POST" action="{{url('/trip_advance')}}">

         {!! csrf_field() !!}



         @foreach($errors as $error) {{ $error }} @endforeach

            @if ($errors->any() != NULL ) <div class="alert alert-danger"> @foreach($errors->all() as $error) {{ $error }} @endforeach </div>
            @endif

             <div class="row mb-3">


                     <div class="col-sm-1"> @php $form_name = "trip_id" ; @endphp </div>

                     <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Trip ID </label>
                     <div class="col-sm-3">
                       <input type="text" name="{{ $form_name }}" value="{{$trip->id}}" class="form-control form-control-lg" id="{{ $form_name }}" style="width:70px" disabled >
                       <input type="hidden" name="{{ $form_name }}" value="{{$trip->id}}" class="form-control form-control-lg" id="{{ $form_name }}" style="width:70px" >


                       <br/>
                       @error($form_name)
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                     </div>
                   </div>







                 <div class="row mb-3">
               <div class="col-sm-1"> @php $form_name = "date" ;   @endphp </div>

               <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Date </label>
               <div class="col-sm-3">
                 <input type="date" name="{{ $form_name }}" value="{{old($form_name, )}}" class="form-control form-control-lg" id="{{ $form_name }}" autofocus required >


           <br/>
           @error($form_name)
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror

               </div>
             </div>







                     <div class="row mb-3">
                       <div class="col-sm-1"> @php $form_name = "bank" ; @endphp </div>

                       <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Account </label>
                       <div class="col-sm-8">

         <select name="{{ $form_name }}" value="{{old($form_name, )}}" class="form-control form-control-lg" id="{{ $form_name }}" required>

                   <option value"" > </option>
         @foreach($banks as $bank)

                   <option value="{{$bank->id}}" > {{$bank->acc_name . " ( " . $bank->b_name  }} ) </option>

         @endforeach



         </select >

                         <br/>
                         @error($form_name)
                             <div class="alert alert-danger">{{ $message }}</div>
                         @enderror


                       </div>
                     </div>


                       <div class="row mb-3">
                         <div class="col-sm-1"> @php $form_name = "amount" ; @endphp </div>

                         <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Amount </label>
                         <div class="col-sm-8">
                           <input type="text" name="{{ $form_name }}" value="{{old($form_name, )}}" class="form-control form-control-lg" id="{{ $form_name }}" required >


                           <br/>
                           @error($form_name)
                               <div class="alert alert-danger">{{ $message }}</div>
                           @enderror


                         </div>
                       </div>



                         <div class="row mb-3">
                           <div class="col-sm-1"> @php $form_name = "comment" ; @endphp </div>

                           <label for="{{ $form_name }}" class="col-sm-2 col-form-label"> Comment </label>
                           <div class="col-sm-8">
                             <input type="text" name="{{ $form_name }}" value="{{old($form_name, )}}" class="form-control form-control-lg" id="{{ $form_name }}" >


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

         </from>


     </div>      <!-- col-sm-6 -->
    <div class="col-sm-4">

@php  $t_advance = 0 ;          @endphp
      @foreach( $trip->trip_transaction_advance_f->where('type','advance') as $advance )
      {{ $advance->amount }} </br>
      @php  $t_advance = $t_advance + $advance->amount ;          @endphp
      @endforeach

    Total -  {{ $t_advance }}

    </div>

  </div>      <!-- col-sm-4-->















@endif






</x-app-layout>
