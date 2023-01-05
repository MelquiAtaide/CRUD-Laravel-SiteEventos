@extends('template.main')

@section('title', 'MA eventos')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um Evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if ($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Próximos Eventos</h2>
        <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach ($eventos as $event)
            <div class="card col-md-3">
                <img src="img/eventos/{{ $event->imagem }}" alt="{{ $event->titulo }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->data)) }}</p>
                    <h5 class="card-title">{{ $event->titulo }}</h5>
                    <p class="card-participants">x participantes</p>
                    <a href="/evento/{{ $event->id }}" class="btn btn-primary fancy-btn">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if (count($eventos) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}! <a href="/">Ver todos!</a></p>
        @elseif (count($eventos) == 0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>


{{-- https://www.youtube.com/watch?v=_sayRBbEHN8&list=PLnDvRpP8BnewYKI1n2chQrrR4EYiJKbUG&index=8 --}}
{{-- https://pt.stackoverflow.com/questions/136163/deploy-de-projeto-laravel-pelo-git --}}
{{-- https://www.youtube.com/watch?v=e4x9WAr4yZY --}}
{{-- https://www.youtube.com/watch?v=OsgsapoaIHE --}}

@endsection
