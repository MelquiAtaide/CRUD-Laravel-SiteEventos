@extends('template.main')

@section('title', 'MA eventos')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="imagem">Imagem do Evento:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
        </div>
        <div class="form-group">
            <label for="titulo">Evento:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do evento">
        </div>
        <div class="form-group">
            <label for="titulo">Data do evento:</label>
            <input type="date" class="form-control" id="data" name="data" placeholder="Título do evento">
        </div>
        <div class="form-group">
            <label for="titulo">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento">
        </div>
        <div class="form-group">
            <label for="titulo">O evento é privado?</label>
            <select name="privado" id="privado" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="O que vai acontecer no evento?">
        </div>
        <div class="form-group">
            <label for="titulo">Adicione itens de infraestrutura:</label>
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
        <input type="submit" class="btn btn-primary" id="btnform" value="Criar Evento">
    </form>
</div>

@endsection
