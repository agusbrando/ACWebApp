<?php

use Illuminate\Database\Seeder;
use App\Models\Session;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Eliminar para produccion cuando se termine de implementar los test
        $dia = date("Y-m-d");
        $day = date('w', strtotime($dia));

        //Tutorías
        $sessions = Session::where('day', $day)->where('type_id', 1)->get();
        for($i = 0; $i < 5; $i++){

            DB::table('events')->insert([
                'session_id' => $sessions[$i]->id,
                'user_id' => 1,
                'type_id' => 1,
                'title' => 'default',
                'description' => 'default',
                'date' => $dia,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }

        //Reserva de aulas
        $sessions = Session::where('day', $day)->where('type_id', 2)->get();
        for($i = 0; $i < 5; $i++){

            DB::table('events')->insert([
                'session_id' => $sessions[$i]->id,
                'user_id' => 1,
                'type_id' => 2,
                'title' => 'default',
                'description' => 'default',
                'date' => $dia,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
        
    }
}
