<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name' => 'roles-view',
                'description' => 'Roles',
                'area' => 'roles'
            ],
            [
                'name' => 'roles-create',
                'description' => 'Roles',
                'area' => 'roles'
            ],
            [
                'name' => 'roles-edit',
                'description' => 'Roles',
                'area' => 'roles'
            ],
            [
                'name' => 'roles-delete',
                'description' => 'Roles',
                'area' => 'roles'
            ]

        ]);

        DB::table('permissions')->insert([
            [
                'name' => 'permissions-view',
                'description' => 'Permissões',
                'area' => 'permissions'
            ],
            [
                'name' => 'permissions-create',
                'description' => 'Permissões',
                'area' => 'permissions'
            ],
            [
                'name' => 'permissions-edit',
                'description' => 'Permissões',
                'area' => 'permissions'
            ],
            [
                'name' => 'permissions-delete',
                'description' => 'Permissões',
                'area' => 'permissions'
            ]

        ]);

        DB::table('permissions')->insert([
            [
                'name' => 'users-view',
                'description' => 'Usuários',
                'area' => 'users'
            ],
            [
                'name' => 'users-create',
                'description' => 'Usuários',
                'area' => 'users'
            ],
            [
                'name' => 'users-edit',
                'description' => 'Usuários',
                'area' => 'users'
            ],
            [
                'name' => 'users-delete',
                'description' => 'Usuários',
                'area' => 'users'
            ]

        ]);
    }
}
