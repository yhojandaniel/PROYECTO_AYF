@extends('layouts.app')

@section('content')

<div class="container my-2">

    <!-- Plantilla para generar posts con la base de datos -->

    <h1 class="my-5">Nuestros trabajos...</h1>

    <div class="card mb-3 d-flex align-items-center text-light shadow" style="background-color: #0c0f15; padding: 20px;">
        <div id="carouselExample" class="carousel slide" style="background-color: #212529; max-width: 500px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/velador.jpg" class="card-img-top object-fit-contain border" alt="..." style="width: 500px; height: 300px;">
                </div>
                <div class="carousel-item">
                    <img src="/images/velador.jpg" class="card-img-top object-fit-contain border" alt="..." style="width: 500px; height: 300px;">
                </div>
                <div class="carousel-item">
                    <img src="/images/velador.jpg" class="card-img-top object-fit-contain border" alt="..." style="width: 500px; height: 300px;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>    

        <div class="card-body shadow-lg" style="background-color: #212529; width: 500px;">
            <h5 class="card-title text-center rounded" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Veladores de madera Tornillo</h5>
            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <div class="card card-body" style="width: 468px; background-color: #212529; color: #f8f8fb;">
                    <p class="card-text">Con unas medidas de 50x45cm, cuentan con un muy buen acabado. Encu&eacute;ntranos en nuestros 2 locales: Jr. Hermilio Valdizan 1050 y Jr: Juan Velasco Alvarado 326</p>
                    <p class="card-text"><small>Publicado: 20/05/2022</small></p>
                    @auth
                    <form action="/buy" method="get">
                        <button class="btn btn-primary" type="submit">Comprar</button>
                    </form>
                    @endauth
                    @guest
                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover focus" data-bs-content="Necesitas acceder a tu cuenta o registrarse para comprar.">
                        <button class="btn btn-primary" type="button" disabled>Comprar</button>
                    </span>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <div class="m-5" ></div>

    <!-- Siguiente elemento -->

    <div class="m-5" ></div>

    <!-- etc -->

</div>

@endsection
