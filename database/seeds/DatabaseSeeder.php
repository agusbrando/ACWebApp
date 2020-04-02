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
            //Hay que llamarlos segun el orden conforme esten colocados
            RolesTableSeeder::class,
            UsersTableSeeder::class

        ]);
    }
}
