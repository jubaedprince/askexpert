<?php

use Illuminate\Database\Seeder;

use App\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expert = new Role();
		$expert->name         = 'expert';
		$expert->display_name = 'Expert'; // optional
		$expert->description  = 'Expert'; // optional
		$expert->save();

		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Administrator'; // optional
		$admin->description  = 'Adiminstrator is allowed to manage and edit everything'; // optional
		$admin->save();

    }
}
