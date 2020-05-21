<?php

use Illuminate\Database\Seeder;

class EvaluablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluables')->insert([
            'name' => 'La metodología didáctica aplicada',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('evaluables')->insert([
            'name' => 'Los criterios de evaluación',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('evaluables')->insert([
            'name' => 'La selección, distribución y secuenciación de los contenidos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('evaluables')->insert([
            'name' => 'Los materiales y recursos didácticos utilizados',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('evaluables')->insert([
            'name' => 'Los criterios establecidos para adoptar las medidas de atención a la diversidad y realizar las adaptaciones curriculares para los alumnos/ as que las precisen',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
