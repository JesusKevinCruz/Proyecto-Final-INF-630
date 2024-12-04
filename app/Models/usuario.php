<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_usuario');
    }
    protected $fillable = [
        'Nombre', 'Email', 'password', 'Rol',
    ];
    public function getAuthPassword()
    {
        return $this->Contraseña; // Asegúrate de que la columna en la base de datos sea 'password'
    }


    // Ocultar la contraseña al convertir el modelo a un array o JSON
    protected $hidden = [
        'password',
    ];

    // Asegúrate de que las fechas se manejen correctamente
    protected $dates = ['created_at', 'updated_at'];

    // Usar mutador para encriptar la contraseña al momento de crear o actualizar el usuario
    public function setPasswordAttribute($value)
    {
        $this->attributes['Contraseña'] = bcrypt($value);
    }


}
