@extends('admin.layout.principal')

@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Crear habilidad</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guardar_habilidad') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre de la materia: </label>
                    <input type="text" class="form-control border-primary @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="nombre tipo de proyecto">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="porcentaje">Porcentaje de dominio (0 a 100): </label>
                    <input type="text" class="form-control border-primary @error('porcentaje') is-invalid @enderror" id="porcentaje" name="porcentaje" placeholder="porcentaje tipo de proyecto">
                    @error('porcentaje')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <input type="submit" name="registrar_habilidad" class="btn btn-primary btn-block" value="Registrar tipo de proyecto">
            </form>
        </div>
    </div>
@endsection