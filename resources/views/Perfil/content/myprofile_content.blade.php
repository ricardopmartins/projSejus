@section('title', 'Account')
<div class="mb-5 text-center text-md-start">
    <h3 class="h3 mb-2">Informações Pessoais</h3>
    <p class="text-muted">Atualize seus dados de contato e Endereço.</p>
</div>

<div class="bg-light p-4 rounded-4 mb-5 border">
    <div class="d-flex flex-column gap-4">
        {{-- Email --}}
        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm mb-3">
                <i class="bi bi-envelope fs-4"></i>
            </div>

            <div class="w-100 position-relative">
                <label class="form-label text-muted mb-0 fw-bold">Email</label>

                <input type="email"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    value="{{ $user->email }}"
                    readonly data-field="email"
                    style="padding-left: 10px !important"
                >

                <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-0 end-0 toggle-edit">
                    <i class="bi bi-pencil"></i>
                </button>
                <hr class="my-1 text-muted">
            </div>
        </div>
        {{-- Telefone --}}
        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm mb-3">
                <i class="bi bi-telephone fs-4"></i>
            </div>

            <div class="w-100 position-relative">
                <label class="form-label text-muted mb-0 fw-bold">Telefone</label>
                <input type="tel"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    value="{{ $user->telefone }}"
                    readonly
                    data-field="telefone"
                    style="padding-left: 10px !important"
                >

                <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-0 end-0 toggle-edit">
                    <i class="bi bi-pencil"></i>
                </button>
                <hr class="my-1 text-muted">
            </div>
        </div>
        {{-- Endereço --}}
        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm mb-3">
                <i class="bi bi-geo-alt fs-4"></i>
            </div>

            <div class="w-100 position-relative endereco-block">

                <label class="form-label text-muted mb-0 fw-bold">Cidade</label>
                <input type="text"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    style="padding-left: 10px !important"
                    value="{{ $user->endereco?->cidade }}"
                    readonly
                    data-field="cidade"
                >

                <label class="form-label text-muted mb-0 fw-bold">Estado</label>
                <input type="text"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    style="padding-left: 10px !important"
                    value="{{ $user->endereco?->estado }}"
                    readonly
                    data-field="estado"
                >

                <label class="form-label text-muted mb-0 fw-bold">Rua</label>
                <input type="text"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    style="padding-left: 10px !important"
                    value="{{ $user->endereco?->rua }}"
                    readonly
                    data-field="rua"
                >

                <label class="form-label text-muted mb-0 fw-bold">Bairro</label>
                <input type="text"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    style="padding-left: 10px !important"
                    value="{{ $user->endereco?->bairro }}"
                    readonly
                    data-field="bairro"
                >

                <label class="form-label text-muted mb-0 fw-bold">Número</label>
                <input type="text"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    style="padding-left: 10px !important"
                    value="{{ $user->endereco?->numero }}"
                    readonly
                    data-field="numero"
                >

                <label class="form-label text-muted mb-0 fw-bold">CEP</label>
                <input type="text"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    style="padding-left: 10px !important"
                    value="{{ $user->endereco?->cep }}"
                    readonly
                    data-field="cep"
                >

                <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-0 end-0 toggle-edit-group">
                    <i class="bi bi-pencil"></i>
                </button>
                <hr class="my-1 text-muted">
            </div>
        </div>
        {{-- Data Nascimento --}}
        <div class="d-flex align-items-center gap-3">
            <div class="text-primary bg-white p-2 rounded shadow-sm">
                <i class="bi bi-calendar fs-4"></i>
            </div>

            <div class="w-100 position-relative">
                <label class="form-label text-muted mb-0 fw-bold">Data de Nascimento</label>
                <input type="date"
                    class="form-control border-0 bg-transparent px-0 fw-medium editable-field shadow-sm mb-3"
                    value="{{$user->data_nascimento}}"
                    readonly data-field="data_nascimento"
                    style="padding-left: 10px !important"
                >

                <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-0 end-0 toggle-edit">
                    <i class="bi bi-pencil"></i>
                </button>
                <hr class="my-1 text-muted">
            </div>
        </div>
    </div>
</div>
{{-- Mensagem pop-up toast --}}
<div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
    <div id="toast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div id="toast-message" class="toast-body">
                <!-- Mensagem entra aqui -->
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

