<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'id',
        'category_id', 
        'title', 
        'content', 
        'author', 
        'stock', 
        'publishing_id', 
        'book_img'
    ];
    public $timestamps = false;
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_book');
                    
    }
    public function Getpublishing()
    {
        return $this->belongsTo(Publishing::class, 'publishing_id');
    }
    
}
