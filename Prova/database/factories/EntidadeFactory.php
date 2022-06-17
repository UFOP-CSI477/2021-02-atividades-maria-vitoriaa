<?php

namespace Database\Factories;

use App\Models\Entidade;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntidadeFactory extends Factory
{
    protected $model = Entidade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'nome' => $this->faker->company(),
            'bairro' => $this->faker->streetName(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->state()
        ];
    }
}
