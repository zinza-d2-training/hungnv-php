<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Admin', 'guard_name' => 'web', 'permissions' => []],
            ['name' => 'UC', 'guard_name' => 'web', 'permissions' => []],
            ['name' => 'Member', 'guard_name' => 'web', 'permissions' => []],
        ];

        foreach($data as $item){
            $role = Role::create([
                'name' => $item['name'],
                'guard_name' => $item['guard_name']
            ]);

            $permissions = $item['permissions'];
            if (is_array($permissions) && count($permissions)){
                $role->syncPermissions($permissions);
            }
        }
    }
}
