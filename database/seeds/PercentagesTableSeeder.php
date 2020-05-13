<?php

use Illuminate\Database\Seeder;

class PercentagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 1,
            'type_id' => 1,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 1,
            'type_id' => 2,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 1,
            'type_id' => 3,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 1,
            'type_id' => 4,
            'percentage' => 100,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evaluation_type')->insert([
            'evaluation_id' => 2,
            'type_id' => 1,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 2,
            'type_id' => 2,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 2,
            'type_id' => 3,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 2,
            'type_id' => 4,
            'percentage' => 100,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evaluation_type')->insert([
            'evaluation_id' => 3,
            'type_id' => 1,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 3,
            'type_id' => 2,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 3,
            'type_id' => 3,
            'percentage' => 30,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('evaluation_type')->insert([
            'evaluation_id' => 3,
            'type_id' => 4,
            'percentage' => 100,
            'nota_min_tarea' => 4,
            'nota_media_tarea' => 5,
            'nota_media_minima' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
}
