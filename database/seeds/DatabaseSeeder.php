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
            TimetableTableSeeder::class,
	    RolesTableSeeder::class,
            TypesTableSeeder::class,
            ClassroomsTableSeeder::class,
	    StatesTableSeeder::class,
            SessionsTableSeeder::class,
            UsersTableSeeder::class,
	    CoursesTableSeeder::class,
	    SubjectsTableSeeder::class,
            EvaluablesTableSeeder::class,
            ProgramsTableSeeder::class,
            UnitsTableSeeder::class,
            EvaluatedsTableSeeder::class,
            EventsTableSeeder::class,
	    EvaluationsTableSeeder::class,
            PercentagesTableSeeder::class,
            TasksTableSeeder::class,
            CalificationsTableSeeder::class,
	    TrackingsTableSeeder::class,
            MisbehaviorsTableSeeders::class,
	    SessionTimeTableSeeder::class,
	    ItemsTableSeeder::class,
            ItemsUsersTableSeeder::class,
	    Permissions::class,
	    RolesPermissions::class
        ]);
    }
}
