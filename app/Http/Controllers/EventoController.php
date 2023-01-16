<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Http;

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

        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $eventos->user_id)->first()->toArray();

        return view('eventos.show', ['eventos' => $eventos, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard(){

        $user = auth()->user();

        $eventos = $user->eventos;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('eventos.dashboard', ['eventos' => $eventos, 'eventsAsParticipant' => $eventsAsParticipant]);
    }

    public function destroy ($id){

        Evento::findOrFail($id)->delete();

        return redirect('dashboard')->with('msg', 'Evento Excluído com sucesso!');
    }

    public function edit($id){

        $user = auth()->user();

        $eventos = Evento::findOrFail($id);

        if($user->id != $eventos->user->id)
        {
            return redirect('dashboard');
        }

        return view('eventos.edit', ['eventos' => $eventos]);
    }

    public function update(StoreUpdateRequest $request){

        $data = $request->all();

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImagem->move(public_path('img/eventos'), $imagemName);

            $data['imagem'] = $imagemName;
        }

        Evento::findOrFail($request->id)->update($data);

        return redirect('dashboard')->with('msg', 'Evento Editado com sucesso!');
    }

    public function joinEvent($id) {

        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $eventos = Evento::findOrFail($id);

        return redirect('dashboard')->with('msg', 'sua presença está confirmada no evento: '. $eventos->titulo);
    }

    public function leaveEvent ($id){

        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $eventos = Evento::findOrFail($id);

        return redirect('dashboard')->with('msg', 'Você saiu com sucesso do evento: '. $eventos->titulo);
    }

    // public function api () {

    //     $father = Http::get('https://jsonplaceholder.typicode.com/todos/1');

    //     $apiArray = $father->json();

    //     dd($apiArray);

    //     // return view('eventos.dashboard', ['apiArray' => $apiArray]);
    // }
}
