<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'approved', 'user_id'];

    // Relación con el usuario que creó la publicación
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Añadir un método para obtener el nombre del usuario que creó la publicación
    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
}
