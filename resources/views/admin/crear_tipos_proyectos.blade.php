@extends('admin.layout.principal')

@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Crear tipo de proyecto</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guardar_tipo_proyecto') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre tipo de proyecto: </label>
                    <input type="text" class="form-control border-primary @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre tipo de proyecto">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <input type="submit" name="registrar_tipo_proyecto" class="btn btn-primary btn-block" value="Registrar tipo de proyecto">
            </form>
        </div>
    </div>
@endsection