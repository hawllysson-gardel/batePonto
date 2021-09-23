<?php

namespace Database\Factories;

use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Point::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');

        $inital_time = $faker->dateTimeBetween('-30 days', 'now', null)->format('Y-m-d H:i:s');
        $final_time  = $faker->dateTimeBetween($inital_time, 'now', null)->format('Y-m-d H:i:s');

        return [
            'description' => Str::random(50),
            'entry_time'  => $inital_time,
            'exit_time'   => $final_time,
            'user_id'     => User::all()->random()->id,
        ];
    }
}
