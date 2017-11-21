<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();

        Book::create(array(
            'title' => '1984',
            'isbn' => 9780456129319,
            'price' => 14.50,
            'cover' => '1984.jpg',
            'author_id' => 1
        ));

        Book::create(array(
            'title' => 'The Shining',
            'isbn' => 9780456129318,
            'price' => 12.50,
            'cover' => 'theshining.jpg',
            'author_id' => 2
        ));
        
        Book::create(array(
            'title' => 'Harry Potter and the Sorcerer\'s stone',
            'isbn' => 9780456129317,
            'price' => 55.50,
            'cover' => 'harry.jpg',
            'author_id' => 3
        ));
    }
}
