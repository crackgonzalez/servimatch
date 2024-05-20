<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'título',
        'descripción',
        'categoría',
        'precio',
        'ubicación',
        'fecha_publicación',
        'activo',
    ];

    // Definir la relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
