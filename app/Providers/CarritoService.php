<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use App\Models\Carrito;
use Illuminate\Support\Facades\Cookie;

class CarritoService 
{
    protected $cookieName;
    protected $cookieExpiration;

    public function __construct(){
        $this->cookieName= config('cart.cookie.name');    
        $this->cookieExpiration= config('cart.cookie.expiration');
    }
    public function getFromCookie(){
        $cardId=Cookie::get($this->cookieName);
        $cart =Carrito::find($cardId);
        return $cart;
    }

    public function getFromCookieOrCreate(){
        $cart = $this->getFromCookie();
        return $cart ?? Carrito::create();
    }
    
    public function makeCookie(Carrito $cart){
        return Cookie::make($this->cookieName,$cart->id,$this->cookieExpiration);
    }

    public function contarProducto(){
        $carrito=$this->getFromCookie();
        if ($carrito!=null) {
            return $carrito->productos->pluck('pivot.cantidad')->sum();
        }
        return 0;
    }
}
