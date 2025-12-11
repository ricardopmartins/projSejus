@extends('layout')

@section('title', 'editPage')

@section('styles')

@endsection

@section('content')
<div class="container">
    <h1>Editar Jogo</h1>

    <form action="{{ route('admin.jogos.update', $jogo->id_jogo) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nome jogo --}}
        <div class="mb-3">
            <label for="nome_jogo" class="form-label">Nome do Jogo</label>
            <input type="text" name="nome_jogo" id="nome_jogo" class="form-control" value="{{ old('nome_jogo', $jogo->nome_jogo) }}" required>
        </div>

        {{-- Plataforma --}}
        <div class="mb-3">
            <label for="plataforma" class="form-label">Plataforma</label>
            <input type="text" name="plataforma" id="plataforma" class="form-control" value="{{ old('plataforma', $jogo->plataforma) }}" required>
        </div>

        {{-- Valor Preço original --}}
        <div class="mb-3">
            <label for="valor" class="form-label">Preço Original</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ old('valor', $jogo->valor) }}" required>
        </div>

        {{-- Desconto --}}
        <div class="mb-3">
            <label for="discount" class="form-label">Desconto (%)</label>
            <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount', $jogo->discount) }}">
        </div>

        {{-- Imagem capa --}}
        <div class="mb-3">
            <label for="image_path" class="form-label">Imagem</label>
            <input type="file" name="image_path" id="image_path" class="form-control">
            @if($jogo->imagem)
                <img src="{{ $jogo->imagem }}" alt="{{ $jogo->nome_jogo }}">
            @endif
        </div>
        
        {{-- Botão salvar --}}
        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('admin.jogos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
