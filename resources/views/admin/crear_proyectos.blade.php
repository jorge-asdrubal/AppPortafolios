@extends('admin.layout.principal')

@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Crear proyecto</h6>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('guardar_proyecto') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nombre">Nombre proyecto: </label>
                        <input type="text" class="form-control border-primary @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre proyecto">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="url">Url del proyecto: </label>
                        <input type="text" class="form-control border-primary @error('url') is-invalid @enderror" placeholder="Url del proyecto" id="url" name="url">
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_tipo_proyecto">Tipo de proyecto: </label>
                    <select name="id_tipo_proyecto" id="id_tipo_proyecto" class="form-control border-primary @error('id_tipo_proyecto') is-invalid @enderror">
                        <option value="">Seleccione un tipo de proyecto</option>
                        @foreach ($tipos_proyectos as $item)
                            <option value="{{ $item->id_tipo_proyecto }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('id_tipo_proyecto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del proyecto: </label>
                    <input type="file" class="form-control border-primary @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                    @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control border-primary @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <input type="submit" name="registrar_proyecto" class="btn btn-primary btn-block" value="Registrar proyecto">
            </form>
        </div>
    </div>
@endsection