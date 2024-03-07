
<?php use App\Models\Company;
use App\Models\User;

 ?>
 

@extends('templates.master')
@section('content-center')
@foreach ($errors->all() as $sError) <div class="alert alert-warning">{{ $sError }}</div> @endforeach

<div class=" card card-body content-center">
            <div class="card h-100">
                <a href="#" class="center">
                    <img src="/img/<?php echo $product['imgUrl']; ?>" class="card-img-top imagen" alt="<?php echo $product['nombre']; ?>">
                </a>
                <div class="card-body text-center"> <!-- Centramos el texto -->
                    <h5 class="card-title"><?php echo $product['name']; ?></h5></h5>
                    <p class="card-text">
                        <del>$<?php echo $product['price']; ?></del> $<?php echo $product['price'] - ($product['price'] * $product['discountPercent'] / 100); ?>
                    </p>
                    
                    
                    <p> <?php /*llamar a la funcion Company()*/ 
                    $company = Company::find($product['company_id']);
                    echo $company['name'];
                      ?></p>
                    <p>
                        <?php
                         echo $product['description'];
                        ?>
                    </p>
                    
                    @if (Auth::check())

                    @if(\App\Models\User::isEditor(Auth::user()))
                    <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Editar</a>
                    @endif
                    @endif
                    
                    
                    <a class="btn btn-primary" href="{{ route('cart.add', $product->id) }}">Añadir al carro</a>
                </div>
            </div>
        </div>
@endsection