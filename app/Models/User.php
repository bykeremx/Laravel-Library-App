<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'id',
        'name',
        'surname',
        'email',
        'is_admin',
        'created_at',
        'updated_at',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

    public $timestamps = false;
    public function getBooks()
    {
        return $this->belongsToMany(Books::class, 'user_book', 'user_id', 'book_id');
    }
}
