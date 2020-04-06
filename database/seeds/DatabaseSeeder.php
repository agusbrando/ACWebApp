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
            RolesSeeder::class,
            TimetableSeeder::class,
            UsersSeeder::class,
            TrackingsSeeder::class,
            ClassroomsSeeder::class,
            SessionsSeeder::class,
            CoursesSeeder::class,
            SubjectsSeeder::class,
            SessionTimetableSeeder::class,
        ]);
    }
}
