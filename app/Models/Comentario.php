<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comentario'
    ];

    public function user()
    {
        /*Un comentario o este comentario pertenece a un solo usuario,
          un comentario pertenece a un unico usuario
        */
        return $this->belongsTo(User::class);
    }
}
