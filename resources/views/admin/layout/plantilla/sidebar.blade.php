<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Portafolio<sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modulos
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('listar_proyectos') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Proyectos</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('listar_tipos_proyectos') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tipos proyectos</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('administrar_portafolio') }}">
            <i class="fas fa-fw fa-portrait"></i>
            <span>Portafolio</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('listar_habilidades') }}">
            <i class="fas fa-fw fa-balance-scale"></i>
            <span>Habilidades</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('administrar_persona') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Información personal</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>