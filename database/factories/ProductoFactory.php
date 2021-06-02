<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'strNombre' => $this->faker->sentence(3),
            'intVisible' => $this->faker->numberBetween(0,1),
            'strDescripcion'=> $this->faker->paragraph(1),
            'dcPrecio'=> $this->faker->randomFloat($maxDecimal =2,$min=100,$max=400),
            'categoria_id'=> $this->faker->numberBetween(1,10),
            'urlImg'=>'/img/default.png',
        ];
    }
}
