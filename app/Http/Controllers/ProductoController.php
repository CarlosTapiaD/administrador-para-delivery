<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function index(){
        $productos=Producto::all()->sortByDesc("id");
       // dd($productos);
        return view('productos.index')->with(['productos'=>$productos]);
    }

    public function create(){
        return view('productos.create');
    }

    public function show(Producto $producto){
        // $productos=Producto::findOrFail($producto);
       // dd($productos);
        return view('productos.show')->with(['productos'=>$producto]);
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
        $producto= Producto::create($request->all());
        //session()->flash('success',"El producto {$producto->strNombre} se creo con exito");

       // return $usaurio;
       return redirect()->back()->withSuccess("El producto {$producto->strNombre} se creo con exito");

    }

    public function update(Producto $producto){
        // $producto=Producto::findOrFail($producto);
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
        //  session()->flash('success',"El producto {$producto->strNombre} se actualizo con exito");
          
          return redirect()->route('productos.index')->withSuccess("El producto {$producto->strNombre} se actualizo con exito");
    }
    
    public function edit(Producto $producto){
        // $producto=Producto::findOrFail($producto);
        return view('productos.edit')->with(['producto'=>$producto]);

    }
    public function destroy(Producto $producto){
        // $producto=Producto::findOrFail($producto);
        $producto->delete();
        //session()->flash('success',"El Producto  {$producto->strNombre} se elimino con exito");

        return redirect()->route('productos.index')->withSuccess("El Producto  {$producto->strNombre} se elimino con exito");
    }
    
}
