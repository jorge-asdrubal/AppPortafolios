<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Jorge Asdrubal Ortega Gonzalez">
    <meta name="author" content="Jorge Asdrubal Ortega Gonzalez">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/fonts_googleapis.css') }}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="top: 13%;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-7">
                                <div class="p-5">
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->all() as $item)
                                                {{ $item }}
                                            @endforeach
                                        </div>
                                    @endif
                                    @if (Session::get('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('iniciar_sesion') }}" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Ingrese su correo electronico...">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" name="password" placeholder="Ingrese su contraseña">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('registrar_usuario') }}">Registrate en el sistema!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('principal') }}">Ir al inicio!</a>
                                    </div>
                                </div>
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