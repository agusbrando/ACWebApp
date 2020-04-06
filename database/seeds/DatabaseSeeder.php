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
            UsersTableSeeder::class,
            CoursesTableSeeder::class,
            SubjectsTableSeeder::class,
            EvaluationsTableSeeder::class,
            PercentagesTableSeeder::class,
            TasksTableSeeder::class,
            CalificationsTableSeeder::class
        ]);
    }
}
