@extends('template.main')

@section('title', $eventos->titulo)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img class="img-fluid" src="img/eventos/{{ $eventos->imagem }}" alt="{{ $eventos->titulo }}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $eventos->titulo }}</h1>
            <p class="event-city"><ion-icon class="location-outline"></ion-icon>{{ $eventos->cidade }}</p>
        </div>
    </div>
</div>

@endsection
