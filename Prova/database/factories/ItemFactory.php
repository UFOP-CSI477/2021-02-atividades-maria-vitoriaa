<?php

namespace Database\Factories;

use App\Models\Item;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'descricao' => $this->faker->text($maxNbChars = 20)
        ];
    }
}
