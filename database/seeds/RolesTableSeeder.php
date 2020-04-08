<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('roles')->insert([
                'created_at' => now(),
                'updated_at' => now(),
                'name'         =>    'name ' . $i
            ]);
        }
    }
}
