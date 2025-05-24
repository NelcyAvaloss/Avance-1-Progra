<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory; // Permite usar factories si trabajas con tests o seeds

    // Relación: este historial pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id'); // 'usuario_id' es la clave foránea en la tabla histories
    }

    // Relación: este historial pertenece a un libro
    public function book()
    {
        return $this->belongsTo(Book::class, 'libro_id'); // 'libro_id' es la clave foránea en la tabla histories
    }
}
