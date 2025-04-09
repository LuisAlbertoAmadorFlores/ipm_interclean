<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'IPM') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/icono.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  shadow-sm navbar_app">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/home') }}">
                    {{ config('app.name', 'INTRANET') }}
                </a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('manual') }}"><i class="fa-solid fa-book"></i>
                                        Manual de Uso</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        id="closedSesion">
                                        <i class="fa-solid fa-door-closed"></i> {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="content">
            @if (Auth::user()->status === '2')
                <div class="row d-flex justify-content-center align-items-center" style="height: 94.5vh">
                    <div class="col-lg-5 p-3 rounded"
                        style="background: rgba(0, 0, 0, 0.61);backdrop-filter:blur(14px)">
                        <div class="h2 text-light fw-bold">¡Importante!</div>
                        <p class="h5 text-light">La cuenta asociada al correo electronico <b>
                                {{ Auth::user()->email }}</b>, fue deshabilitada.</p>
                        <p class="h5 text-light">Por favor revisalo con tu jefe inmediato y soliciten el cambio al
                            departamento de TI por medio del Formato Establecido.</p>
                        <div class="d-flex justify-content-end me-3 mt-3">
                            <a class="btn btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            @endif
            @if (Auth::user()->status === '1')
                <div class="row d-flex justify-content-center align-items-center" style="height: 94.5vh">
                    <div class="col-lg-5 p-3 rounded"
                        style="background: rgba(0, 0, 0, 0.61);backdrop-filter:blur(14px)">
                        <div class="h2 text-warning fw-bold">!Importante¡</div>
                        <p class="h5 text-light">La cuenta asociada al correo electronico <b>
                                {{ Auth::user()->email }}</b>, no
                            esta
                            autorizada. Por favor solicitalo al departamento de sistemas por medio del Formato
                            establecido.</p>
                        <div class="d-flex justify-content-end me-3 mt-3">
                            <a class="btn btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            @else
                @if (Auth::user()->update_password == 0)
                    <div class="row d-flex justify-content-center align-items-center" style="height: 94.5vh">
                        <div class="col-lg-3 p-3 rounded"
                            style="background: rgba(32, 96, 164, 0.767);backdrop-filter:blur(14px)">
                            <div class="h3 text-light px-3">Cambio de Contraseña</div>
                            <p class="h5 text-light mt-3 px-3">Por seguridad debes cambiar la contraseña de tu
                                cuenta <b>{{ Auth::user()->email }}</b>.</p>
                            <div class="d-flex justify-content-center  mt-3">
                                <form action="{{ route('update-password') }}" method="POST" class="">
                                    @csrf
                                    <div>
                                        <input type="text" value="{{ Auth::user()->id }}" name="id" hidden>
                                        <div class="row mb-3 mx-auto">
                                            <label for="password"
                                                class=" col-form-label text-light">{{ __('Nueva Contraseña') }}</label>
                                            <div class="">
                                                <input id="password" type="text"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row  mb-3  mx-auto">
                                            <button class=" col-lg-5 mx-auto btn btn-success">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="d-flex">
                        <div class="home-container" id="home-container">
                            <div class="d-flex justify-content-end me-2" id="container-arrow"><i
                                    class="fa-solid fa-arrow-left bg-light text-dark rounded p-2 mt-2"
                                    id="showContainer"></i>
                            </div>
                            <div class="container-logo" id="container-logo">
                                <img src="{{ asset('img/logo.png') }}" class="imagengrande " id="logo"
                                    alt="Servicios e Insumos Prosman Logo" />
                            </div>
                            <div class="menu_items scrollbar" id="menu_items" style="height: 55vh;overflow-y:scroll">
                                <div class="accordion " id="accordionExample">
                                    @if (Auth::user()->rol == 'Reclutador' ||
                                            Auth::user()->rol == 'Coordinador' ||
                                            Auth::user()->rol == 'Sistemas' ||
                                            Auth::user()->rol == 'Gerente')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne"><i
                                                        class="fa-solid fa-user me-2"></i>
                                                    Colaboradores
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    <ul>
                                                        @if (Auth::user()->rol == 'Reclutador' ||
                                                                Auth::user()->rol == 'Coordinador' ||
                                                                Auth::user()->rol == 'Sistemas' ||
                                                                Auth::user()->rol == 'Gerente')
                                                            <li class="item"><a class="nav-link"
                                                                    href="{{ route('nuevo-registro') }}">
                                                                    <i class="fa-solid fa-user-plus"></i>
                                                                    <span>Nuevo Registro</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        <li class="item ">
                                                            <a class="nav-link " href="{{ route('files') }}">
                                                                <i class="fa-solid fa-upload"></i>
                                                                <span>Subir Documento</span>
                                                            </a>
                                                        </li>

                                                        <li class="item ">
                                                            <a class="nav-link"
                                                                href="{{ route('consultaColaborador') }}">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                                <span>Buscar Colaborador</span>
                                                            </a>
                                                        </li>

                                                        @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
                                                            <li class="item">
                                                                <a class="link" href="{{ route('deletePeople') }}">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                    <span>Baja Colaborador</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'CallCenter')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseCallCenter"
                                                    aria-expanded="true" aria-controls="collapseCallCenter"><i
                                                        class="fa-solid fa-headset me-2"></i>
                                                    Contact-Center
                                                </button>
                                            </h2>
                                            <div id="collapseCallCenter" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul>
                                                        <li class="item ">
                                                            <a class="nav-link "
                                                                href="{{ route('nuevosingresos') }}">
                                                                <i class="fa-solid fa-signature"></i>
                                                                <span>Firma de Contratos</span>
                                                            </a>
                                                        </li>
                                                        <li class="item ">
                                                            <a class="nav-link "
                                                                href="{{ route('atencionAlColaborador') }}">
                                                                <i class="fa-solid fa-handshake-angle"></i>
                                                                <span>Atencion a Colaborador</span>
                                                            </a>
                                                        </li>
                                                        <li class="item ">
                                                            <a class="nav-link " href="{{ route('training') }}">
                                                                <i class="fa-solid fa-mobile-screen-button"></i>
                                                                <span>Training APP</span>
                                                            </a>
                                                        </li>
                                                        {{-- <li class="item ">
                                                            <a class="nav-link "
                                                                href="{{ route('dashboard_reporteador') }}">
                                                                <i class="fa-solid fa-gauge"></i>
                                                                <span>Dashboard</span>
                                                            </a>
                                                        </li> --}}
                                                        <li class="item ">
                                                            <a class="nav-link " href="{{ route('material') }}">
                                                                <i class="fa-solid fa-gauge"></i>
                                                                <span>Audio-Visual</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo"><i
                                                        class="fa-solid fa-car-burst me-2"></i>
                                                    Incidencias
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    <ul>
                                                        <li class="item mt-1">
                                                            <a class="nav-link" href="{{ route('incidencias') }}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                <span>Nueva Incidencia</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Reclutador' ||
                                            Auth::user()->rol == 'Coordinador' ||
                                            Auth::user()->rol == 'Sistemas' ||
                                            Auth::user()->rol == 'Gerente')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree"><i
                                                        class="fa-solid fa-people-roof me-2"></i>
                                                    Prospectos
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="menu_item">
                                                        <li class="item mt-1">
                                                            <a class="nav-link" href="{{ route('prospecto') }}">
                                                                <i class="fa-solid fa-handshake"></i>
                                                                <span>Nuevo Prospecto</span>
                                                            </a>
                                                        </li>
                                                        <li class="item">
                                                            <a class="link-link" href="{{ route('allprospect') }}">
                                                                <i class="fa-regular fa-address-book"></i>
                                                                <span>Consultar Prospectos</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Juridico' || Auth::user()->rol == 'Sistemas')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour"><i
                                                        class="fa-solid fa-gavel me-2"></i>
                                                    Juridico
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="menu_item">
                                                        <li class="item">
                                                            <a class="nav-link"
                                                                href="{{ route('asesorias-juridico') }}">
                                                                <i class="fa-solid fa-handshake"></i>
                                                                <span>Asesorias Turnadas</span>
                                                            </a>
                                                        </li>
                                                        <li class="item">
                                                            <a class="nav-link"
                                                                href="{{ route('consultaColaborador') }}">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                                <span>Buscar Colaborador</span>
                                                            </a>
                                                        </li>
                                                        <li class="item">
                                                            <a class="link-link" href="{{ route('turnados') }}">
                                                                <i class="fa-regular fa-address-book"></i>
                                                                <span>Bajas Turnadas</span>
                                                            </a>
                                                        </li>
                                                        <li class="item mt-1">
                                                            <a class="nav-link" href="{{ route('misbajas') }}">
                                                                <i class="fa-solid fa-thumbs-down"></i>
                                                                <span>Mis Bajas</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Auditoria' || Auth::user()->rol == 'Sistemas')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseAuditoria"
                                                    aria-expanded="false" aria-controls="collapseAuditoria">
                                                    <i class="fa-solid fa-book-open-reader me-2"></i>
                                                    Auditoria
                                                </button>
                                            </h2>
                                            <div id="collapseAuditoria" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="menu_item">
                                                        <li class="item">
                                                            <a class="nav-link" href="{{ route('revision') }}">
                                                                <i class="fa-solid fa-handshake"></i>
                                                                <span>Colaboradores</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Coordinador' ||
                                            Auth::user()->rol == 'Sistemas' ||
                                            Auth::user()->rol == 'Reclutador' ||
                                            Auth::user()->rol == 'Gerente')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                    aria-expanded="false" aria-controls="collapseFive"><i
                                                        class="fa-solid fa-clipboard-list me-2"></i>
                                                    Coordinación
                                                </button>
                                            </h2>
                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    <ul class="menu_item">
                                                        @if (Auth::user()->rol == 'Coordinador' ||
                                                                Auth::user()->rol == 'Sistemas' ||
                                                                Auth::user()->rol == 'Reclutador' ||
                                                                Auth::user()->rol == 'Gerente')
                                                            <li class="item mt-1">
                                                                <a class="nav-link "
                                                                    href="{{ route('crearlista') }}">
                                                                    <i class="fa-solid fa-table-list"></i>
                                                                    <span>Lista de Personal</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
                                                            <li class="item">
                                                                <a class="nav-link "
                                                                    href="{{ route('descuentos') }}">
                                                                    <i class="fa-solid fa-hospital-user"></i>
                                                                    <span>Descuentos</span>
                                                                </a>
                                                            </li>
                                                            <li class="item">
                                                                <a class="nav-link "
                                                                    href="{{ route('pagosExtras') }}">
                                                                    <i class="fa-solid fa-sack-dollar"></i>
                                                                    <span>Pago Extras</span>
                                                                </a>
                                                            </li>
                                                            <li class="item">
                                                                <a class="nav-link" href="{{ route('prenomina') }}">
                                                                    <i class="fa-solid fa-money-bill-wave"></i>
                                                                    <span>Pre-Nomina</span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Contabilidad' || Auth::user()->rol == 'Sistemas')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseContabilidad"
                                                    aria-expanded="false" aria-controls="collapseContabilidad"><i
                                                        class="fa-solid fa-sack-dollar me-2"></i>
                                                    Contabilidad
                                                </button>
                                            </h2>
                                            <div id="collapseContabilidad" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    <ul class="menu_item ">
                                                        <li class="item mt-1">
                                                            <a class="nav-link " href="{{ route('bajasimss') }}">
                                                                <i class="fa-solid fa-person-arrow-down-to-line"></i>
                                                                <span>Bajas IMSS</span>
                                                            </a>
                                                        </li>
                                                        <li class="item">
                                                            <a class="nav-link" href="{{ route('nomina') }}">
                                                                <i class="fa-solid fa-money-bill-wave"></i>
                                                                <span>Nomina</span>
                                                            </a>
                                                        </li>
                                                        <li class="item">
                                                            <a class="nav-link" href="{{ route('getTimbrado') }}">
                                                                <i class="fa-solid fa-bell"></i>
                                                                <span>Entregables</span>
                                                            </a>
                                                        </li>
                                                        <li class="item">
                                                            <a class="nav-link" href="{{ route('nomina') }}">
                                                                <i class="fa-solid fa-ticket"></i>
                                                                <span>Comprobantes Pago</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- @if (Auth::user()->rol == 'Contabilidad' || Auth::user()->rol == 'Sistemas') --}}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseHistorico"
                                                aria-expanded="false" aria-controls="collapseHistorico">
                                                <i class="fa-solid fa-box-archive me-2"></i>
                                                Historico
                                            </button>
                                        </h2>
                                        <div id="collapseHistorico" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul class="menu_item ">
                                                    <li class="item mt-1">
                                                        <a class="nav-link " href="{{ route('historialbajas') }}">
                                                            <i class="fa-solid fa-people-line"></i>
                                                            <span>Colaboradores</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}
                                    @if (Auth::user()->rol == 'Contabilidad' || Auth::user()->rol == 'Sistemas')
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseCompras"
                                                    aria-expanded="false" aria-controls="collapseHistorico">
                                                    <i class="fa-brands fa-shopify me-2"></i>
                                                    Compras
                                                </button>
                                            </h2>
                                            <div id="collapseCompras" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <ul class="menu_item ">
                                                        <li class="item mt-1">
                                                            <a class="nav-link " href="{{ route('viewallOrder') }}">
                                                                <i class="fa-solid fa-ticket"></i>
                                                                <span>Solicitudes de Compra</span>
                                                            </a>
                                                        </li>
                                                        <li class="item mt-1">
                                                            <a class="nav-link " href="{{ route('allOrder') }}">
                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                                <span>Ordenes de Compra</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
                                        <div class="accordion-item border-0">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed " type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseCedis"
                                                    aria-expanded="false" aria-controls="collapseCedis"><i
                                                        class="fa-solid fa-building me-2"></i>
                                                    CEDIS
                                                </button>
                                            </h2>
                                            <div id="collapseCedis" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">

                                                    <ul class="menu_item">
                                                        <li class="item mt-1">
                                                            <a class="nav-link " href="{{ route('cedis') }}">
                                                                <i class="fa-solid fa-list"></i>
                                                                <span>Administracion CEDIS</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="menu_items_bar scrollbar" id="menu_items_bar"
                                style="height: 55vh;overflow-y:scroll">
                                @if (Auth::user()->rol == 'Reclutador' ||
                                        Auth::user()->rol == 'Coordinador' ||
                                        Auth::user()->rol == 'Sistemas' ||
                                        Auth::user()->rol == 'Gerente')
                                    <button class="btn openmenu"><i class="fa-solid fa-user-plus"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'CallCenter')
                                    <button class="btn openmenu"><i class="fa-solid fa-headset"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
                                    <button class="btn openmenu"><i class="fa-solid fa-car-burst"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Reclutador' ||
                                        Auth::user()->rol == 'Coordinador' ||
                                        Auth::user()->rol == 'Sistemas' ||
                                        Auth::user()->rol == 'Gerente')
                                    <button class="btn openmenu"><i class="fa-solid fa-people-roof"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Juridico' || Auth::user()->rol == 'Sistemas')
                                    <button class="btn openmenu"><i class="fa-solid fa-gavel"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Auditoria' || Auth::user()->rol == 'Sistemas')
                                    <button class="btn openmenu"><i class="fa-solid fa-book-open-reader"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Coordinador' ||
                                        Auth::user()->rol == 'Sistemas' ||
                                        Auth::user()->rol == 'Reclutador' ||
                                        Auth::user()->rol == 'Gerente')
                                    <button class="btn openmenu"><i class="fa-solid fa-clipboard-list"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Contabilidad' || Auth::user()->rol == 'Sistemas')
                                    <button class="btn openmenu"><i class="fa-solid fa-sack-dollar"></i></button>
                                @endif
                                @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
                                    <button class="btn openmenu"> <i class="fa-brands fa-shopify"></i></button>
                                @endif
                                <button class="btn openmenu"><i class="fa-solid fa-box-archive"></i></button>
                                @if (Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
                                    <button class="btn openmenu">
                                        <i class="fa-solid fa-building "></i></button>
                                @endif
                            </div>
                            <div class="text-center position-absolute bottom-0 start-50 translate-middle-x"
                                style="color: gray">
                                <a href="https://nxg.com.mx/" target="_blank"><img
                                        src="{{ asset('img/Powered_By_NXG.svg') }}" class="powerby"
                                        alt="Logo NextGen" width="40px" height="40px"></a>

                                <p style="color:rgba(255, 255, 255, 0.769)">v1.0.0</p>
                            </div>
                        </div>
                        <div id="dashboard">
                            @yield('content')
                        </div>
                    </div>
                @endif
            @endif
        </main>
        @if (Auth::user()->rol == 'Coordinador' || Auth::user()->rol == 'Sistemas' || Auth::user()->rol == 'Gerente')
            <div class="position-absolute top-50 start-50 translate-middle avisosGenerales modalAvisos">
                @livewire('components.avisos', ['rol' => Auth::user()->rol])
            </div>
        @endif
    </div>
    @livewireScripts
    <script src="{{ asset('js/funcionality.js') }}"></script>
    <script src="{{ asset('js/avisos.js') }}"></script>
    <script src="{{ asset('js/alerts.modal.js') }}"></script>
    <script src="{{ asset('js/register.files.js') }}"></script>
    <script src="{{ asset('js/validation.register.js') }}"></script>
</body>

</html>
