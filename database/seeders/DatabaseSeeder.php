<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\user;

use App\Models\Image;

use App\Models\PedidosProducto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create()->each(function($user){
            $image=Image::factory()->user()->make();
            $user->image()->save($image);
        });
        Categoria::factory(10)->create();
        Producto::factory(100)->create()->each(function($product){
            $image=Image::factory(mt_rand(2,4))->make();
            $product->images()->saveMany($image);
        });
        Pedido::factory(20)->create();
       // \App\Models\PedidosProducto::factory(100)->create();

    }
}
