<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function histories() {
        return $this->hasMany(History::class, 'libro_id');
    }
    
}


