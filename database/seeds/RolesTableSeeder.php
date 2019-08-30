<?php

use Illuminate\Database\Seeder;
use App\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
    	$roles = [
            'superadmin',
            'admin',
            'inventory manager',
            'order manager',
            'customer'
        ];


        foreach ($roles as $role) {
            Roles::create(['name' => $role]);
        }

    	
    }
}
