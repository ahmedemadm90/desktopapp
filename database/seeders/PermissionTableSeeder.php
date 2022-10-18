<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Roles List','Role Create','Role Edit','Role delete',
            'Users List','User Create','User Edit','User Delete',
            'Files List', 'File Create', 'File Edit','File Delete',
            'Comments List','Comment Create','Coment Edit', 'Comment Delete',
            'Profile Edit',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
