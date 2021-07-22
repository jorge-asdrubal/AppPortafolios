<div class="collapse navbar-collapse custom-navmenu" id="main-navbar">
  <div class="container py-2 py-md-5">
    <div class="row align-items-start">
      <div class="col-md-3">
        <ul class="custom-menu">
          <li><a href="{{ route('portafolio', ['id' => $portafolio->id_portafolio]) }}">Inicio</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="custom-menu">
          <li><a href="{{ route('sobre_mi', ['id' => $portafolio->id_portafolio]) }}">Sobre mí</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="custom-menu">
          <li><a href="{{ route('contactame', ['id' => $portafolio->id_portafolio]) }}">Contactame</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="custom-menu">
          <li><a href="{{ route('login') }}">Ir al administrador</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-light custom-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('portafolio', ['id' => $portafolio->id_portafolio]) }}">Mi portafolio.</a>

    <a href="#" class="burger" data-toggle="collapse" data-target="#main-navbar">
      <span></span>
    </a>

  </div>
</nav>