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
        DB::table('usuarios')->truncate();
        DB::table('roles')->truncate();
        DB::table('permisos')->truncate();

        $this->call([
            Usuarios::class
        ]);
        $this->call([
            Roles::class
        ]);
        $this->call([
            Permisos::class
        ]);
    }
}
