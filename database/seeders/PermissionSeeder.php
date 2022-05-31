<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = config('permission_data');

        if (empty($data) || !is_array($data)) {
            return;
        }

        foreach ($data as $slugGroup => $group) {
            $permissionGroup = PermissionGroup::where('slug', $slugGroup)->first();

            if (!$permissionGroup) {
                $permissionGroup = PermissionGroup::create([
                    'name' => $group['title'],
                    'slug' => $slugGroup
                ]);
            } elseif ($permissionGroup->name <> $group['title']) {
                $permissionGroup->update(['name' => $group['title']]);
            }

            foreach ($group['permissions'] as $permissionKey => $permissionTitle) {
                $permission = Permission::where(
                    [
                        'name' => $permissionKey,
                        'guard_name' => 'web',
                    ]
                )->first();

                if (!$permission) {
                    Permission::create([
                        'name' => $permissionKey,
                        'title' => $permissionTitle,
                        'permission_group_id' => $permissionGroup->id,
                        'guard_name' => 'web',
                    ]);
                } elseif ($permission->title <> $permissionTitle) {
                    $permission->update(['title' => $permissionTitle]);
                }
            }
        }
    }
}
