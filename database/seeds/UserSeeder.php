<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'usertype'=> 'Admin',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@admin.com'),
        ]);
        DB::table('users')->insert([
            'usertype'=> 'Admin',
            'name' => 'Stephan',
            'email' => 'deniwebdevelop@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
