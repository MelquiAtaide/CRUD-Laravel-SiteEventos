<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Http\Requests\StoreEventRequest;
use App\Models\User;

class EventoController extends Controller
{
    public function index (){

        $search = request('search');

        if ($search) {
            $eventos = Evento::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        }else {
            $eventos = Evento::all();
        }

        return view('index', ['eventos' => $eventos, 'search' => $search]);
    }

    public function create (){
        return view('eventos.create');
    }

    public function store (StoreEventRequest $request, Evento $eventos){

        // $eventos = new Evento;

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

        $user = auth()->user();
        $eventos->user_id = $user->id;

        $eventos->save();

        return redirect('/')->with('msg', 'Evento Criado com Sucesso!');
    }

    public function show ($id){

        $eventos = Evento::findOrFail($id);

        $eventOwner = User::where('id', $eventos->user_id)->first()->toArray();

        return view('eventos.show', ['eventos' => $eventos, 'eventOwner' => $eventOwner]);
    }
}
