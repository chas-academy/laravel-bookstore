<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'book_id', 'amount', 'total'];

    public function book()
    {
        return $this->belongsTo('App\Book', 'book_id');
    }
}
