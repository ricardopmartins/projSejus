<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="{{ asset('assets/css/styleRegister.css') }}?v={{ file_exists(public_path('assets/css/styleRegister.css')) ? filemtime(public_path('assets/css/styleRegister.css')) : time() }}">
    <title>Register</title>
</head>

<body>
    <section class="register-box">
        <div class="content">
            <a class="link-logo" href="{{Route('homePage')}}"><img src="{{asset('assets/images/logoNova.png')}}" alt="" width="50px"
                    height="50px"></a>
            <h2 class="title">Registrar-se</h2>
            <div class="form-box">
                <form action="/registerPage" method="POST">
                    @csrf
                    <div class="name-box">
                        <label for="name">
                            <input type="text" name="name" id="name" placeholder="&nbsp;">
                            <span class="label">Nome</span>
                            <span class="focus-bg"></span>
                        </label>
                    </div>
                    <div class="side">
                        <div for="inp" class="telefone-box">
                            <label for="telefone">
                                <input type="text" name="telefone" id="telefone" placeholder="&nbsp;">
                                <span class="label">Telefone</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                        <div class="cpf-box">
                            <label for="cpf">
                                <input type="text" name="cpf" id="cpf" placeholder="&nbsp;">
                                <span class="label">CPF</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>

                    </div>

                    <div class="side">
                        <div class="password-box">
                            <label for="password">
                                <input type="password" name="password" id="password" placeholder="&nbsp;">
                                <span class="label">Senha</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>

                        <div class="idade-box">
                            <label for="idade">
                                <input type="date" name="idade" id="idade" placeholder="&nbsp;">
                                <span class="label">Data de Nascimento</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                    </div>
                    <div for="inp" class="email-box">
                        <label for="email">
                            <input type="email" name="email" id="email" placeholder="&nbsp;">
                            <span class="label">Email</span>
                            <span class="focus-bg"></span>
                        </label>
                    </div>
                    <div class="side">
                        <div class="rua-box">
                            <label for="endereco">
                                <input type="text" name="rua" id="rua" placeholder="&nbsp;">
                                <span class="label">Rua</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                        <div class="numero-box">
                            <label for="endereco">
                                <input type="text" name="numero" id="numero" placeholder="&nbsp;" maxlength="4">
                                <span class="label">Numero</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                    </div>
                    <div class="side">
                        <div class="bairro-box">
                            <label for="endereco">
                                <input type="text" name="bairro" id="bairro" placeholder="&nbsp;">
                                <span class="label">Bairro</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                        <div class="cep-box">
                            <label for="endereco">
                                <input type="text" name="cep" id="cep" placeholder="&nbsp;">
                                <span class="label">CEP</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                    </div>
                    <div class="side">
                        <div class="cidade-box">
                            <label for="endereco">
                                <input type="text" name="cidade" id="cidade" placeholder="&nbsp;">
                                <span class="label">Cidade</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                        <div class="estado-box">
                            <label for="endereco">
                                <input type="text" name="estado" id="estado" placeholder="&nbsp;">
                                <span class="label">Estado</span>
                                <span class="focus-bg"></span>
                            </label>
                        </div>
                    </div>
                    <button class="submit-btn">Registrar</button>
                    <p>Já tem uma conta? <a href="{{Route('login')}}">Login</a></p>
                </form>
            </div>
    </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <script>
        $('#cep').mask('00000-000');
        $('#cpf').mask('000.000.000-00', {reverse: true});
        $('#telefone').mask('(00) 0 0000-0000');
        $('form').submit(function(e) {
        e.preventDefault();

        var form = $(this);

        var cep_limpo = $('#cep').cleanVal();
        $('#cep').val(cep_limpo);

        var cpf_limpo = $('#cpf').cleanVal();
        $('#cpf').val(cpf_limpo);

        var telefone_limpo = $('#telefone').cleanVal();
        $('#telefone').val(telefone_limpo);

        form.unbind('submit').submit();
    });
    </script>
</body>

</html>
