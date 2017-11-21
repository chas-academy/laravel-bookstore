<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->delete();
        
        // Skapa upp tre exempel-författare
        Author::create(array(
            'firstname' => 'George',
            'surname' => 'Orwell'
        ));

        Author::create(array(
            'firstname' => 'Stephen',
            'surname' => 'King'
        ));

        Author::create(array(
            'firstname' => 'J.K.',
            'surname' => 'Rowling'
        ));
    }
}
