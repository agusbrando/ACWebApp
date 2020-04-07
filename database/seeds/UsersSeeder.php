
<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert([
            'first_name' => 'default',
            'last_name' => 'default',
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'rol_id' => 1
        ]);
        
        DB::table('users')->insert([
            'first_name' => 'default2',
            'last_name' => 'default2',
            'email' => Str::random(10).'@gmail.com',
            'password' => Str::random(10),
            'rol_id' => 2
        ]);
    }
}
