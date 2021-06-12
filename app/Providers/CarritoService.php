<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use App\Models\Carrito;
use Illuminate\Support\Facades\Cookie;

class CarritoService 
{

    public function getFromCookie(){
        $cardId=Cookie::get('cart');
        $cart =Carrito::find($cardId);
        return $cart;
    }

    public function getFromCookieOrCreate(){
        $cart = $this->getFromCookie();
        return $cart ?? Carrito::create();
    }
    
    public function makeCookie(Carrito $cart){
        return Cookie::make('cart',$cart->id,7 * 24 * 60);
    }

    public function contarProducto(){
        $carrito=$this->getFromCookie();
        if ($carrito!=null) {
            return $carrito->productos->pluck('pivot.cantidad')->sum();
        }
        return 0;
    }
}
