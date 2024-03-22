<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name', 'last_name', 'birthdate', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relación con las publicaciones del usuario
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
