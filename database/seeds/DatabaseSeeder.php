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
            CoursesSeeders::class,
            RolesSeeders::class,
            SubjectsSeeders::class,
            UsersSeeders::class,
            SessionsSeeders::class,
            TypesSeeders::class,
            TimetableSeeder::class,
            SessionTimetableSeeder::class,
            MisbehaviorsSeeders::class
            
        ]);
    }
}
