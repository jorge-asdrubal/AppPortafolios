<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jorge Asdrubal Ortega Gonzalez">
    <meta name="author" content="Jorge Asdrubal Ortega Gonzalez">

    <title>Registro</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/fonts_googleapis.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea una cuenta!</h1>
                            </div>
                            <form enctype="multipart/form-data" action="{{ route('guardar_usuarios') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" required class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                                            placeholder="Ingresa tu nombre">
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" required class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido"
                                            placeholder="Ingrese sus apellidos">
                                        @error('apellido')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imagen">Imagen de perfil: (opcional)</label>
                                    <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                                    @error('imagen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" required class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                            placeholder="Ingresa tu correo">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" required class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular"
                                            placeholder="Ingrese su numero de celular">
                                        @error('celular')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="biografia">Biografia: </label>
                                    <textarea class="form-control @error('biografia') is-invalid @enderror" name="biografia" id="biografia" cols="30" rows="10"></textarea>
                                    @error('biografia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Ingrese su contraseña">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control"
                                            id="password_confirmation" name="password_confirmation" placeholder="Confirme su contraseña">
                                    </div>
                                </div>
                                <input type="submit" value="Registrar cuenta!" name="registrar_usuario" class="btn btn-primary btn-user btn-block">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">¿Ya tienes una cuenta? Ingresa!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>