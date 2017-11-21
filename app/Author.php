<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['firstname', 'surname'];

    public function book()
    {
        return $this->hasMany('App\Book');
    }
}
