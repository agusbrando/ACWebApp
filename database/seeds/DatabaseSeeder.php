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
            TimeTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            MessagesTableSeeder::class,
            PostsTableSeeder::class,
           AttachmentsTableSeeder::class,
            SendsTableSeeder::class
        ]);
    }
}
