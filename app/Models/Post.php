<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];

    public function user()
    {
        //un post pertece a un usuario
        return $this->belongsTo(User::class)->select(['name','username']);
    }

    public function comentarios()
    {
        //un comentario pertenece a un usuario
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        //un post puede tener muchos likes
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        //verificar si ya le dieron like a alguna publicacion
        return $this->likes->contains('user_id', $user->id);
    }
}
