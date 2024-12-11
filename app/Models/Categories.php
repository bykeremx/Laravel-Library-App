<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'category';
    
    protected $fillable = [
        'id',
        'name', 
    ];
    public $timestamps = false;

    // public function books(){
    //     return $this->hasMany(Books::class);
    // }
}
