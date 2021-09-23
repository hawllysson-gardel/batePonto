<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        return [
            'name'           => $this->faker->name(),
            'email'          => $this->faker->unique()->safeEmail(),
            'password'       => Hash::make('81014031Hg@'),
            'remember_token' => Str::random(10),
            'birthday'       => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'cpf'            => $this->faker->unique()->cpf(false),
            'cep'            => '88888888',
            'address'        => $this->faker->unique()->address,
            'user_id'        => null
        ];
    }
}
