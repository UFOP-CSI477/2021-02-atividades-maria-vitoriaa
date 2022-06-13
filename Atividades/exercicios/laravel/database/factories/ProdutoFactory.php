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
     * Define the model's default state.
     *
     */
    protected $model = Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->state,
            'um'=> $this->faker->stateAbbr
        ];
    }
}
