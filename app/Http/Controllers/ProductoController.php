<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductoController extends Controller
{
    //
    public function index(){
        $productos=Producto::all()->sortByDesc("id");
       // dd($productos);
        return view('productos.index')->with(['productos'=>$productos]);
    }

    public function create(){
        return view('productos.create');
    }

    public function show($producto){
        $productos=Producto::findOrFail($producto);
       // dd($productos);
        return view('productos.show')->with(['productos'=>$productos]);
    }

    public function store(Request $request){
       
        $request->validate([
            'urlImg2'=>'required|image|max:2048'
        ]);
        $name= $request->file('urlImg2')->store('public/img');
        $name= str_replace("public", "", $name);
        $request->merge([
            'urlImg' => $name,
        ]);
        $usaurio= Producto::create($request->all());
       // return $usaurio;
       return redirect()->route('productos.index');
    }

    public function update($producto){
        $producto=Producto::findOrFail($producto);
        // dd(request()->file('urlImg2'));
         if (request()->file('urlImg2')!=null) {
             request()->validate([
                 'urlImg2'=>'required|image|max:2048'
             ]);
             $name= request()->file('urlImg2')->store('public/img');
             $name= str_replace("public", "", $name);
             request()->merge(['urlImg' => $name,]);
         }
         
          $producto->update(request()->all());
          return redirect()->route('productos.index');
    }
    
    public function edit($producto){
        $producto=Producto::findOrFail($producto);
        return view('productos.edit')->with(['producto'=>$producto]);

    }
    public function destroy($producto){
        $producto=Producto::findOrFail($producto);
        $producto->delete();
        return redirect()->route('producto.index');

    }
    
}
