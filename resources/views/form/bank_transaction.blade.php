<x-app-layout :menus=$menus>

  <x-slot:title> Add Vehicle </x-slot>

  <x-slot:menu>

  </x-slot>





<br/
<br/>
<br/>



@isset($banks_t->amount)

Last entry : From {{ $banks_t->from_acc_f->acc_name . " ( " . $banks_t->from_acc_f->b_name  }} )  To {{ $banks_t->to_acc_f->acc_name . " ( " . $banks_t->to_acc_f->b_name  }} ) Tk  {{ $banks_t->amount }}

@endisset



<br/>
<br/>
<br/>

<form method="POST" action="{{url('/bank_transaction')}}">

 {!! csrf_field() !!}


  <div class="row mb-3">
    <div class="col-sm-1"> </div>
    <label for="name" class="col-sm-2 col-form-label"> Date </label>
    <div class="col-sm-3">
      <input type="date" name="date" value="{{old('name', date('Y-m-d') )}}" class=" form-control form-control-lg" id="date"required>

<br/>
@if ($errors->first("date") )
          <div class="alert alert-danger">
                            {{ $errors->first("date") }}
          </div>
@endif

    </div>
  </div>



    <div class="row mb-3">
      <div class="col-sm-1"> </div>

      <label for="from_acc" class="col-sm-2 col-form-label"> From Account </label>
      <div class="col-sm-5">
        <select name="from_acc" id="from_acc" class=" form-control form-control-lg" value="{{old('from_acc', )}}"  autofocus  required>

              <option value="">  </option>

              @foreach($banks->all() as $bank)
              <option value="{{$bank->id }}"> {{$bank->b_name ." - ". $bank->acc_name ." - ". $bank->acc_no }} </option>
              @endforeach


</select>


        <br/>



  @if ($errors->first("from_acc") )  <div class="alert alert-danger"> {{ $errors->first("from_acc") }}  </div> @endif


      </div>
    </div>



        <div class="row mb-3">
          <div class="col-sm-1"> </div>
          <label for="to_acc" class="col-sm-2 col-form-label"> To Account </label>
          <div class="col-sm-5">
            <select name="to_acc" id="to_acc" class=" form-control form-control-lg" value="{{old('to_acc', )}}"  autofocus  required>

              <option value="">  </option>

              @foreach($banks->all() as $bank)
              <option value="{{$bank->id }}"> {{$bank->b_name ." - ". $bank->acc_name ." - ". $bank->acc_no }} </option>
              @endforeach


    </select>


            <br/>



      @if ($errors->first("to_acc") )  <div class="alert alert-danger"> {{ $errors->first("to_acc") }}  </div> @endif


          </div>
        </div>



      <div class="row mb-3">
        <div class="col-sm-1"> </div>
          <label for="amount" class="col-sm-2 col-form-label"> Amount </label>
          <div class="col-sm-3">
            <input type="test" name="amount" value="{{old('amount', )}}" class=" form-control form-control-lg" id="amount" required>

      <br/>


      @if ($errors->first("amount") )  <div class="alert alert-danger"> {{ $errors->first("amount") }}  </div> @endif





          </div>
        </div>



              <div class="row mb-3">
                <div class="col-sm-1"> </div>
                  <label for="comment" class="col-sm-2 col-form-label"> Comment </label>
                  <div class="col-sm-3">
                    <input type="testarea" name="comment" value="{{old('comment', )}}" class=" form-control form-control-lg" id="comment" >

              <br/>
              @if ($errors->first("comment") ) <div class="alert alert-danger"> {{ $errors->first("comment") }} </div> @endif


                  </div>
                </div>


      <br/>




  <div class="row mb-3">
    <div class="col-sm-1"> </div>
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">

          <button type="submit" class="btn btn-primary"> Save </button>

      </div>
    </div>
  </div>






</form>



<br/>
<br/>
<br/>




</x-app-layout>
