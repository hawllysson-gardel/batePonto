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
        $faker = \Faker\Factory::create('pt_BR');

        // Generate Roles
        $this->call(RoleSeeder::class);

        // Generate Administrators
        \App\Models\User::factory()->create(
            [
                'name'           => $faker->name(),
                'email'          => $faker->unique()->safeEmail(),
                'password'       => Hash::make('pass123@Word'),
                'remember_token' => Str::random(10),
                'birthday'       => $faker->dateTimeThisCentury->format('Y-m-d'),
                'cpf'            => $faker->unique()->cpf(false),
                'cep'            => $faker->numberBetween(00000000, 99999999),
                'address'        => $faker->unique()->address,
                'user_id'        => null,
                'role_id'        => 1
            ]
        );
        \App\Models\User::factory()->create(
            [
                'name'           => $faker->name(),
                'email'          => $faker->unique()->safeEmail(),
                'password'       => Hash::make('pass123@Word'),
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
        \App\Models\User::factory(50)->create();

        // Generate Points
        \App\Models\Point::factory(1000)->create();
    }
}
