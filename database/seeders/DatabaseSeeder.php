<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Pedido;
use App\Models\user;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Categoria::factory(10)->create();
        \App\Models\Producto::factory(10)->create();
        \App\Models\Pedido::factory(20)->create();
        \App\Models\PedidosProducto::factory(100)->create();

    }
}
