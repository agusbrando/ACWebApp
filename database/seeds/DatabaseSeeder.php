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
            StatesTableSeeder::class,
            TypesTableSeeder::class,
            RolesUsersTableSeeder::class,
            UsersTableSeeder::class,
            ItemsTableSeeder::class,
            ItemsUsersTableSeeder::class,

        ]);
    }
}
