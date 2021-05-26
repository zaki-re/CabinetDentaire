<?php

namespace Database\Factories;

use App\Models\Malade;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaladeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Malade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_de_consultation' => $this->faker->company,
        ];
    }
}
