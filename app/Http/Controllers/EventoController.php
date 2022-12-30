<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Http\Requests\StoreUserRequest;

class EventoController extends Controller
{
    public function index (){

        $eventos = Evento::all();

        return view('index', ['eventos' => $eventos]);
    }

    public function create (){
        return view('eventos.create');
    }

    public function store (StoreUserRequest $request){

        $evento = new Evento;

        // $evento::create($request->all());

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImagem->move(public_path('img/eventos'), $imagemName);

            $evento->imagem = $imagemName;

        }

        $evento::create($request->all());

        return redirect('/')->with('msg', 'Evento Criado com Sucesso!');
    }
}
