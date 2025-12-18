@section('title', 'Account')
<div class="mb-5 text-center text-md-start text-white">
    <h3 class="h3 mb-2 text-white">Informações Pessoais</h3>
    <p class="text-muted" style="color: white !important">Atualize seus dados de contato e localização.</p>
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
                    value="{{ $user->email }}" style="box-shadow: none;">
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
                <input type="text" class="form-control border-0 bg-transparent px-0 fw-medium" value="{{$user->endereco?->cidade ?? ''}}-{{$user->endereco?->estado ?? ''}} , {{$user->endereco?->rua ?? ''}}-{{$user->endereco?->numero ?? ''}}"
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
                <input type="date" class="form-control border-0 bg-transparent px-0 fw-medium" value={{$user->data_nascimento}}
                style="box-shadow: none;">
                <hr class="my-1 text-muted">

            </div>
        </div>
    </div>
</div>
