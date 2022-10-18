<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Ahmed Emad',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'email_verified_at'=> '2020-10-07 16:48:13'

        ]);

        $role = Role::create(['name' => 'Owner']);

        $role2 = Role::create(['name' => 'User'])
        ->givePermissionTo([
            'Files List', 'File Create', 'File Edit', 'File Delete',
            'Comments List', 'Comment Create', 'Coment Edit', 'Comment Delete',
            'Profile Edit',
        ]);
        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
