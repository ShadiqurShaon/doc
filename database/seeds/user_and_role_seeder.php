<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class user_and_role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         	$super_admin_role = ['name' => 'superadmin', 'display_name' => 'Super Admin', 'description' => 'Full Permission'];
          		$superadminrole = Role::create($super_admin_role);

          	$admin_role = ['name' => 'admin', 'display_name' => 'Admin', 'description' => 'Full Permission'];
          		$adminrole = Role::create($admin_role);

        	$superAdmin = ['name' => 'superAdmin User', 'email' => 'superadmin@test.com', 'password' => Hash::make('123456')];
	        	$user = User::create($superAdmin);
	        	$user->attachRole($superadminrole);

	        $admin1 = ['name' => ' Admin1 User', 'email' => 'admin1@test.com', 'password' => Hash::make('123456')];
	        	$user1 = User::create($admin1);
	        	$user1->attachRole($adminrole);

	        $admin2 = ['name' => ' Admin2 User', 'email' => 'admin2@test.com', 'password' => Hash::make('123456')];
	        	$user2 = User::create($admin2);
	        	$user2->attachRole($adminrole);

	        $admin3 = ['name' => ' Admin3 User', 'email' => 'admin3@test.com', 'password' => Hash::make('123456')];
	        	$user3 = User::create($admin3);
	        	$user3->attachRole($adminrole);
	        	
	        $admin4 = ['name' => ' Admin4 User', 'email' => 'admin4@test.com', 'password' => Hash::make('123456')];
        		$user4 = User::create($admin4);
	        	$user4->attachRole($adminrole);
         
       
    }
}
