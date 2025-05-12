<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    
    public function book() {
        return $this->belongsTo(Book::class, 'libro_id');
    }
    
}
