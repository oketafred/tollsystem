<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->truncate();

    	Role::create([
    		'name' => 'User',
    		'slug' => 'user',
    		'permissions' => '',
    	]);
    }
}
