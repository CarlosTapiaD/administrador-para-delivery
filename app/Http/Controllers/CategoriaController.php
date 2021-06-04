<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
class CategoriaController extends Controller
{
    public function __construct(){
        // $this->middleware('auth')->only('index');
        // $this->middleware('auth')->except(['index','create']);
        $this->middleware('auth');
    }
    
    function index() {
        $categorias=Categoria::all()->sortByDesc("id");;
       // dd($categorias);
        return view('categoria.index')->with(['categorias'=>$categorias]);

    }
    
    public function create(){
        return view('categoria.create');
    }
    public function show(Categoria $categoria){
       // $categorias=Categoria::findOrFail($categoria);
       // dd($categorias);
        return view('categoria.show')->with(['categorias'=>$categoria]); 
    }
    public function store(Request $request){
        // if(request()->intVisible=='1'){
        //    // session()->put('error','error de visibilidad');
        //     session()->flash('error','error de visibilidad');
        //     return redirect()->back()->withInput(request()->all())-> withErrors('');
        // }
       // session()->forget('error');//elimina el error 
        $request->validate([
            'strNombre'=>'required|min:5',
            'urlImg2'=>'required|image|max:2048'
        ]);
        $name= $request->file('urlImg2')->store('public/img');
        $name= str_replace("public", "", $name);
        $request->merge([
            'urlImg' => $name,
        ]);
        $categoria= Categoria::create($request->all());
        //session()->flash('success',"La categoria {$categoria->strNombre} se creo con exito");

       // return $usaurio;
       //return view('categoria.create');
       return redirect()
       ->back()
       ->withSuccess("La categoria {$categoria->strNombre} se creo con exito");
    //    return redirect()->action('');//aqui va un controaldor controlador@funcion
    //    return redirect()->route('categoria.index');
    }

    public function update( Categoria $categoria){
       // $categoria=Categoria::findOrFail($categoria);
       // dd(request()->file('urlImg2'));
        if (request()->file('urlImg2')!=null) {
            request()->validate([
                'urlImg2'=>'required|image|max:2048'
            ]);
            $name= request()->file('urlImg2')->store('public/img');
            $name= str_replace("public", "", $name);
            request()->merge(['urlImg' => $name,]);
        }
        
         $categoria->update(request()->all());
         //session()->flash('success',"La categoria {$categoria->strNombre} se actualizo con exito");

        //return view('categoria.index');
        return redirect()->route('categoria.index')->withSuccess("La categoria {$categoria->strNombre} se actualizo con exito");
    }

    
    public function edit(Categoria $categoria){
       // $categoria=Categoria::findOrFail($categoria);
        return view('categoria.edit')->with(['categoria'=>$categoria]);
    }
    public function destroy(Categoria $categoria){
        //$categoria=Categoria::findOrFail($categoria);
        $categoria->delete();
     //   session()->flash('success',"La categoria {$categoria->strNombre} se elimino con exito");

        return redirect()->route('categoria.index')->withSuccess("La categoria {$categoria->strNombre} se elimino con exito");
    }
    
    
}
