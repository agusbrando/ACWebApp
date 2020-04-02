<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Roby',
            'last_name' => 'Baltaretu',
            'email' => 'gerobal@campusaula.com',
            'password' => bcrypt('password'),
            'role_id' =>('001')
        ]);
    }
}
