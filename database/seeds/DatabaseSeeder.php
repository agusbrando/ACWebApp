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
            RolePermissionsTableSeeder::class,
            TypesTableSeeder::class,
            TimetableTableSeeder::class,
            ClassroomsTableSeeder::class,
            CoursesTableSeeder::class,
            SubjectsTableSeeder::class,
            UsersTableSeeder::class,
            CourseSubjectsTableSeeder::class,
            EvaluationsTableSeeder::class,
            TasksTableSeeder::class,
            CalificationsTableSeeder::class,
            TrackingsTableSeeder::class,
            SessionsTableSeeder::class,
            UnitsTableSeeder::class,
            EvaluablesTableSeeder::class,
	        StatesTableSeeder::class,
            
            // EventsTableSeeder::class,
            PostsTableSeeder::class,
            CommentsTableSeeder::class,
            MessagesTableSeeder::class,
            MessagesUsersTableSeeder::class,
            CommentsTableSeeder::class,
            AttachmentsTableSeeder::class,
            
            
            YearsTableSeeder::class,
            YearUnionsTableSeeder::class,
            ProgramsTableSeeder::class,
            EvaluatedsTableSeeder::class,

            ItemsTableSeeder::class,
            
            PercentagesTableSeeder::class,
            SessionTimetableTableSeeder::class,
            YearUnionUserTableSeeder::class,
            MisbehaviorsTableSeeder::class,
            ItemYearTableSeeder::class,

        ]);
    }
}
