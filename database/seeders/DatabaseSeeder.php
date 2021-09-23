<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(30)->create();

        $this->call(RoleSeeder::class);

        $roles = \App\Models\Role::all();
        \App\Models\User::all()->each(function ($user) use ($roles) { 
            $user->roles()->attach($roles->random(rand(1, 1))->pluck('id')->toArray());
        });
    }
}
