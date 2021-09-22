<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\RoleUser;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleUser = [
            [
                'user_id' => 1,
                'role_id' => 1
            ]
        ];

        foreach ($roleUser as $ru) {
            RoleUser::create($ru);
        }
    }
}
