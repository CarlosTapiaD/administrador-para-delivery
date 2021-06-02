<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
class CategoriaController extends Controller
{
    
    function index() {
        $categorias=Categoria::all()->sortByDesc("id");;
       // dd($categorias);
        return view('categoria.index')->with(['categorias'=>$categorias]);

    }
    
    public function create(){
        return view('categoria.create');
    }
    public function show($categoria){
        $categorias=Categoria::findOrFail($categoria);
       // dd($categorias);
        return view('categoria.show')->with(['categorias'=>$categorias]); 
    }
    public function store(Request $request){
        // if(request()->intVisible=='1'){
        //    // session()->put('error','error de visibilidad');
        //     session()->flash('error','error de visibilidad');
        //     return redirect()->back();
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
        $usaurio= Categoria::create($request->all());
       // return $usaurio;
       //return view('categoria.create');
       return redirect()->back();
    //    return redirect()->action('');//aqui va un controaldor controlador@funcion
    //    return redirect()->route('categoria.index');
    }

    public function update($categoria){
        $categoria=Categoria::findOrFail($categoria);
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
        //return view('categoria.index');
        return redirect()->back();
    }
    
    public function edit($categoria){
        $categoria=Categoria::findOrFail($categoria);
        return view('categoria.edit')->with(['categoria'=>$categoria]);
    }
    public function destroy($categoria){
        $categoria=Categoria::findOrFail($categoria);
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
    
    
}
