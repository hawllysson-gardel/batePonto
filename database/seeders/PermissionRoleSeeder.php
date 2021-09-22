<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\PermissionRole;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionRole = [
            [
                'permission_id' => 1,
                'role_id'       => 1
            ],
            [
                'permission_id' => 2,
                'role_id'       => 1
            ]
        ];

        foreach ($permissionRole as $pr) {
            PermissionRole::create($pr);
        }
    }
}
