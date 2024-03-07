<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class ProductController extends Controller
{
   
    public function welcome(){
        $aProduct_offering = Product::Offerings();
        $aProduct_new = Product::NewProducts();
        return view('welcome', compact('aProduct_offering', 'aProduct_new'));
        
    }

    public function show(Product $product){
        return view('product.show', compact('product'));
    }


    public function addToCart(Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));
        $cart->Add($product);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.show', $product)->with('success', 'El producto ha sido añadido al carro.');
    }

    //Hacer edit y update de product

    public function edit(Product $product){
        return view('product.edit', compact('product'));
    }
    public function update(Product $product, Request $request){
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return back()->with(['success' => ['Los datos han sido modificados.']]);
        
    }




    
}
