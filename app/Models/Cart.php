<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
 
    public $htItem = [];
    public $iTotalItems = 0;
    public $dTotalPrice = 0;
    // Constructor 
    public function __construct(Cart $cart = null){
        if($cart){
            $this->htItem = $cart->htItem;
            $this->iTotalItems = $cart->iTotalItems;
            $this->dTotalPrice = $cart->dTotalPrice;
        }
    }
  
    public function Add(Product $product){
        if(!array_key_exists($product->id, $this->htItem)){
            $this->htItem[$product->id] = [
                'product' => $product,
                'quantity' => 1
            ];
        }else{
            $this->htItem[$product->id]['quantity']+=1;
        }
        $this->iTotalItems+=1;
        $this->dTotalPrice += $product->price;
    }

  
    public function Remove(Product $product){
        if(array_key_exists($product->id, $this->htItem)){
            if($this->htItem[$product->id]['quantity'] > 0){
                $this->htItem[$product->id]['quantity']--;
            
                $this->iTotalItems--;
                $this->dTotalPrice -= $product->price;
            }
        }
    }
    public function RemoveAll(Product $product){
        if(array_key_exists($product->id, $this->htItem)){
            $this->iTotalItems -= $this->htItem[$product->id]['quantity'];
            $this->dTotalPrice -= $product->price * $this->htItem[$product->id]['quantity'];
            unset($this->htItem[$product->id]);
        }
    }


    use HasFactory;
}
