<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Create one program foreach course add current profesor and ask if you dont know
        
        /*
        $asignatura = Subject::where('name','Acceso a Datos')->first();
        DB::table('programs')->insert([
            'name' => ($asignatura->courses->name).$asignatura->name,
            'professor_id' => 1,
           
        ]);
        */
        DB::table('programs')->insert([
            'name' => 'programaPrueba',
            'professor_id' => 1,
           
        ]);
        DB::table('programs')->insert([
            'name' => 'programaPrueba2',
            'professor_id' => 1,
           
        ]);

    }
}
