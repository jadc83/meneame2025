<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;

    public function comentable()
    {
        return $this->morphTo();
    }

    public function subcomentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }
}
