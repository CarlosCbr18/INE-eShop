<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    //
    public function show(Request $request){
        $cart = $request->session()->get('cart');
        return view('cart.show', compact('cart'));
    }

public function add(Product $product, Request $request){
    $cart = new Cart($request->session()->get('cart'));
    $cart->Add($product);
    $request->session()->put('cart', $cart);
    return redirect()->route('product.show', $product)->with('success', 'El producto ha sido añadido al carro.');

}


public function remove(Product $product, Request $request){
    $cart = new Cart($request->session()->get('cart'));
    $cart->Remove($product);
    $request->session()->put('cart', $cart);
    return redirect()->route('cart.show')->with('success', 'El producto ha sido eliminado del carro.');
}

public function removeAll(Product $product, Request $request){
    $cart = new Cart($request->session()->get('cart'));
    $cart->RemoveAll($product);
    $request->session()->put('cart', $cart);
    return redirect()->route('cart.show')->with('success', 'El producto ha sido eliminado del carro.');
}

public function operate(String $sOperation, Product $product, Request $request){
    switch($sOperation){
        case 'add':
            $this->add($product, $request);
            return redirect()->route('cart.show')->with('success', 'El producto ha sido añadido al carro.');;
        case 'remove':
            $this->remove($product, $request);
            return redirect()->route('cart.show')->with('success', 'El producto ha sido eliminado del carro.');
        case 'removeAll':
            $this->removeAll($product, $request);
            return redirect()->route('cart.show')->with('success', 'El producto ha sido eliminado del carro.');
        default:
            return redirect()->route('cart.show')->with('error', 'Operación no válida.');
    }
}


}
