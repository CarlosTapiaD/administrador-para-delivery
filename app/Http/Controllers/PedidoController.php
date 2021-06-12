<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
use App\Providers\CarritoService;
class PedidoController extends Controller
{

    public $carritoService;
    
    public function __construct(CarritoService $carritoService){
        $this->carritoService=$carritoService;
        $this->middleware('auth');

    }

    // public function __construct(){
    //     $this->middleware('auth');
    // }
    public function index(){
        $pedidos=Pedido::all();
      //  dd($pedidos);
        
        return view('pedido.index')->with(['pedidos'=>$pedidos]);
    }
    public function create(){
        $carrito= $this->carritoService->getFromCookie();
        if (!isset($carrito) || $carrito->productos->isEmpty()) {
            return redirect()->back()->withError('El carrito esta vacio');
        }

        return view('pedido.create')->with(['carrito'=>$carrito]);
    }
    public function show($pedidos){
        $pedidos=Pedido::findOrFail($pedidos);
     //   dd($pedidos);
        return view('pedido.show')->with(['pedidos'=>$pedidos]);
    }
    public function store(Request $request){
        $user = $request->user();
        $pedido =$user->pedidos()->create([
            "strEstatus"=>"pendiente"
        ]);
        $carrito=$this->carritoService->getFromCookie();
        $carritoProductosConCantidad=$carrito->productos->mapWithKeys(function($producto){
            $element[$producto->id]=['cantidad'=>$producto->pivot->cantidad];
            return $element;
        });
        ($carritoProductosConCantidad);
        $pedido->productos()->attach($carritoProductosConCantidad->toArray());
        return redirect()->route('pedidos.pagos.create',['pedido'=>$pedido]);
    }
    public function update(){}
    public function destroy(){}
    public function edit(){}
}
