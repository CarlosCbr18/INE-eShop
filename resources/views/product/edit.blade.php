@extends('templates.master')

<@foreach ($errors->all() as $sError)
<div class="alert alert-warning">{{ $sError }}</div>
@endforeach
<div class="card">
    <div class="card-header text-center font-weight-bold">
        Datos del producto 
    </div>
    <div class="card-body">
        <form name="edit-user-form" id="edit-user-form" action="{{ route('product.update', ['product' => $product]) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                
                            

                <label for="name">{{ __('auth.Name') }}</label>
                <input type="text" id="name" name="name" class="form-control" required=""
                    value="{{ $product->name }}" />
                <label for="description">{{ __('auth.Product Description') }}</label>
                <input type="text" id="description" name="description" class="form-control" required=""
                    value="{{ $product->description }}" />


           

               
            </div>
            <button type="submit" class="btn btn-primary">{{
                __('auth.Save') }}</button>
        </form>
    </div>
</div>

