<?php

use Illuminate\Database\Seeder;

class SeguimientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seguimientos = [
            [
                'firma'=>'',
                'id_usuario' => 'GGarrido',
                'hora_entrada' => '8:30',
                'hora_salida' => '12:25',
                'horas'=>'4',
                'fecha' => '2020-03-29',
                
            ],
            [
                'firma'=>'',
                'id_usuario' => 'GGarrido',
                'hora_entrada' => '16:30',
                'hora_salida' => '19:25',
                'horas'=>'3',
                'fecha' => '2020-03-29',
                
            ],
        ];
        DB::table('seguimientos')->insert($seguimientos);
    }
}
