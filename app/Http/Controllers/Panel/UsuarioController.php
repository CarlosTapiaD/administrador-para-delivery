<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $usuarios=User::all()->sortByDesc("id");;
       // dd($productos);
        return view('usuario.index')->with(['usuarios'=>$usuarios]);
    }
    public function create(){

        return view('usuario.create');
    }
    public function show($usuario){
        $usuarios=User::findOrFail($usuario);
       // dd($productos);
        return view('usuario.show')->with(['usuarios'=>$usuarios]);
    }
    public function store(){
        $usaurio= User::create(request()->all());
        return view('usuario.create');
    }
    public function update(){}
    public function destroy(){}
    public function edit(){}
}
