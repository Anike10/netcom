<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ $title ?? 'Ultimate Solution' }} </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




        @livewireStyles



            <style>

{{$style  ?? NULL }}






@page {
  size: A4;
  margin: 0;
}
@media print {

.topnav { visibility: hidden ; }

.print-container, .print-container * {visibility: visible ;}

.print-container {
Position: fixed;
left: 0px;
top: 0px;

}

        html, body {
          width: 210mm;
          height: 297mm;
          min-height: 297mm;
        }
}













            <!-- Navbar -->
            body {margin:0;font-family:Arial}

            .topnav {
              overflow: hidden;
              background-color: #333;
            }

            .topnav a {
              float: right;
              display: block;
              color: #f2f2f2;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
              font-size: 17px;
            }

            .active {
              background-color: #04AA6D;
              color: white;
            }

            .topnav .icon {
              display: none;
            }

            .dropdown_w3 {
              float: right;
              overflow: hidden;
            }

            .dropdown_w3 .dropbtn {
              font-size: 17px;
              border: none;
              outline: none;
              color: white;
              padding: 14px 16px;
              background-color: inherit;
              font-family: inherit;
              margin: 0;
            }

            .drop-content_w3 {
              display: none;
              position: absolute;
              background-color: #f9f9f9;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }

            .drop-content_w3 a {
              float: none;
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
              text-align: left;
            }

            .topnav a:hover, .dropdown_w3:hover .dropbtn {
              background-color: #555;
              color: white;
            }

            .drop-content_w3 a:hover {
              background-color: #ddd;
              color: black;
            }

            .dropdown_w3:hover .drop-content_w3 {
              display: block  !important;
            }

            @media screen and (max-width: 600px) {
              .topnav a:not(:first-child), .dropdown_w3 .dropbtn {
                display: none;
              }
              .topnav a.icon {
                float: right;
                display: block;
              }
            }

            @media screen and (max-width: 600px) {
              .topnav.responsive {position: relative;}
              .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
              }
              .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
              }
              .topnav.responsive .dropdown_w3 {float: none;}
              .topnav.responsive .drop-content_w3 {position: relative;}
              .topnav.responsive .dropdown_w3 .dropbtn {
                display: block;
                width: 100%;
                text-align: left;
              }
            }
            </style>  <!-- Navbar -->



    </head>
    <body>

    <div class="topnav" id="myTopnav">

      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()"> &#9776; </a>


<a style="padding: 2px;" href="">

  <form method="POST" action="{{ route('logout') }}">
     @csrf
     <button type="submit" class="btn-lg btn-primary"> {{ auth()->user()->name }} Logout</button>
  </form>


 </a>




@php

  $menu_old_type = NULL ;
  $close_dropdown = 1 ;

@endphp




@foreach($attributes['menus'] as $menu)




@if($menu->type == NULL) <!-- if no type -->

@if($close_dropdown == 0)

</div> </div>

@endif




    <a class="{{ (request()->is($menu->url)) ? 'active' : '' }}" href="{{ url($menu->url) }}" > {{ $menu->name }} </a>

@else <!-- if dwropdown for type menu -->



@if($menu->type == $menu_old_type)

<a class="{{ (request()->is($menu->url)) ? 'active' : '' }}" href="{{ url($menu->url) }}" > {{ $menu->name }} </a>

@else

@if($close_dropdown == 0)

</div> </div>

@endif


@php $close_dropdown = 0 ; @endphp

<div class="dropdown_w3">
  <button class="dropbtn"> {{$menu->type}}
    <i class="fa fa-caret-down"></i>
  </button>



  <div class="drop-content_w3">

    <a class="{{ (request()->is($menu->url)) ? 'active' : '' }}" href="{{ url($menu->url) }}" > {{ $menu->name }} </a>


    <?php $menu_old_type = $menu->type ; ?>

@endif




@endif <!-- if no type -->


@endforeach

@if($close_dropdown == 0)

</div> </div>

@endif


    </div> <!-- 111 -->


<br/>


    <div style="padding-left:16px">         {{$slot}}           </div>




    <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }

{{$script  ?? NULL }}


    </script>





    </body>
</html>
