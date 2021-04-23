<?php
defined('_EXEC') or die;

$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);

// Map
$this->dependencies->add(['other', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=map"></script>']);

$this->dependencies->add(['js', '{$path.js}pages/developments_view_serena.js?v=1.0.2']);
?>

<div id="page">
    %{main-header}%

    <main id="main-content">
        <header class="page-title" style="height: 80vh;">
            <figure class="cover">
                <img class="img-cover" src="{$path.uploads}Serena.jpg" alt="">
            </figure>
            <div class="container-fluid">
                <div class="content text-center">
                    <figure class="figure-img">
                        <img src="{$path.uploads}serena.png" alt="" class="img-fluid m-l-auto m-r-auto" style="width: 350px;">
                    </figure>
                </div>
            </div>
        </header>

        <section class="p-t-50 p-b-50">
            <div class="container-fluid p-t-50 p-b-50 text-center">
                <h1 class="text-uppercase font-20" style="color: #979797;">Proyecto 3 casas preventa <br> <strong class="d-block font-40" style="font-weight: 900;">desde $3,300,000</strong></h1>
                <a href="javascript:void(0);" class="btn btn-lg btn-success m-t-30" style="background-color: #00695c; padding: 20px 40px; font-size: 2em;">Descargar Brochure</a>
            </div>
        </section>

        <section class="p-t-50 p-b-50" style="background-color: #eaeaea;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <figure class="m-0" style="height: 100%;">
                            <img class="img-cover" src="{$path.uploads}02. FACHADA TRASERA.jpg" alt="">
                        </figure>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column align-items-start justify-content-center">
                        <h4 class="section-title">Características</h4>
                        <ul class="m-0">
                            <li><p class="text-muted" style="font-size: 1.2em;">3 Cuartos con Baño</p></li>
                            <li><p class="text-muted" style="font-size: 1.2em;">Terraza Techada</p></li>
                            <li><p class="text-muted" style="font-size: 1.2em;">Cocina con isla</p></li>
                            <li><p class="text-muted" style="font-size: 1.2em;">Piscina de 3 x 5 mts</p></li>
                            <li><p class="text-muted" style="font-size: 1.2em;">Área de Lavado con tendedero</p></li>
                            <li><p class="text-muted" style="font-size: 1.2em;">Cuarto de Servicio con Baño</p></li>
                            <li><p class="text-muted" style="font-size: 1.2em;">Garage para 2 coches</p></li>
                            <li><p class="text-muted m-0" style="font-size: 1.2em;">Jardín interior</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-t-50 p-b-50">
            <div class="container-fluid" style="position: relative;">
                <div class="slideshow-projects owl-carousel owl-theme">
                    <div class="item">
                        <figure>
                            <img src="{$path.uploads}Serena.jpg" alt="" class="img-cover">
                        </figure>
                    </div>
                    <div class="item">
                        <figure>
                            <img src="{$path.uploads}02. FACHADA TRASERA.jpg" alt="" class="img-cover">
                        </figure>
                    </div>
                    <div class="item">
                        <figure>
                            <img src="{$path.uploads}06-RECAMARA PPAL.jpg" alt="" class="img-cover">
                        </figure>
                    </div>
                    <div class="item">
                        <figure>
                            <img src="{$path.uploads}05-SALA-COMEDOR 2.jpg" alt="" class="img-cover">
                        </figure>
                    </div>
                    <div class="item">
                        <figure>
                            <img src="{$path.uploads}04-SALA COMEDOR.jpg" alt="" class="img-cover">
                        </figure>
                    </div>
                    <div class="item">
                        <figure>
                            <img src="{$path.uploads}3.COCINA.jpg" alt="" class="img-cover">
                        </figure>
                    </div>
                </div>
                <div id="slideshow-projects-buttons" class="owl-controls">
                    <button class="prev"><i class="fa fa-angle-left"></i></button>
                    <button class="next"><i class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </section>

        <section class="maps">
            <div class="gmap">
                <div id="map"></div>
            </div>
            <div class="image-map">
                <figure class="m-0">
                    <img src="{$path.images}image-map.png" alt="" class="img-cover">
                </figure>
            </div>
        </section>

        <section class="call-to-action bg-gray" style="background: #00695c;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                        <h1>Vive en la casa de tus sueños.</h1>
                    </div>
                    <div class="col-md-4 text-right d-flex flex-column align-items-center justify-content-center">
                        <i class="arrow ti-arrow-right"></i>
                    </div>
                </div>
                <a href="/inversion" class="more">Saber más</a>
            </div>
        </section>
    </main>
</div>
