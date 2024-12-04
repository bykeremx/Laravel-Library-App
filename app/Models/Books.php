<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'category_id', 
        'title', 
        'content', 
        'author', 
        'stock', 
        'publishing', 
        'book_img'
    ];
    public $timestamps = false;
    
}
