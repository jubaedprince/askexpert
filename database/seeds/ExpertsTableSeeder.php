<?php

use App\User;
use Illuminate\Database\Seeder;

class ExpertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(2); //expert
        $user->expert()->create([
            'mobile' => '01199493929',
            'is_active' => true,
            'status' => 'approved',
            'slug' => str_slug($user->name, '-'),
            'profile_picture_url' => 'images/expert.jpg',
            'cost_per_minute' => 10,
            'bio' => 'This is a short bio',
            'current_occupation' => 'Engineer',
        ]);

    }
}
