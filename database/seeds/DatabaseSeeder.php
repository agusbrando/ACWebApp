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
            UsersTableSeeder::class,
            UsuariosTableSeeder::class,
            AsignaturasTableSeeder::class,
            AspectosEvaluablesTableSeeder::class,
            ProgramacionesTableSeeder::class,
            UnidadesTableSeeder::class,
            AspectosEvaluadosTableSeeder::class
        ]);
    }
}
