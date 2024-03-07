

<?php use App\Models\Company;


?>


@extends('templates.master')
@section('content-center')

<div class="row"> <!-- Agregamos margen inferior para separar las filas -->



  <p>
    <strong style="margin-left: 20px; display:inline-block;">Número total de productos:  </strong>
    
    <?php echo $cart->iTotalItems; 
    echo "     " ?>
    
  </p>
  <br>



  <p>
    <strong>Precio total:</strong>
    <?php echo $cart->dTotalPrice; ?>
  </p>





<?php foreach ($cart->htItem as $product): ?>
    

    <div class="col-sm-2 card card-body">
        <div class="card h-100">
            <a href="product/<?php echo $product['product']['id']; ?>" class="center">
                <img src="img/<?php echo $product['product']['imgUrl']; ?>" class="card-img-top" alt="<?php echo $product['product']['nombre']; ?>">
            </a>
            <div class="card-body text-center"> <!-- Centramos el texto -->
                <h5 class="card-title"><?php echo $product['product']['name']; ?></h5></h5>
                <p class="card-text">
                    <del>$<?php echo $product['product']['price']; ?></del> $<?php echo $product['product']['price'] - ($product['product']['price'] * $product['product']['discountPercent'] / 100); ?>
                </p>
                <a href="{{ route('cart.operate', [ 'operation' => 'add', 'product' => $product['product']['id']]) }}">
                  [+]
                </a>
                <p>
                    <?php
                     echo $product['quantity'];
                    ?>
                </p>
                <a href="{{ route('cart.operate', [ 'operation' => 'remove', 'product' => $product['product']['id']]) }} "style="margin=10px">
                  [-]
                </a>
                <a class="btn btn-primary" href="{{ route('cart.operate', [ 'operation' => 'removeAll', 'product' => $product['product']['id']]) }}">Eliminar producto del carro</a>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

</div>


@endsection