<?php

use Illuminate\Database\Seeder;
use App\UserDetails;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        /*$data = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Admin',
                'last_name' => ' ',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'first_name' => 'Customer',
                'last_name' => ' ',
                'email' => 'customer@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];*/
    	$data = [
                    'first_name' => 'Admin',
                    'last_name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('admin123'),
                    'roles'=>'admin',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
    	];
        //insertion using model name
    	UserDetails::insert($data);	
        //insertion using table name
        //DB::table('roles')->insert($data);
    }
}
