<?php
defined('_EXEC') or die;

$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);

$this->dependencies->add(['js', '{$path.js}pages/building.js?v=1.0.4']);
?>

<div id="page">
    %{main-header}%

    <main id="main-content">
        <header class="page-title" style="height: 100vh;">
            <figure class="cover">
                <img class="img-cover" src="{$path.images}asset-7.jpg" alt="">
            </figure>
            <div class="container-fluid">
                <div class="content text-center">
                    <h1 class="r3">Construcción</h1>
                </div>
            </div>
        </header>

        <section class="p-t-50 p-b-50">
            <div class="container-fluid p-t-50 p-b-50 text-center">
                <h1 class="section-title">¿Quieres construir con nosotros?</h1>
                <p class="text-muted" style="max-width: 1000px; margin: auto; font-size: 1.2em;">Te brindamos la mejor atención, completamente personalizada, y adaptamos nuestra metodología compuesta por etapas, a las necesidades específicas de tu proyecto.</p>
            </div>
        </section>

        <section class="row">
            <div class="col-12 col-lg-6 box-background-image" style="background-image: url('{$path.images}asset-8.jpg');">
                <div class="content r4">
                    <i class="icon-icon-10"></i>
                    <h2 class="text-center">Etapa 1</h2>
                    <ul class="m-0">
                        <li><p class="m-0" style="font-size: 1.0em;">Revisión del proyecto ejecutivo junto con las ingenierías.</p></li>
                        <li><p class="m-0" style="font-size: 1.0em;">Planeación y análisis de los proyectos, estudiando su alcance.</p></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-6 box-background-image" style="background-image: url('{$path.images}asset-9.jpg');">
                <div class="content r4">
                    <i class="icon-icon-11"></i>
                    <h2 class="text-center">Etapa 2</h2>
                    <ul class="m-0">
                        <li><p class="m-0" style="font-size: 1.0em;">Después de toda la planeación del proyecto, se realiza la generadora de volúmenes del proyecto.</p></li>
                        <li><p class="m-0" style="font-size: 1.0em;">Se divide el presupuesto por partidas de las diferentes etapas de la obra.</p></li>
                        <li><p class="m-0" style="font-size: 1.0em;">Implementación de un programa de obra con fechas y duración desde el inicio hasta el final del proyecto.</p></li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="portafolio" class="p-t-50 p-b-50">
            <div class="container-fluid" style="position: relative;">
                <h1 class="section-title">Galería de entregas</h1>

                <div class="slideshow-projects gallery_deliveries owl-carousel owl-theme">
                    <?php foreach ($slideshows_portfolio as $key => $value): ?>
                        <?php if ( !empty($value['gallery_deliveries']) ): ?>
                            <?php for ($i=0; $i < count($value['gallery_deliveries']); $i++): ?>
                                <div class="item projects">
                                    <div class="project" style="height: 100%;">
                                        <figure>
                                            <img src="{$path.uploads}<?= $value['gallery_deliveries'][$i] ?>" alt="" class="img-cover">
                                        </figure>
                                        <div class="content justify-content-end">
                                            <p class="h5"><strong class="d-block"><?= $value['name'] ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div slideshow-projects-buttons class="owl-controls gallery_deliveries">
                    <button class="prev"><i class="fa fa-angle-left"></i></button>
                    <button class="next"><i class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </section>

        <section id="portafolio" class="p-t-50 p-b-50">
            <div class="container-fluid" style="position: relative;">
                <h1 class="section-title">Galería de construcciones listas</h1>

                <div class="slideshow-projects gallery_ready_constructions owl-carousel owl-theme">
                    <?php foreach ($slideshows_portfolio as $key => $value): ?>
                        <?php if ( !empty($value['gallery_ready_constructions']) ): ?>
                            <?php for ($i=0; $i < count($value['gallery_ready_constructions']); $i++): ?>
                                <div class="item projects">
                                    <div class="project" style="height: 100%;">
                                        <figure>
                                            <img src="{$path.uploads}<?= $value['gallery_ready_constructions'][$i] ?>" alt="" class="img-cover">
                                        </figure>
                                        <div class="content justify-content-end">
                                            <p class="h5"><strong class="d-block"><?= $value['name'] ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div slideshow-projects-buttons class="owl-controls gallery_ready_constructions">
                    <button class="prev"><i class="fa fa-angle-left"></i></button>
                    <button class="next"><i class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </section>

        <section id="portafolio" class="p-t-50 p-b-50">
            <div class="container-fluid" style="position: relative;">
                <h1 class="section-title">Portafolio</h1>

                <div class="slideshow-projects gallery_portfolio owl-carousel owl-theme">
                    <?php foreach ($slideshows_portfolio as $key => $value): ?>
                        <?php if ( !empty($value['gallery_portfolio']) ): ?>
                            <?php for ($i=0; $i < count($value['gallery_portfolio']); $i++): ?>
                                <div class="item projects">
                                    <div class="project" style="height: 100%;">
                                        <figure>
                                            <img src="{$path.uploads}<?= $value['gallery_portfolio'][$i] ?>" alt="" class="img-cover">
                                        </figure>
                                        <div class="content justify-content-end">
                                            <p class="h5"><strong class="d-block"><?= $value['name'] ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div slideshow-projects-buttons class="owl-controls gallery_portfolio">
                    <button class="prev"><i class="fa fa-angle-left"></i></button>
                    <button class="next"><i class="fa fa-angle-right"></i></button>
                </div>

                <div class="button-items text-center p-t-50">
                    <a href="/download/portfolio" class="btn btn-secondary btn-lg" target="_blank">Descargar imágenes del portafolio.</a>
                </div>
            </div>
        </section>

        <section class="call-to-action bg-gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Tu capital está esperando <br> que lo hagas crecer.</h1>
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
