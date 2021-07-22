<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mi portafolio - inicio</title>
  <meta content="Portafolio Jorge Asdrubal Ortega Gonzalez" name="description">
  <meta content="Jorge Asdrubal PortafolioJorge Portafolios SENA Aprendiz" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/portafoio/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/portafoio/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{ asset('assets/fonts_googleapis.css') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/portafolio/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/portafolio/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/portafolio/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/portafolio/assets/vendor/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/portafolio/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/portafolio/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  @include('portafolio.layout.plantilla.header')  

  <main id="main">

    <!-- ======= Works Section ======= -->
    @yield('contenido')
  </main><!-- End #main -->
  
  @include('portafolio.layout.plantilla.footer')


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/portafolio/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/portafolio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/portafolio/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/portafolio/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/portafolio/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/portafolio/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/portafolio/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/portafolio/assets/js/main.js') }}"></script>

</body>

</html>