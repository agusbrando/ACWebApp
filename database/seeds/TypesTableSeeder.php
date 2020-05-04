<?php

use Illuminate\Database\Seeder;
use App\Models\Percentage;
use App\Models\Item;
use App\Models\Misbehavior;
use App\Models\Event;


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
            'model' => Percentage::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'default2',
            'model' => Event::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Portatil',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'All in One',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Torre',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Teclado',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Pantalla',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'default3',
            'model' => Misbehavior::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