{{-- Lógica Para Mostrar Pop-Up Toast --}}
<script>
    function showToast(type, field, value = null) {
        let fieldName = '';
        switch(field) {
            case 'email': fieldName = 'Email'; break;
            case 'telefone': fieldName = 'Telefone'; break;
            case 'data_nascimento': fieldName = 'Data de Nascimento'; break;
            case 'endereco': fieldName = 'Endereço'; break;
            case 'cep': fieldName = 'CEP'; break;
            default: fieldName = field;
        }

        let message = type === 'success'
        ? (fieldName === 'Endereço')
            ? `${fieldName} atualizado com sucesso!`
            : `${fieldName} atualizado com sucesso: ${value}`
        : `Erro ao atualizar ${fieldName}.`;

        // Cria elemento toast
        const toastContainer = document.getElementById('toast-container');
        const toastEl = document.createElement('div')
        toastEl.className = `toast align-items-center text-bg-${type === 'success' ? 'success' : 'danger'} border-0 mb-2`;
        toastEl.setAttribute('role', 'alert');
        toastEl.setAttribute('aria-live', 'assertive');
        toastEl.setAttribute('aria-atomic', 'true');

        toastEl.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        `;

        toastContainer.appendChild(toastEl);

        // Inicia e ,ostra o toast
        const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
        toast.show();

        // Remove o elemento do DOM depois qie desaparecer
        toastEl.addEventListener('hidden.bs.toast', () => {
            toastEl.remove();
        });
    }
</script>

{{-- Lógica tornar campo editável com botão lápis --}}
<script>
    document.querySelectorAll('.toggle-edit').forEach(button => {
    button.addEventListener('click', () => {
        const input = button.closest('.w-100').querySelector('.editable-field');
        if (!input) return;

        if (input.hasAttribute('readonly')) {
            input.removeAttribute('readonly');
            input.focus();
            button.innerHTML = '<i class="bi bi-check-lg"></i>'; // Transforma em campo de confimação com check
        } else {
            input.setAttribute('readonly', true);
            button.innerHTML = '<i class="bi bi-pencil"></i>';

            let value = input.value;

            if (input.dataset.field === 'telefone') {
                value = Inputmask.unmask(input.value, { mask: '+55 (99) 9 9999-9999' }); // Desmascara número na hora de enviar para banco de dados
            }

            console.log("Enviando para backend:", input.dataset.field, value);

            fetch("{{ route('myProfile.update') }}", {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    field: input.dataset.field,
                    value: value
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    showToast('success', input.dataset.field, input.value); // Dispara mensagem de sucesso com toast
                } else {
                    showToast('danger', input.dataset.field); // Dispara mensagem de erro com toast
                }
            })
            .catch(err => console.error(err));
        }
    });
});
    // Máscara visual Telefone
    Inputmask({ mask: '+55 (99) 9 9999-9999' })
        .mask(document.querySelectorAll('input[data-field="telefone"]'));
</script>


<script>
    document.querySelectorAll('.toggle-edit-group').forEach(button => {
        button.addEventListener('click', () => {
            const block = button.closest('.endereco-block');
            const inputs = block.querySelectorAll('.editable-field');

            if (inputs[0].hasAttribute('readonly')) {
                // Libera todos os campos
                inputs.forEach(i => i.removeAttribute('readonly'));
                inputs[0].focus();
                button.innerHTML = '<i class="bi bi-check-lg"></i>'; // Transforma em campo de confimação com check
            } else {
                // Volta todos para readonly e salva no banco
                inputs.forEach(i => i.setAttribute('readonly', true));
                button.innerHTML = '<i class="bi bi-pencil"></i>'

                // Monta objeto com todos os campos
                let payload = {};
                inputs.forEach(i => {
                    let val = i.value;
                    if (i.dataset.field === 'cep') {
                        val = Inputmask.unmask(i.value, { mask: '99999-999' }); // Desmascara número na hora de enviar para banco de dados
                    }
                    payload[i.dataset.field] = val;
                });

                fetch("{{ route('myProfile.update') }}", {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        field: "endereco",
                        value:payload
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        showToast('success', 'endereco'); // Dispara mensagem de sucesso com toast
                    } else {
                        showToast('danger', 'endereco'); // Dispara mensagem de erro com toast
                    }
                })
                .catch(err => console.error(err));
            }
        });
    });

    // Máscara visual CEP
    Inputmask({ mask: '99999-999' })
        .mask(document.querySelectorAll('input[data-field="cep"]'));
</script>
