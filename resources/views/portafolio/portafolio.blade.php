@extends('portafolio.layout.plantilla')

@section('contenido')
<section class="section site-portfolio">
    <div class="container">
        <div class="row mb-5 align-items-center">
        <div class="col-md-12 col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
            <h2>Hola, mi nombre es {{ $persona[0]->nombre . ' ' . $persona[0]->apellido}}</h2>
        </div>
        <div class="col-md-12 col-lg-6 text-left text-lg-right" data-aos="fade-up" data-aos-delay="100">
            <div id="filters" class="filters">
                <a href="#" data-filter="*" class="active">TODOS</a>
                @foreach ($tipos_proyectos as $item)
                    <a href="#" data-filter=".{{$item->nombre}}">{{ $item->nombre }}</a>
                @endforeach
            </div>
        </div>
        </div>
        <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
            @foreach ($proyectos as $item)
                <div class="item {{ $item->tipo_proyecto }} col-sm-6 col-md-4 col-lg-4 mb-4">
                    <a target="_blank" href="{{ $item->url }}" class="item-wrap fancybox">
                        <div class="work-info">
                            <h3>{{ $item->nombre }}</h3>
                        </div>
                        <img height="500px"  width="400px" class="img-fluid" src="{{ asset('uploads/img_proyectos/'.$item->imagen.'') }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection