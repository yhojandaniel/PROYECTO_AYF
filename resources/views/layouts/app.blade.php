<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A&F Maderera S.A.C.</title>
    <link rel="shortcut icon" href="/images/logo.png" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body style="background-color: #212529; color: #f8f8fb;">
    <nav class="navbar navbar-expand-lg shadow-lg fixed-top" style="background-color: #0c0f15;">
        <div class="container-fluid">
            <a class="navbar-brand my-2 ms-4" href="#">
                <img class="rounded" src="/images/logo.png" style="width: 80px; height: 40px; opacity: 90%" alt="A&F">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">¿Quienes somos?</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Servicios
                        </a>
                    <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #0c0f15;">
                        <li><a class="dropdown-item text-light" href="#">R.R. H.H.</a></li>
                        <li><a class="dropdown-item text-light" href="#">Cadena de Suministros</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-light" href="#">Compra y Venta</a></li>
                    </ul>
                    </li>
                </ul>

            @auth
                <form action="/logout" method="POST">
                @csrf
                    <button class="btn btn-danger me-md-2" type="submit">Logout</button>
                    <button type="button" class="btn btn-success position-relative my-2 me-4" 
                    data-bs-toggle="popover" 
                    data-bs-placement="left"
                    data-bs-custom-class="custom-popover" 
                    data-bs-title="Tus datos" 
                    data-bs-html="true" 
                    data-bs-content="
                    <ul>
                        <p><h6>Usuario: </h6> {{Auth::user()->name}} {{Auth::user()->lastname}}</p> <br>
                        <p><h6>ID: </h6> {{Auth::user()->id}}</p> <br>
                        @if (Auth::user()->rol == 'trabajador')
                        <form action='home' method='get'>
                            <h6>STATUS: </h6><button class='btn btn-primary' type='submit'>{{ucfirst(Auth::user()->rol)}}</button>
                        </form>
                        @else
                        <form action='' method='get'>
                            <h6>STATUS: </h6><button class='btn btn-primary' type='submit'>{{ucfirst(Auth::user()->rol)}}</button>
                        </form>
                        @endif
                    </ul>
                    ">
                        <span>Hola, {{ $name }}!</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                            {{Auth::user()->id}}
                        </span>
                        
            @endauth
                        
            @guest
                <form action="/register">
                @csrf
                    <button type="submit" class="btn btn-primary position-relative my-2 me-4">
                        <span>Registrate o Inicia Sesi&oacute;n!</span>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                            99+
                        </span>
            @endguest
                    </button>

                </form>

                
            </div>
        </div>
    </nav>

    <div style="margin-top: 120px"></div>

    
    <main>
        <div class="m-5" ></div>
        @yield('content') <!-- Contenido de cada página -->
        <div class="m-5" ></div>
    </main>

    <footer class="shadow-lg py-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-4">
                    <img src="/images/logo.png" alt="Logo de la Empresa" class="footer-logo" style="width: 300px; height: 200px;">
                    <p>A&F Maderera 2024 &copy;. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Rápidos</h5>
                    <ul class="footer-links">
                        <li><a style="color: inherit; text-decoration: none;" href="#">Inicio</a></li>
                        <li><a style="color: inherit; text-decoration: none;" href="#">¿Quienes somos?</a></li>
                        <li><a style="color: inherit; text-decoration: none;" href="#">R.R. H.H.</a></li>
                        <li><a style="color: inherit; text-decoration: none;" href="#">Cadena de Suministros</a></li>
                        <li><a style="color: inherit; text-decoration: none;" href="#">Compra y Venta</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p class="user-select-all">Dirección 1: Jr. Hermilio Valdizan 1050, Cayhuayna</p>
                    <p class="user-select-all">Dirección 2: Jr: Juan Velasco Alvarado 326, Cayhuayna</p>
                    <p class="user-select-all">Teléfono: 062 616161</p>
                    <p class="user-select-all">Email: contacto.ayf@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>

    <style>
        .custom-popover {
            background-color: #202429;
            --bs-popover-body-color: #fffefe;
            --bs-popover-border-color: #702df9;
            --bs-popover-header-bg: #702df9;
            --bs-popover-header-color: #fffefe;
            --bs-popover-body-padding-x: 1rem;
            --bs-popover-body-padding-y: .5rem;
        }
    </style>

    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        popoverTriggerList.forEach(popoverTriggerEl => {
            const popover = new bootstrap.Popover(popoverTriggerEl, {
                title: popoverTriggerEl.getAttribute('data-bs-title') || '',
                content: popoverTriggerEl.getAttribute('data-bs-content') || '',
                html: popoverTriggerEl.getAttribute('data-bs-html') === 'true',
                customClass: popoverTriggerEl.getAttribute('data-bs-custom-class') || '',
                sanitize: false
            });
        });
    </script>

</body>
</html>
