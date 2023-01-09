@extends('template.main')

@section('title', 'Editando: ' . $eventos->titulo)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $eventos->titulo }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/evento/update/{{ $eventos->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="imagem">Imagem do Evento:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
            <img src="/img/eventos/{{ $eventos->imagem }}" alt="{{ $eventos->titulo }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="titulo">Evento:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do evento" value="{{ $eventos->titulo }}">
        </div>
        <div class="form-group">
            <label for="data">Data do evento:</label>
            <input type="date" class="form-control" id="data" name="data" value="{{ $eventos->data->format('Y-m-d') }}">
        </div>
        <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento" value="{{ $eventos->cidade }}">
        </div>
        <div class="form-group">
            <label for="privado">O evento é privado?</label>
            <select name="privado" id="privado" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $eventos->privado == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="O que vai acontecer no evento?" value="{{ $eventos->descricao }}">
        </div>
        <div class="form-group">
            <label for="itens">Adicione itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Open Bar"> Open Bar
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Open Food"> Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="itens[]" value="Brindes"> Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary fancy-btn" id="btnform" value="Editar Evento">
    </form>
</div>

@endsection
