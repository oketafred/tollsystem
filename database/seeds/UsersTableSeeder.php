<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	if (DB::table('roles')->insert([
    		'slug' => 'admin',
    		'name' => 'Admin',
    		'permissions' => '',
    		'created_at' => now(),
    		'updated_at' => now(),
    	])) {
            // seed users
    		$credentials = [
    			'email' => 'oketafred@gmail.com',
    			'password' => 'admin',
    			'full_name' => 'Oketa Fred',
    			'phone_number' => '0787584128',
    			'username' => 'oketafred',
    			'rfid' => '25452',
    			'city' => 'Kampala',
    			'country' => 'Uganda',
    			'vehicle_type' => 'UAB 212B',
    		];

    		$user = Sentinel::registerAndActivate($credentials);
    		$role = Sentinel::findRoleBySlug('admin');
    		$role->users()->attach($user);
    	}
    }
}
