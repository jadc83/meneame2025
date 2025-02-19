<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    /** @use HasFactory<\Database\Factories\NoticiaFactory> */
    use HasFactory;
    use SoftDeletes;

    public $fillable = ['titulo', 'resumen', 'url', 'user_id', 'categoria_id'];

    public function categoria(){

        return $this->belongsTo(Categoria::class);

    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
