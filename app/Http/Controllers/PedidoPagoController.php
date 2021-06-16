<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Providers\CarritoService;
use Illuminate\Support\Facades\DB;

class PedidoPagoController extends Controller
{
    public $carritoService;
    
    public function __construct(CarritoService $carritoService){
        $this->carritoService=$carritoService;
        $this->middleware('auth');

    }
    
    public function create(Pedido $pedido)
    {
        return view('pagos.create')->with(['pedido'=>$pedido]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
       
        return  DB::transaction(function () use($request,$pedido){
             //funcion de pago ()
            $this->carritoService->getFromCookie()->productos()->detach();
            $pedido->pago()->create([
                'monto' =>$pedido->total,
                'fecha_pago'=>now(),
            ]);
    
            $pedido->strEstatus='Pagado';
            $pedido->save();
            return redirect()->route('main.index')->withSucces('Pago exitoso');
        });

       
        
    }

   
}
