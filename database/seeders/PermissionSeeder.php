<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'         => 'show-text',
                'display_name' => 'Show Text',
                'description'  => 'Show Text'
            ],
            [
                'name'         => 'show-logo',
                'display_name' => 'Show Logo',
                'description'  => 'Show Logo'
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
