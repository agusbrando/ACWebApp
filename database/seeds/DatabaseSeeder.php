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
            PermissionsTableSeeder::class,
            TypesTableSeeder::class,
            TimetableTableSeeder::class,
            UsersTableSeeder::class,
            ClassroomsTableSeeder::class,
            CoursesTableSeeder::class,
            SubjectsTableSeeder::class,
            EvaluationsTableSeeder::class,
            TasksTableSeeder::class,
            CalificationsTableSeeder::class,
            PercentagesTableSeeder::class,
            TrackingsTableSeeder::class,
            SessionsTableSeeder::class,
            ProgramsTableSeeder::class,
            UnitsTableSeeder::class,
            EvaluablesTableSeeder::class,
            EvaluatedsTableSeeder::class,
	        StatesTableSeeder::class,
            ItemsTableSeeder::class,
            EventsTableSeeder::class,
            ItemsUsersTableSeeder::class,
            SessionTimetableTableSeeder::class,
            RolesPermissionsTableSeeder::class,
            MisbehaviorsTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
            MessagesTableSeeder::class,
            MessagesUsersTableSeeder::class,
            CommentsTableSeeder::class,
            AttachmentsTableSeeder::class
	    
	    
            
	    
	    
        ]);
    }
}
