

@extends('templates.master')


<!doctype html>
<!-- Bootstrap first template for Internet y Negocio Electrónico, University of Cadiz,
     since 2019, based on https://www.w3schools.com/bootstrap4/bootstrap_templates.asp -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
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
        .aside{
          margin-left: 60px;
        }
      
      
        
     
    </style>

    <title>My INE project</title>
  </head>

  <body>

   

    <!-- LAYOUT: CENTER -->
    @section('content-center')
    
      
<div class="row">
    <div class="col-8 aside">
    <h2 class="titulo">Ofertas del día</h2>
    <div class="row mb-4"> <!-- Agregamos margen inferior para separar las filas -->

    <?php foreach ($aProduct_offering as $product): ?>

        <div class="col-sm-2 card card-body">
            <div class="card h-100">
                <a href="product/<?php echo $product['id']; ?>" class="center">
                    <img src="img/<?php echo $product['imgUrl']; ?>" class="card-img-top" alt="<?php echo $product['nombre']; ?>">
                </a>
                <div class="card-body text-center"> <!-- Centramos el texto -->
                    <h5 class="card-title"><?php echo $product['name']; ?></h5></h5>
                    <p class="card-text">
                        <del>$<?php echo $product['price']; ?></del> $<?php echo $product['price'] - ($product['price'] * $product['discountPercent'] / 100); ?>
                    </p>
                </div>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
    <h2>Nuevos Productos</h2>
    <div class="row mb-4"> <!-- Agregamos margen inferior para separar las filas -->
    <?php foreach ($aProduct_new as $product): ?>

    
        <div class="col-sm-2 card card-body">
            <div class="card h-100">
                <a href="product/<?php echo $product['id']; ?>" class="center">
                    <img src="img/<?php echo $product['imgUrl']; ?>" class="card-img-top" alt="<?php echo $product['nombre']; ?>">
                </a>
                <div class="card-body text-center"> <!-- Centramos el texto -->
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p class="card-text"> 
                        <?php if ($product->HasDiscount()): ?>
    <del>$<?php echo $product['price']; ?></del> $<?php echo $product['price'] - ($product['price'] * $product['discountPercent'] / 100); ?>
    <?php else : ?>
    $<?php echo $product['price']; ?>
<?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


       

        
        </div>
    </div>


@endsection
    <!-- LAYOUT: RIGHT ASIDE -->
    @section('content-right')

<div class="col-3  card card-body titulo" style="background-color: #E0E0E0;">
        <h5>Lo más vendido en tablets</h5>
        <div class="row margin">
            <a href="#">
                <p class="enumTablets">1</p>
                <img src="img/Apple 2021 iPad.jpeg" alt="Apple 2021 iPad" width="100" height="120" style="float: left;">
            </a>
        </div>
        <div class="row margin">
                <a href="#">
                    <p class="enumTablets">2</p>
                    <img src="img/Samsung Galaxy Tab A8.jpg" alt="Samsung Galaxy Tab A8" width="120" height="120" style="float: left;">
                </a>
        </div>
        <div class="row">
                <a href="#">
                    <p class="enumTablets">3</p>
                    <img src="img/Lenovo Tab M10 Plus.jpg" alt="Lenovo Tab M10 Plus" width="120" height="120" style="float: left;">
                </a>
        </div>
        <div class="row margin">
                <a href="#">
                    <p class="enumTablets">4</p>
                    <img src="img/Samsung Galaxy Tab S6 Lite.jpg" alt="Samsung Galaxy Tab S6 Lite" width="120" height="120" style="float: left;">
                </a>
        </div>
        <div class="row margin">
                <a href="#">
                    <p class="enumTablets">5</p>
                    <img src="img/Lenovo Tab M9.jpg" alt="Lenovo Tab M9" width="120" height="120"style="float: left;">
                </a>
        </div>
          <button class="btn btn-primary btn-block m-2">Ver más tablets</button>
    </div>
</div>
@endsection

    



    

   

    <!-- Loading Javascripts -->   

  </body>
</html>