<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'type' => 'Administrador'
            ],
            [
                'type' => 'Funcionário'
            ]
        ];

        foreach ($types as $type) {
            UserType::create($type);
        }
    }
}
