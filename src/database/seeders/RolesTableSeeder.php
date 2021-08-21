<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Application Admin']);
        Role::create(['name' => 'Library Manager']);
        Role::create(['name' => 'Library Staff']);
        Role::create(['name' => 'Patron']);

        Role::all()->each(function($role) {
            if($role->name !== 'Patron') {
                $permissions = Permission::where('route', '=', '/api/users')->get(['id']);
                $role->permissions()->attach($permissions);
            }
        });

        dd(Role::with('permissions')->get());
    }
}
