<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    //protected $table = 'eventos';

    protected $fillable = [
        'titulo',
        'cidade',
        'privado',
        'descricao',
        'imagem',
        'data',
        'itens'
    ];

    protected $casts = [
        'itens' => 'array'
    ];

    protected $dates = ['data'];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
