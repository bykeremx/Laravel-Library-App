<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publishing extends Model
{
    protected $table = 'publishing';

    protected $fillable = [
        'name',
    ];
    public $timestamps = false;

    // public function books(){
    //     return $this->hasMany(Books::class);
    // }
}
