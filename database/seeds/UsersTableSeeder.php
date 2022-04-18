<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = User::where('email', 'admin@admin.com')->first();

    	if($admin == null) {

    		DB::table('users')->insert([

    		    'name' => 'Admin',
    		    'email' => 'admin@admin.com',
    		    'password' => bcrypt('password'),

    		]);

    	}
    }
}
