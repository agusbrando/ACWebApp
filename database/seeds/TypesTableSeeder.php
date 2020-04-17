<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'default',
            'model' => 'Percentage',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'default2',
            'model' => 'Event',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Portatil',
            'model' => 'Item',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'All in One',
            'model' => 'Item',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Torre',
            'model' => 'Item',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Pantalla',
            'model' => 'Item',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'default3',
            'model' => 'Misbehaviors',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
