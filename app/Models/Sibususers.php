<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Sibususers extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'info_usuarios_sibus';
    
    protected $fillable = [
        'idempresaCon',
        'nombre',
        'apellido',
        'usuario',
        'contrasena',
        'fecha_creacion',
        'usuario_creacion',
        'fecha_edicion',
        'usuario_edicion',
        'estado',
        'telefono',
        'rut',
    ];
}

