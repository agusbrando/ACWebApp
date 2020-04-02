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

            ClassroomsTableSeeder::class,
            CoursesTableSeeder::class,
            ItemsTableSeeder::class,
            ItemsUsersTableSeeder::class,
            RolesUsersTableSeeder::class,
            StatesTableSeeder::class,
            TypesItemTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
