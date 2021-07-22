@extends('admin.layout.principal')

@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Editar tipo de proyecto</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('guardar_tipo_proyecto') }}">
                @csrf
                <input type="hidden" name="id_tipo_proyecto" value="{{ $tipo_proyecto->id_tipo_proyecto }}">
                <div class="form-group">
                    <label for="nombre">Nombre tipo de proyecto: </label>
                    <input type="text" value="{{ $tipo_proyecto->nombre }}" class="form-control border-primary @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre tipo de proyecto">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <input type="submit" name="editar_tipo_proyecto" class="btn btn-primary btn-block" value="Editar tipo de proyecto">
            </form>
        </div>
    </div>
@endsection