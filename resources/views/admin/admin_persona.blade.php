@extends('admin.layout.principal')

@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Información personal</h6>
        </div>
        @if ($errors->any())
            <div class="card-body">
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger" role="alert">{{ $item }}</div>
                @endforeach
            </div>
        @endif
        @if (Session::has('success'))
            <div class="card-body">
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ route('guardar_persona') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_persona" value="{{ $persona->id_persona }}">
                <input type="hidden" name="correo_oculto" value="{{ $persona->correo_electronico }}">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nombre">Nombre persona: </label>
                        <input type="text" value="{{ $persona->nombre }}" class="form-control border-primary @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre..." required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="apellido">Apellido persona: </label>
                        <input type="text" value="{{ $persona->apellido }}" class="form-control border-primary @error('apellido') is-invalid @enderror" id="apellido" name="apellido" placeholder="Apellido..." required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="celular">Celular: </label>
                        <input type="text" value="{{ $persona->celular }}" class="form-control border-primary @error('celular') is-invalid @enderror" id="celular" name="celular" placeholder="Celular..." required>
                        @error('celular')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="email">Correo electronico: </label>
                        <input type="text" value="{{ $persona->correo_electronico }}" class="form-control border-primary @error('email') is-invalid @enderror" id="email" name="email" placeholder="Correo electronico..." required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-end">
                        <img src="{{ asset('uploads/img_users/'.$persona->foto) }}" alt="Foto persona" width="100px " height="100px  ">     
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="imagen">Foto:</label>
                        <input type="file" class="form-control border-primary @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                        @error('imagen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror                    
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="hoja_vida">Hoja de vida: </label>
                        @if ($persona->hoja_vida == null)
                            <h4>No existe una hoja de vida.</h4>
                        @else
                            <a href="{{ asset('uploads/files/hojas_vida_users/'.$persona->hoja_vida) }}" target="_blank" class="btn btn-primary">Ver hoja vida</a>
                        @endif
                        <input type="file" class="form-control border-primary @error('hoja_vida') is-invalid @enderror" name="hoja_vida" id="hoja_vida">
                        @error('hoja_vida')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="biografia">Biografia: </label>
                        <textarea class="form-control border-primary @error('biografia') is-invalid @enderror" name="biografia" id="biografia" cols="30" rows="4">{{ $persona->biografia }}</textarea>
                        @error('biografia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Contraseña:   </label>
                        <input type="password" class="form-control border-primary @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Ingrese su contraseña">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="password_confirmation">Confirmar contraseña: </label>
                        <input type="password" class="form-control border-primary"
                            id="password_confirmation" name="password_confirmation" placeholder="Confirme su contraseña">
                    </div>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary btn-block" value="Guardar cambios">
            </form>
        </div>
    </div>
@endsection