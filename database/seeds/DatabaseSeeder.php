<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            TypesTableSeeder::class,
            ClassroomsTableSeeder::class,
            SessionsTableSeeder::class,
            UsersTableSeeder::class,
	    SubjectsTableSeeder::class,
            EvaluablesTableSeeder::class,
            ProgramsTableSeeder::class,
            UnitsTableSeeder::class,
            EvaluatedsTableSeeder::class
            EventsTableSeeder::class
        ]);
    }
}
