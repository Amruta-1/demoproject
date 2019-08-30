<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class ConfigBannerPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'config-list',
           'config-create',
           'config-edit',
           'config-delete',
           'banner-list',
           'banner-create',
           'banner-edit',
           'banner-delete'
    ];
    foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
