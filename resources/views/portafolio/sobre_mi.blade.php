@extends('portafolio.layout.plantilla')

@section('contenido')
<section class="section pb-5">
    <div class="container">
        <div class="row mb-5 align-items-end">
            <div class="col-md-6" data-aos="fade-up">
            <h2>Sobre mi</h2>
            <p class="mb-0">Mi nombre es {{ $persona[0]->nombre . ' ' . $persona[0]->apellido }} y soy un apasionado por el desarrollo de software.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ml-auto order-2" data-aos="fade-up">
                <h3 class="h3 mb-4">Habilidades</h3>
                <ul class="list-unstyled">
                    @foreach ($habilidades as $item)
                        <li class="mb-3">
                            <div class="d-flex mb-1">
                                <strong>{{ $item->materia }}</strong>
                                <span class="ml-auto">{{ $item->porcentaje }}%</span>
                            </div>
                            <div class="progress custom-progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $item->porcentaje }}%" aria-valuenow="{{ $item->porcentaje }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-7 mb-5 mb-md-0" data-aos="fade-up">
                <p><img src="{{ asset('uploads/img_users/'.$persona[0]->foto) }}" alt="Foto persona" class="img-fluid"></p>
                <p>{{ $persona[0]->biografia }}</p>
                <p><a target="_blank" href="{{ asset('uploads/files/HojaDeVida.pdf') }}" download="HojaDeVidaJorgeAsdrubal" class="readmore">Descargar hoja de vida del desarrollador</a></p>
            </div>
        </div>
    </div>
</section>
@endsection