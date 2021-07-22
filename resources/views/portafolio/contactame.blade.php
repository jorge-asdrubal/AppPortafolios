@extends('portafolio.layout.plantilla')

@section('contenido')
<section class="section pb-5">
    <div class="container">

      <div class="row mb-5 align-items-end">
        <div class="col-md-6" data-aos="fade-up">
          <h2>Contactame</h2>
          <p class="mb-0">
              No dudes en ponerte en contacto conmigo, 
              atendere cualquier necesadidad y/o inquietud.
          </p>
        </div>

      </div>

      <div class="row">
        <!-- <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">

            <div class="row">
              <div class="col-md-6 form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <label for="name">Correo electronicos</label>
                <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="col-md-12 form-group">
                <label for="name">Sujeto</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="col-md-12 form-group">
                <label for="name">Mensaje</label>
                <textarea class="form-control" name="message" cols="30" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>

              <div class="col-md-12 mb-3">
                <div class="loading">Cargando</div>
                <div class="error-message"></div>
                <div class="sent-message">Su mensaje fue enviado, estaremos en contacto contigo</div>
              </div>

              <div class="col-md-6 form-group">
                <input type="submit" class="readmore d-block w-100" value="Send Message">
              </div>
            </div>

          </form>

        </div> -->

        <div class="col-md-12 ml-auto order-2" data-aos="fade-up">
          <ul class="list-unstyled">
            <li class="mb-3">
              <strong class="d-block mb-1">Numero de telefono</strong>
              <span>{{ $persona[0]->celular }}</span>
            </li>
            <li class="mb-3">
              <strong class="d-block mb-1">Correo electronico</strong>
              <span>{{ $persona[0]->correo_electronico }}</span>
            </li>
          </ul>          
        </div>

      </div>

    </div>

  </section>
@endsection