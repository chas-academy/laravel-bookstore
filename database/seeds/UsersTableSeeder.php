<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        // Skapa upp två exempel-användare

        User::create(array(
            'name' => 'John Doe',
            'email' => 'example@example.org',
            'password' => Hash::make('password'),
            'admin' => 0
        ));

        User::create(array(
            'name' => 'Jennifer Taylor',
            'email' => 'admin@example.org',
            'password' => Hash::make('adminpassword'),
            'admin' => 1
        ));
    }
}
