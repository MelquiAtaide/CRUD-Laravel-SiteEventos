@extends('template.main')

@section('title', 'DashBoard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-tittle-container">
    <h3>Meus Eventos</h3>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($eventos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $event)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><a href="/evento/{{ $event->id }}">{{ $event->titulo }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td>
                            <a href="/evento/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                            <form action="/evento/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @else
    <p>Você ainda não tem eventos, <a href="{{route('create')}}">Criar Evento</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-tittle-container">
    <h3>Eventos que estou participando</h3>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($eventsAsParticipant) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Sair do evento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventsAsParticipant as $event)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><a href="/evento/{{ $event->id }}">{{ $event->titulo }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td>
                            <form action="/evento/leave/{{ $event->id }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos os eventos</a></p>
    @endif
</div>

@endsection
