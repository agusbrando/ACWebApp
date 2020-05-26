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
        DB::table('subjects')->insert([
            'name' => 'Empresa e Iniciativa Emprendedora',
            'abbreviation'=>'EIE',
            'color'=>'#ffaaff',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Formación y orientación laboral',
            'abbreviation'=>'FOL',
            'color'=>'#ffaaff',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Ingles',
            'abbreviation'=>'ING',
            'color'=>'#aaaaff',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //FIN COMUNES
       
             
             
            
           
            
             
            
             
           
        //1ºDAM 4-8
        DB::table('subjects')->insert([
            'name' => 'Base de Datos',
            'abbreviation' =>'BD',
            "hours"=>160,
            'color'=>'#aaffff',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sistemas informáticos',
            'abbreviation'=>'SI',
            "hours"=>160,
            'color'=>'#ffffaa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Programación',
            'abbreviation'=>'PRO',
            "hours"=>256,
            'color'=>'#aaffaa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Lenguajes de marcas y sistemas de gestión de información',
            'abbreviation'=>'LM',
            "hours"=>96	,
            'color'=>'#55ffaa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Entornos de desarrollo',
            'abbreviation'=>'EDE',
            "hours"=>96	,
            'color'=>'#8fffff',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //2ºDAM 9-13
        DB::table('subjects')->insert([
            'name' => 'Programación de Servicios y Procesos',
            'abbreviation'=>'PSP',
            "hours"=>60	,
            'color'=>'#ffdd77',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([   
            'name' => 'Programacion multimedia y dispositivos moviles',
            'abbreviation'=>'PMM',
            "hours"=>100	,
            'color'=>'#ffaaaa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sistema de Gestión Empresarial',
            'abbreviation'=>'SGE',
            "hours"=>100	,
            'color'=>'#aaff77',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Desarrollo de interfaces',
            'abbreviation'=>'DI',
            "hours"=>120	,
            'color'=>'#77aaff',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Acceso a Datos',
            'abbreviation'=>'AD',
            "hours"=>120,
            'color'=>'#aa77ff',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //FIN 2º DAM 

        //2ºDAW 14-17
        DB::table('subjects')->insert([
            'name' => 'Desarrollo web en entorno cliente',
            'abbreviation'=>'DWEC',
            "hours"=>140	,
            'color'=>'#6699dd',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Desarrollo web en entorno servidor',
            'abbreviation'=>'DWES',
            "hours"=>160	,
            'color'=>'#88bbee',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Despliegue de aplicaciones web',
            'abbreviation'=>'DAW',
            "hours"=>80	,
            'color'=>'#0011dd',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Diseño de interfaces web',
            'abbreviation'=>'DIW',
            "hours"=>120	,
            'color'=>'#77aaff',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //1ºASIR 18-21
        DB::table('subjects')->insert([
            'name' => 'Implantación de sistemas operativos',
            'abbreviation'=>'ISO',
            "hours"=>224	,
            'color'=>'#aaaa77',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Planificación y administración de redes',
            'abbreviation'=>'PAR',
            "hours"=>192	,
            'color'=>'#aa77aa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Fundamentos de hardware',
            'abbreviation'=>'FH',
            "hours"=>96	,
            'color'=>'#77aaaa',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Gestión de bases de datos',
            'abbreviation'=>'GBD',
            "hours"=>160	,
            'color'=>'#77aaaa',
            'created_at' => now(),
            'updated_at' => now()
        ]);//LM
        //2ºASIR 22-26
        DB::table('subjects')->insert([
            'name' => 'Administración de sistemas operativos',
            'abbreviation'=>'ASO',
            "hours"=>120	,
            'color'=>'#88aabb',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Servicios de red e Internet',
            'abbreviation'=>'SRI',
            "hours"=>120	,
            'color'=>'#88bbcc',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Implantación de aplicaciones web',
            'abbreviation'=>'IAW',
            "hours"=>100	,
            'color'=>'#bbbcec',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Administración de sistemas gestores de bases de datos',
            'abbreviation'=>'SGBD',
            "hours"=>60	,
            'color'=>'#4abb7c',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Seguridad y alta disponibilidad',
            'abbreviation'=>'SAD',
            "hours"=>100,
            'color'=>'#1abbec',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        //1º de SMR 27-30
        DB::table('subjects')->insert([
            'name' => 'Montaje y mantenimiento de equipos',
            'abbreviation'=>'MME',
            "hours"=>224	,
            'color'=>'#9acfea',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Redes locales',
            'abbreviation'=>'RL',
            "hours"=>224	,
            'color'=>'#7fbcec',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Aplicaciones ofimáticas',
            'abbreviation'=>'AO',
            "hours"=>224	,
            'color'=>'#1ab88c',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Sistemas operativos Monopuesto',
            'abbreviation'=>'SOM',
            "hours"=>128	,
            'color'=>'#1accec',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //2º de SMR 31-34
        DB::table('subjects')->insert([
            'name' => 'Sistemas operativos en red',
            'abbreviation'=>'SOR',
            "hours"=>176	,
            'color'=>'#1adb5c',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Seguridad informática',
            'abbreviation'=>'SEI',
            "hours"=>110	,
            'color'=>'#1ab1ec',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Servicios en red',
            'abbreviation'=>'SER',
            "hours"=>176	,
            'color'=>'#1accec',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('subjects')->insert([
            'name' => 'Aplicaciones web',
            'abbreviation'=>'APW',
            "hours"=>88	,
            'color'=>'#1abb78',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //1ºFP BASICA
        

    }
}
