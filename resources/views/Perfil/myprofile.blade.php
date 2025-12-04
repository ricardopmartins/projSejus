@extends('Perfil.basePerfil')

@section('profile_content')

<div class="mb-5 text-center text-md-start">
    <h3 class="h3 mb-2">Informações Pessoais</h3>
    <p class="text-muted">Atualize seus dados de contato e localização.</p>
</div>

<div class="bg-light p-4 rounded-4 mb-5 border">
    <div class="d-flex flex-column gap-4">

        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm">
                <i class="bi bi-envelope fs-4"></i>
            </div>
            
            <div class="w-100">
                <label class="form-label text-muted small mb-0 fw-bold">Email</label>
                <input type="email" class="form-control border-0 bg-transparent px-0 fw-medium"
                    value="usuario@exemplo.com" style="box-shadow: none;">
                <hr class="my-1 text-muted">
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm">
                <i class="bi bi-telephone fs-4"></i>
            </div>

            <div class="w-100">
                <label class="form-label text-muted small mb-0 fw-bold">Telefone</label>
                <input type="tel" class="form-control border-0 bg-transparent px-0 fw-medium" value="+55 11 99999-9999"
                    style="box-shadow: none;">
                <hr class="my-1 text-muted">
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm">
                <i class="bi bi-geo-alt fs-4"></i>
            </div>

            <div class="w-100">
                <label class="form-label text-muted small mb-0 fw-bold">Localização</label>
                <input type="text" class="form-control border-0 bg-transparent px-0 fw-medium" value="São Paulo, Brasil"
                    style="box-shadow: none;">
                <hr class="my-1 text-muted">
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm">
                <i class="bi bi-calendar fs-4"></i>
            </div>

            <div class="w-100">
                <label class="form-label text-muted small mb-0 fw-bold">Data de Nascimento</label>
                <input type="date" class="form-control border-0 bg-transparent px-0 fw-medium" value="1990-01-01"
                    style="box-shadow: none;">
                <hr class="my-1 text-muted">

            </div>
        </div>
    </div>
</div>

<div class="bg-light p-4 rounded-4 mb-5 border">

    <h4 class="h4 mb-4 d-flex align-items-center gap-2 text-dark">
        <i class="bi bi-shield-lock text-primary fs-4"></i>
        Segurança
    </h4>

    <div class="row g-4">
        <div class="col-12">
            <input type="password" class="form-control" placeholder="Senha Atual">
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-label text-muted small fw-bold">Nova Senha</label>
        <input type="password" class="form-control" placeholder="••••••••">
    </div>

    <div class="col-md-6">
        <label class="form-label text-muted small fw-bold">Confirmar Senha</label>
        <input type="password" class="form-control" placeholder="••••••••">
    </div>

</div>

<div class="d-flex gap-3 pt-2">
    <button type="submit" class="btn btn-primary btn-lg px-4 py-2 fw-medium flex-fill">Salvar Alterações</button>
    <button
        class="btn btn-light btn-lg text-secondary border px-4 py-2 fw-medium flex-fill hover-shadow">Cancelar</button>
</div>

@endsection
