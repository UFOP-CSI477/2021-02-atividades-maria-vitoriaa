<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
      /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;
    /**
  * Define the model's default state.
  *
  * @return array<string, mixed>
  */

    public function definition()
    {
        return [
            'nome' => $this->faker->state,
            'um'=> $this->faker->stateAbbr
        ];
    }
}
