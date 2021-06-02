<?php

namespace Database\Factories;

use App\Models\Pedidosproducto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidosProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedidosproducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pedido_id'=>$this->faker->numberBetween(1,10),
        'productos_id'=>$this->faker->numberBetween(1,10),
        'intCantidad'=>$this->faker->numberBetween(1,5),
        ];
    }
}
