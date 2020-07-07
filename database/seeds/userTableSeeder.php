<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user=\App\user::create([
       	'name'=>'admin',
       	'email'=>'admin@admin.com',
       	'password'=>Hash::make('admin')
       ]);
       $user->attachRole('super_admin');
    }//end of run
}//end of seeder
