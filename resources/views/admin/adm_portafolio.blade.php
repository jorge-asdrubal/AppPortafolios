@extends('admin.layout.principal')

@section('contenido')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-center">
            <h6 class="m-0 font-weight-bold text-primary">Mi portafolio</h6>
        </div>
        @if ($errors->any())
            <div class="card-body">
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger" role="alert">       
                        {{ $item }}      
                    </div>
                @endforeach
            </div>
        @endif
        @if (Session::has('success'))
            <div class="card-body">
                <div class="alert alert-success">    
                    {{ Session::get('success') }} 
                </div>
            </div>
        @endif
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('guardar_portafolio') }}">
                @csrf
                @if (count($portafolio) != 0)
                    <input type="hidden" name="id_portafolio" value="{{ $portafolio[0]->id_portafolio }}">
                @endif
                <div class="form-group">
                    <label for="nombre">Nombre portafolio: </label>
                    @if (count($portafolio) != 0)
                        <input type="text" value="{{ $portafolio[0]->nombre }}" class="form-control border-primary @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre portafolio">
                    @else
                        <input type="text" class="form-control border-primary @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre portafolio">
                    @endif
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Imagen del portafolio: </label>
                    @if (count($portafolio) != 0)
                        <img width="90" height="90" src="{{ asset('uploads/img_portafolios/'.$portafolio[0]->foto) }}" alt="Imagen portafolio">
                    @endif
                    <input type="file" class="form-control border-primary @error('foto') is-invalid @enderror" id="foto" name="foto">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                @if (count($portafolio) != 0)
                    <input type="submit" name="editar_portafolio" class="btn btn-primary btn-block" value="Guardar">
                @else
                    <input type="submit" name="registrar_portafolio" class="btn btn-primary btn-block" value="Guardar">
                @endif
            </form>
        </div>
    </div>
@endsection