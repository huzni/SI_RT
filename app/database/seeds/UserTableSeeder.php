<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        // $users = [
        // 	['username'=>'admin', 'password'=>Hash::make('admin')]
        // ];

        // DB::table('users')->insert($users);

        User::create(
        	[
        		'username' => 'admin',
        		'password' => Hash::make('admin')
        	]);
    }

}