<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index (){

        $eventos = Evento::all();

        return view('index', ['eventos' => $eventos]);
    }

    public function create (){
        return view('eventos.create');
    }
}
