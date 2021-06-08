<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class MainController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    //

    function index(){
        // return view('welcome')->with([
        //     'productos'=>Producto::visible()->get()]);

            return view('welcome')->with([
                'productos'=>Producto::all()]);
    }
}
