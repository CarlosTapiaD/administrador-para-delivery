<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path'=>"/img/productos/default.jpg",
        ];
    }

    public function user(){
        return $this->state([
            'path'=>"/img/user/default.png"
        ]); 
    }
}
