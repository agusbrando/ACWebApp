<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO add all subjects for every course. Website
        DB::table('subjects')->insert([
            'name' => 'Empresa e Iniciativa Emprendedora',
            'abbreviation'=>'EIE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Formación y orientación laboral',
            'abbreviation'=>'FOL',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Ingles',
            'abbreviation'=>'ING',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //FIN COMUNES

        //1ºDAM 4-8
        DB::table('subjects')->insert([
            'name' => 'Bases de Datos',
            'abbreviation' =>'BD',
            "hours"=>160,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sistemas informáticos',
            'abbreviation'=>'SI',
            "hours"=>160,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Programación',
            'abbreviation'=>'PRO',
            "hours"=>256,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Lenguajes de marcas y sistemas de gestión de información',
            'abbreviation'=>'LM',
            "hours"=>96	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Entornos de desarrollo',
            'abbreviation'=>'EDE',
            "hours"=>96	,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //2ºDAM 9-13
        DB::table('subjects')->insert([
            'name' => 'Programación de Servicios y Procesos',
            'abbreviation'=>'PSP',
            "hours"=>60	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([   
            'name' => 'Programacion multimedia y dispositivos moviles',
            'abbreviation'=>'PMM',
            "hours"=>100	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sistema de Gestión Empresarial',
            'abbreviation'=>'SGE',
            "hours"=>100	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Desarrollo de interfaces',
            'abbreviation'=>'DI',
            "hours"=>120	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Accesso a Datos',
            'abbreviation'=>'AD',
            "hours"=>120	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //FIN 2º DAM 

        //2ºDAW
        DB::table('subjects')->insert([
            'name' => 'Desarrollo web en entorno cliente',
            'abbreviation'=>'AD',
            "hours"=>120	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Desarrollo web en entorno servidor',
            'abbreviation'=>'AD',
            "hours"=>120	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Despliegue de aplicaciones web',
            'abbreviation'=>'AD',
            "hours"=>120	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Diseño de interfaces web',
            'abbreviation'=>'AD',
            "hours"=>120	,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        
    }
}
