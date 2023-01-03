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

        $eventos = new Evento;

        $eventos->titulo = $request->titulo;
        $eventos->data = $request->data;
        $eventos->cidade = $request->cidade;
        $eventos->privado = $request->privado;
        $eventos->descricao = $request->descricao;
        $eventos->itens = $request->itens;

        //$evento::create($request->all());

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImagem->move(public_path('img/eventos'), $imagemName);

            $eventos->imagem = $imagemName;
        }

        $eventos->save();

        return redirect('/')->with('msg', 'Evento Criado com Sucesso!');
    }

    public function show ($id){

        $eventos = Evento::findOrFail($id);

        return view('eventos.show', ['eventos' => $eventos]);
    }
}
