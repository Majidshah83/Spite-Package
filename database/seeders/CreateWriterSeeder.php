<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateWriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'adnan shah',
            'email' => 'adnan@gmail.com',
            'password' => bcrypt('energy@1234')
        ]);

        $role = Role::create(['name' => 'Writer']);

        $permissions = Permission::where('name','product-create'
)->where('name','product-list'
)->get();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}