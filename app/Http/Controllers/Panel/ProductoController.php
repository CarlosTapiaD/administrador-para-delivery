<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
//use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Scopes\AvailableScope;
use App\Models\PanelProducto;
use App\Models\Producto;
class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['indexapi','indexapiXcategoria']);
    }
    
    public function index(){
        $productos=PanelProducto::without('imageable')->get()->sortByDesc("id");
        //dd($productos);
        return view('productos.index')->with(['productos'=>$productos]);
    }

    public function create(){
        return view('productos.create');
    }

    public function show(Producto $producto){
        // $productos=Producto::findOrFail($producto);
        //$producto->with('imageable');
        //dd($producto);
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
        $producto= PanelProducto::create($request->all());
        //session()->flash('success',"El producto {$producto->strNombre} se creo con exito");

       // return $usaurio;
       return redirect()->back()->withSuccess("El producto {$producto->strNombre} se creo con exito");

    }

    public function update(PanelProducto $producto){
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
    
    public function edit(PanelProducto $producto){
        // $producto=Producto::findOrFail($producto);
        return view('productos.edit')->with(['producto'=>$producto]);

    }
    public function destroy(PanelProducto $producto){
        // $producto=Producto::findOrFail($producto);
        $producto->delete();
        //session()->flash('success',"El Producto  {$producto->strNombre} se elimino con exito");

        return redirect()->route('productos.index')->withSuccess("El Producto  {$producto->strNombre} se elimino con exito");
    }


    // api
    public function indexapi(){
        $productos=PanelProducto::all()->sortByDesc("id");
       // dd($productos);
        // return $productos;
        return response()->json($productos, 413);
    }
    public function indexapiXcategoria( $categoria){
        $productos=PanelProducto::where('categoria_id',$categoria)->get();
        return response()->json($productos, 413);
    }
    
}
