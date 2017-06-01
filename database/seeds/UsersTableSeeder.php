<?php

use App\User;
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
        User::create(['name'=> 'Admin', 'email' => 'admin@askexpert.co', 'password' => bcrypt('bangladesh')]);
        User::create(['name'=> 'Expert', 'email' => 'expert@askexpert.co', 'password' => bcrypt('bangladesh')]);
        User::create(['name'=> 'User', 'email' => 'user@askexpert.co', 'password' => bcrypt('bangladesh')]);
    }
}
