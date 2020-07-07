<?php

use Illuminate\Database\Seeder;

class roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super_admin = \App\Role::create([
        	'name'=>'super_admin',
        	'display_name'=>'super_admin',
        	'description'=>'super_admin is have all option'
        ]);
         $role_user = \App\Role::create([
        	'name'=>'user',
        	'display_name'=>'user',
        	'description'=>'user '
        ]);
    }//end of run
}//end of seeder
