<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{

    protected $table = 'user_books';
    protected $fillable = [
        'user_id', 
        'book_id', 
        'created_at', 
        'updated_at',
        'return_date',
        'receive_date',
        'status'
    ];
    public $timestamps = false;
    public function book(){
        return $this->belongsTo(Books::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
