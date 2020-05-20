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
            CourseSubjectsTableSeeder::class,
            EvaluationsTableSeeder::class,
            ProgramsTableSeeder::class,
            TasksTableSeeder::class,
            CalificationsTableSeeder::class,
            TrackingsTableSeeder::class,
            SessionsTableSeeder::class,
            UnitsTableSeeder::class,
            EvaluablesTableSeeder::class,
            EvaluatedsTableSeeder::class,
	        StatesTableSeeder::class,
            ItemsTableSeeder::class,
            EventsTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
            MessagesTableSeeder::class,
            MessagesUsersTableSeeder::class,
            CommentsTableSeeder::class,
            AttachmentsTableSeeder::class,
           
            
            YearsTableSeeder::class,
            YearUnionsTableSeeder::class,
            PercentagesTableSeeder::class,
            SessionTimetableTableSeeder::class,
            YearUnionUserTableSeeder::class,
            MisbehaviorsTableSeeder::class,
            ItemYearTableSeeder::class,

        ]);
    }
}
