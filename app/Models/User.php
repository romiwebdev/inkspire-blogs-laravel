<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable,
    HasFactory;

    // Izinkan atribut ini untuk pengisian massal
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Tambahkan role jika Anda ingin mengisinya secara massal
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }
}
