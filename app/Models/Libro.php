<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

   protected $fillable = [
    'titulo', 'descripcion', 'categoria', 'imagen', 'archivo', 'user_id', 'estado'
];

public function usuario()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}


}

