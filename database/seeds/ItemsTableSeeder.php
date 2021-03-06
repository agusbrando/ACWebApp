<?php

use App\Models\Course;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('items')->insert([
            'number' => 322,
            'name' => 'HP en-df4w43fd',
            'date_pucharse' => Carbon::create('2020', '03', '30'),
            'classroom_id' => 1,
            'state_id' => 1,
            'type_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'number' => 243,
            'name' => 'Lenovo f4d-4f',
            'date_pucharse' => Carbon::create('2020', '02', '23'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'number' => 163,
            'name' => 'Logitech g903',
            'date_pucharse' => Carbon::create('2015', '01', '10'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        for ($i = 1; $i <= 20; $i++) {

            DB::table('items')->insert([
                'number' => $i,
                'name' => 'Logitech ' . $i,
                'date_pucharse' => Carbon::create('2015', '01', '10'),
                'classroom_id' => 2,
                'state_id' => 1,
                'type_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $cursos = Course::all();
        $types = Type::where('model', Item::class);
        
        foreach ($cursos as $curso) {
            for ($i = 1; $i <= $curso->num_students; $i++) {
                DB::table('items')->insert([
                    'number' => $i,
                    'name' => 'Lenovo ' . $i,
                    'date_pucharse' => Carbon::create('2015', '01', '10'),
                    'classroom_id' => $curso->yearUnions->first()->classroom->id,
                    'state_id' => 1,
                    'type_id' =>  9,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                DB::table('items')->insert([
                    'number' => $i,
                    'name' => 'Logitech ' . $i,
                    'date_pucharse' => Carbon::create('2015', '01', '10'),
                    'classroom_id' => $curso->yearUnions->first()->classroom->id,
                    'state_id' => 1,
                    'type_id' =>  6,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                DB::table('items')->insert([
                    'number' => $i,
                    'name' => 'Logitech ' . $i,
                    'date_pucharse' => Carbon::create('2015', '01', '10'),
                    'classroom_id' => $curso->yearUnions->first()->classroom->id,
                    'state_id' => 1,
                    'type_id' =>  19,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
               
            }
        }
    }
}
