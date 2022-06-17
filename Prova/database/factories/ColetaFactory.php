<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Entidade;
use App\Models\Coleta;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColetaFactory extends Factory
{
    protected $model = Coleta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'item_id' => Item::factory(),
            'entidade_id' => Entidade::factory(),
            'quantidade' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10),
            'data' => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
