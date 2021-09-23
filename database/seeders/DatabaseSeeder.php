<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

        $faker = \Faker\Factory::create('pt_BR');

        $administrator_one = \App\Models\User::factory()->create(
            [
                'name'           => $faker->name(),
                'email'          => $faker->unique()->safeEmail(),
                'password'       => Hash::make('81014031Hg@'),
                'remember_token' => Str::random(10),
                'birthday'       => $faker->dateTimeThisCentury->format('Y-m-d'),
                'cpf'            => $faker->unique()->cpf(false),
                'cep'            => $faker->numberBetween(00000000, 99999999),
                'address'        => $faker->unique()->address,
                'user_id'        => null,
                'role_id'        => 1
            ]
        );

        $administrator_two = \App\Models\User::factory()->create(
            [
                'name'           => $faker->name(),
                'email'          => $faker->unique()->safeEmail(),
                'password'       => Hash::make('81014031Hg@'),
                'remember_token' => Str::random(10),
                'birthday'       => $faker->dateTimeThisCentury->format('Y-m-d'),
                'cpf'            => $faker->unique()->cpf(false),
                'cep'            => $faker->numberBetween(00000000, 99999999),
                'address'        => $faker->unique()->address,
                'user_id'        => null,
                'role_id'        => 1
            ]
        );

        // Generate Employees
        \App\Models\User::factory(10)->create();
    }
}
