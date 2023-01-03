<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'cidade',
        'privado',
        'descricao',
        'imagem',
    ];

    protected $casts = [
        'itens' => 'array'
    ];

    protected $dates = ['data'];
}
