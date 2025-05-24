<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Base para autenticación de usuarios
use Illuminate\Notifications\Notifiable; // Permite enviar notificaciones (email, etc.)

class User extends Authenticatable
{
    use Notifiable; // Habilita notificaciones en este modelo

    // Lista de atributos que pueden ser asignados masivamente
    protected $fillable = ['name', 'email', 'password'];

    // Atributos ocultos cuando se convierte a array o JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación: un usuario tiene muchos historiales
    public function histories()
    {
        return $this->hasMany(History::class, 'usuario_id'); // Clave foránea 'usuario_id' en la tabla histories
    }
}
