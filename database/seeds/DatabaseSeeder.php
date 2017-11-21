<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AuthorsTableSeeder');
        $this->command->info('Author table has been successfully seeded!');
        $this->call('BooksTableSeeder');
        $this->command->info('Book table has been successfully seeded!');
        $this->call('UsersTableSeeder');
        $this->command->info('User table has been successfully seeded!');
    }
}
