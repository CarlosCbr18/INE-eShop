<?php

namespace Tests\Unit;

use App\Models\Cart;
use App\Models\Product;

use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    // crear variable estatica cart
    public static $cart;
    public function testConstructor(): void
    {
   
        $cart = new Cart();
        $this->assertEquals([], $cart->htItem);
        $this->assertEquals(0, $cart->iTotalItems);
        $this->assertEquals(0, $cart->dTotalPrice);
    }
    
    public static function InitializeCart(): void
    {
        self::$cart = new Cart();
        self::$cart->Add(Product::find(1));
        self::$cart->Add(Product::find(2));
        self::$cart->Add(Product::find(2));
        self::$cart->Add(Product::find(4));

    }

   



    
   

    
    public function testAdd(): void
    {
      
        $this->InitializeCart();
        self::$cart->Add(Product::first());
        $this->assertEquals(5, self::$cart->iTotalItems);
        

       
    }
    public function testRemove(): void
    {
        $this->InitializeCart();

        self::$cart->Remove(Product::first());
        $this->assertEquals(3, self::$cart->iTotalItems);
    }
        
    
    public function testRemoveAll(): void
    {
        self::InitializeCart();
        //var_dump( self::$cart->htItem);
        self::$cart->RemoveAll(Product::find(2));
        $this->assertEquals(3, self::$cart->iTotalItems);
    }
    
}
