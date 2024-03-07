<!doctype html>
<!-- Bootstrap first template for Internet y Negocio Electrónico, University of Cadiz,
     since 2019, based on https://www.w3schools.com/bootstrap4/bootstrap_templates.asp -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <!-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 
    -->
    <style>
      
      .fakeimg { height: 100px; background: #aaa; }
      .jumbotron{
        background-color: #EB8D79;

      }
      .inline{
        display: inline-block;
        /* margen izquierdo*/
        margin-left: 25px;

      }
      .retoque{
        margin-left: 50px;


      }
      .imagen{
      /*Centrar*/
      display: block;
      margin-left: auto;
      margin-right: auto;
      
        width: 20rem;
      }
      .goleft{
        float:right;
        margin-top:20px;
        margin-right:20px;

       
      }
      .goleft a{
        color:black;
      }
      .card{
        border:none;
      }
      
      .titulo{
        margin-top: 50px;}
      .form-inline{
        margin-bottom: 10px;
       }
       .font-weight-bold{
          color: #6F6462;
       }
       .enumTablets{
        color: gray;
        font-size: 60px; 
        float: left; 
        margin-right: 10px;
      }
      .margin{
        margin-bottom: 30px;}
      
      
        
     
    </style>

    <title>My INE project</title>
  </head>

  <body>
    @include('layouts.header')

   

    <!-- LAYOUT: CENTER -->
    @yield('content-center') 
    <!-- LAYOUT: RIGHT -->
    @yield('content-right')
    
      

    
@include('layouts.footer')



    

   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
    
    <script src="js/bootstrap.min.js"></script>

    <!-- Loading Javascripts -->   

  </body>
</html>





