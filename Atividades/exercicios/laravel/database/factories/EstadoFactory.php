<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estado;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estado>
 */
class EstadoFactory extends Factory
{
    /**
     * Define the model's default state.
     */
      protected $model = Estado::class;
     
    public function definition()
    {
        return [
            'nome' => $this->faker->state,
            'sigla'=> $this->faker->stateAbbr
        ];
    }
}
