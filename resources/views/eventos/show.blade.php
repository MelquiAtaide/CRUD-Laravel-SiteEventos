@extends('template.main')

@section('title', $eventos->titulo)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/eventos/{{ $eventos->imagem }}" class="img-fluid" alt="{{ $eventos->titulo }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $eventos->titulo }}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $eventos->cidade }}</p>
            <p class="events-participants"><ion-icon name="people-outline"></ion-icon>{{ count($eventos->users) }} participantes</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}</p>
            @if (!$hasUserJoined)
                <form action="/evento/join/{{ $eventos->id }}" method="POST">
                    @csrf
                    <a href="/evento/join/{{ $eventos->id }}"
                        class="btn btn-primary fancy-btn" id="event-submit"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        Confirmar Presença
                    </a>
                </form>
            @else
                <p class="already-joined-msg">Você já está participando desde evento</p>
            @endif
            <h3>O evento conta com:</h3>
            <ul id="itens-list">
                @foreach ($eventos->itens as $item)
                    <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento:</h3>
            <p class="event-description">{{ $eventos->descricao }}</p>
        </div>
    </div>
</div>

@endsection
