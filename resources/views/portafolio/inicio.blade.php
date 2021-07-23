<!DOCTYPE HTML>
<html>
	<head>
		<title>Inicio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('assets/landing/assets/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('assets/landing/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<h1>Portafolios</h1>
						<p>Un aplicativo pensado para que armes tu portafolio</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="#" class="logo">Portafolios</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
                            <li class="active"><a href="{{ route('principal') }}">Inicio</a></li>
							<li><a href="{{ route('login') }}">Login</a></li>
						</ul>
						<ul class="icons">
							<li><a target="_blank" href="https://www.youtube.com/channel/UC6b69TqRqQsc6w9Zn4hoXiA" class="icon brands fa-youtube"><span class="label">Youtube</span></a></li>
							<li><a target="_blank" href="https://github.com/jorge-asdrubal" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
                        <article class="post featured">
                            <header class="major">
                                <h2><a href="#">PORTAFOLIOS</a></h2>
                            </header>
                            <ul class="actions special">
                                <li><a href="https://www.linkedin.com/in/jorge-asdrubal-ortega-gonzalez-b1207b212/" class="button large">Desarrollador del aplicativo</a></li>
                            </ul>
                        </article>

                        <section class="posts">
                            @if (count($portafolios) < 1)
                                <article>
                                    <header>
                                        <h2>No existen portafolios</h2>
                                    </header>
                                </article>
                                <article>
                                    <header>
                                        <h2>No existen portafolios</h2>
                                    </header>
                                </article>
                            @else
                                @foreach ($portafolios as $item)
                                    <article>
                                        <header>
                                            <span class="date">Publicado: {{ $item->created_at }}</span>
                                            <h2><a href="{{ route('portafolio', ['id' => $item->id_portafolio]) }}">{{ $item->nombre }}</a></h2>
                                        </header>
                                        <a href="{{ route('portafolio', ['id' => $item->id_portafolio]) }}" class="image fit"><img src="{{ asset('uploads/img_portafolios/'.$item->foto) }}" alt="Foto portafolio" /></a>
                                        <ul class="actions special">
                                            <li><a href="{{ route('portafolio', ['id' => $item->id_portafolio]) }}" class="button">Ver portafolio</a></li>
                                        </ul>
                                    </article>
                                @endforeach
                            @endif
                        </section>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<section class="split contact">
							<section>
								<h3>Telefono</h3>
								<p>(+57) 3116519569</p>
							</section>
							<section>
								<h3>Correo electronico</h3>
								<p>jaog.11.2003@gmail.com</p>
							</section>
							<section>
								<h3>Social</h3>
								<ul class="icons alt">
									<li><a target="_blank" href="https://www.youtube.com/channel/UC6b69TqRqQsc6w9Zn4hoXiA" class="icon brands fa-youtube"><span class="label">Youtube</span></a></li>
							        <li><a target="_blank" href="https://github.com/jorge-asdrubal" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
							        <li><a target="_blank" href="https://www.linkedin.com/in/jorge-asdrubal-ortega-gonzalez-b1207b212/" class="icon brands fa-linkedin"><span class="label">Linkedin</span></a></li>
								</ul>
							</section>
						</section>
					</footer>

				<!-- Copyright -->
					<div id="copyright">
						<ul><li>&copy; Jorge Asdrubal Ortega Gonzalez @php echo date('Y') @endphp</li><li><a href="https://html5up.net">HTML5 UP</a></li></ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="{{ asset('assets/landing/assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('assets/landing/assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('assets/landing/assets/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('assets/landing/assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('assets/landing/assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('assets/landing/assets/js/util.js') }}"></script>
			<script src="{{ asset('assets/landing/assets/js/main.js') }}"></script>

	</body>
</html>