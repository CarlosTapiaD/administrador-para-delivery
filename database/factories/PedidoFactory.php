<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'strNota'=> $this->faker->sentence(3),
        'strEstatus'=> $this->faker->randomElement(['En preparacion','Enviado','Pagado','cancelado']),
        'strReferencia'=> $this->faker->swiftBicNumber(),
        'user_id'=>  $this->faker->numberBetween(1,10),
        'strTP'=>$this->faker->randomElement(['Tarjeta','Efectivo']),
        ];
    }
}
