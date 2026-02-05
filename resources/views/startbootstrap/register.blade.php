@extends('startbootstrap.model')
@section('title', 'Criação de conta')
@section('subtitle', 'Aqui você cria sua conta')
@section('body')
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="card-body"> <!-- item add -->
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Por favor, corrija os erros abaixo:</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Criar Conta</h3></div>
                                    <div class="card-body">
                                        <form action="/register" method="POST"> <!-- Formulario -->
                                            @csrf <!-- token segurança, contras robos -->
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="usermail" type="email" name="usermail"  placeholder="name@example.com" required/>
                                                <label for="usermail">Endereço de Email</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="userpasse" type="password" name="userpasse" placeholder="Escolha uma senha" required/>
                                                        <label for="userpasse">Passe</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="userpasseconfirma" name="userpasseconfirma" type="password" placeholder="repita sua senha" required />
                                                        <label for="userpasseconfirma">Confirme o Passe</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input type="submit" class="btn btn-success btn-block" value="Criar" onclick="validatePassword()"></typesubmit></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script>
            function validatePassword() {
                // Pegamos os valores dos campos pelos IDs que estão no seu HTML
                var password = document.getElementById("userpasse").value;
                var confirmPassword = document.getElementById("userpasseconfirma").value;
                var email = document.getElementById("usermail").value;

                // Validação básica de preenchimento (HTML 'required' já ajuda, mas JS garante)
                if (email === "" || password === "" || confirmPassword === "") {
                    alert("Por favor, preencha todos os campos.");
                    event.preventDefault(); // Impede o envio
                    return false;
                }

                // Comparação das senhas
                if (password !== confirmPassword) {
                    alert("As senhas não coincidem!");
                    event.preventDefault(); // Impede o envio do formulário
                    return false;
                }

                // Se chegar aqui, as senhas são iguais e o formulário será enviado
                return true;
            }
        </script>
        
@endsection