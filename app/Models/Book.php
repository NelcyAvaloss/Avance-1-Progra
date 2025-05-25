<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory; // Permite usar factories para este modelo

    // Relación uno a muchos: un libro tiene muchas historias
    public function histories()
    {
        return $this->hasMany(History::class, 'libro_id'); // Clave foránea en la tabla histories
    }
}
