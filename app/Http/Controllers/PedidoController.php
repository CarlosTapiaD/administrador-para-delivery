<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\DB;
class PedidoController extends Controller
{
    public function index(){
        $pedidos=Pedido::all();
      //  dd($pedidos);
        
        return view('pedido.index')->with(['pedidos'=>$pedidos]);
    }
    public function create(){}
    public function show($pedidos){
        $pedidos=Pedido::findOrFail($pedidos);
     //   dd($pedidos);
        return view('pedido.show')->with(['pedidos'=>$pedidos]);
    }
    public function store(){}
    public function update(){}
    public function destroy(){}
    public function edit(){}
}
