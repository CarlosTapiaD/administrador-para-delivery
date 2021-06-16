<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Providers\CarritoService;
use Illuminate\Support\Facades\DB;

class ProductoCarritoController extends Controller
{


    public $carritoService;
    
    public function __construct(CarritoService $carritoService){
        $this->carritoService=$carritoService;
    }

    public function store(Request $request, Producto $producto)
    {
        //return DB::transaction(function () use($request,$producto){
            $cart=$this->carritoService->getFromCookieOrCreate();
            $cantidad=$cart->productos()->find($producto->id)->pivot->cantidad ?? 0;
            $cart->productos()->syncWithoutDetaching([$producto->id=>['cantidad'=>$cantidad + intval($request->cantidad)]]);  
            $cookie =$this->carritoService->makeCookie($cart);
            return redirect()->back()->cookie($cookie);
      //  });
    }

   
    public function destroy(Producto $producto, Carrito $carrito)
    {
        $carrito->productos()->detach($producto->id);
        $cookies =$this->carritoService->makeCookie($carrito);//Cookie::make('cart',$carrito->id,7 * 24 * 60);

        return redirect()->back()->cookie($cookies);
    }

    

    // public function getFromCookieOrCreate(){
    //     $cardId=Cookie::get('cart');
    //     $cart =Carrito::find($cardId);
    //     return $cart ?? Carrito::create();
    // }
}
