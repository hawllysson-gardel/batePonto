<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'         => 'administrador',
                'display_name' => 'Administrador',
                'description'  => 'Administrador'
            ],
            [
                'name'         => 'colaborador',
                'display_name' => 'Colaborador',
                'description'  => 'Colaborador'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
