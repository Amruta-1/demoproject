<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class couponpermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
           'coupon-list',
           'coupon-create',
           'coupon-edit',
           'coupon-delete'
    ];
    foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
