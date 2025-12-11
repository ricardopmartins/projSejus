@extends('layout')

@section('title', 'createPage')

@section('styles')

@endsection

@section('content')
<div class="container">
    <h1>Adicionar Novo Jogo</h1>

    <form action="{{ route('admin.jogos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        {{-- Nome jogo --}}
        <div class="mb-3">
            <label for="nome_jogo" class="form-label">Nome do Jogo</label>
            <input type="text" name="nome_jogo" id="nome_jogo" class="form-control" required>
        </div>

        {{-- Plataforma --}}
        <div class="mb-3">
            <label for="plataforma" class="form-label">Plataforma</label>
            <input type="text" name="plataforma" id="plataforma" class="form-control" required>
        </div>

        {{-- Valor --}}
        <div class="mb-3">
            <label for="valor" class="form-label">Preço Original</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" required>
        </div>

        {{-- Desconto --}}
        <div class="mb-3">
            <label for="discount" class="form-label">Desconto (%)</label>
            <input type="number" name="discount" id="discount" class="form-control">
        </div>

        {{-- Imagem --}}
        <div class="mb-3">
            <label for="image_path" class="form-label">Imagem</label>
            <input type="file" name="image_path" id="image_path" class="form-control">
        </div>

        {{-- Botão Salvar--}}
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.jogos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection
