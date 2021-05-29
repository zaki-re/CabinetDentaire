<?php

namespace Database\Factories;

use App\Models\Malade;
use App\Models\Medecin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type_user = $this->faker->randomElement(['Medecin', 'Malade']);

        return [

            'nom' => $this->faker->name,
            'prenom' => $this->faker->firstName,
            'address' => $this->faker->address,
            'age' => 22,

            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'type_user' => $type_user,
            'id_med_mal' => $type_user=='Medecin' ? null : Malade::factory() ,
            'password' => Hash::make('Password'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
