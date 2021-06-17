<?php
defined('_EXEC') or die;

$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);

$this->dependencies->add(['css', '{$path.plugins}fancybox-2.1.7/source/jquery.fancybox.css?v=2.1.7']);
$this->dependencies->add(['js', '{$path.plugins}fancybox-2.1.7/source/jquery.fancybox.pack.js?v=2.1.7']);

$this->dependencies->add(['js', '{$path.js}pages/home.js?v=1.0.3']);
?>

<div id="page">
    %{main-header}%

    <main id="main-content">
        <section class="slideshow-cover owl-carousel owl-theme">
            <?php foreach ( $slideshows_home as $value ): ?>
                <div class="item">
                    <header class="page-title">
                        <figure class="cover">
                            <img class="img-cover" src="{$path.uploads}<?= $value['image_cover'] ?>" alt="">
                        </figure>
                        <div class="container-fluid">
                            <div class="content text-center">
                                <?php if ($value['type'] == 'project'): ?>
                                    <?php if ( !is_null($value['project_logotype']) ): ?>
                                        <figure class="figure-img">
                                            <img src="{$path.uploads}<?= $value['project_logotype'] ?>" alt="" class="img-fluid m-l-auto m-r-auto" style="width: 350px;">
                                        </figure>
                                    <?php endif; ?>

                                    <?php if ( !is_null($value['url']) ): ?>
                                        <a href="/desarrollo/<?= $value['url'] ?>" class="btn btn-light btn-lg">Más información</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($value['type'] == 'blog'): ?>
                                    <h2 class="m-b-20"><?= $value['title'][Configuration::$lang_default] ?></h2>
                                    <a href="/articulo/<?= $value['url'] ?>" class="btn btn-light btn-lg">Leer más.</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </header>
                </div>
            <?php endforeach; ?>
        </section>

        <section style="background-color: #000;">
            <div class="container-fluid">
                <div class="p-t-50 p-b-50"></div>
                <h1 class="text-center text-white display-4 m-0">Invierte seguro, <strong class="d-block">Edifica tu futuro.</strong></h1>
                <div class="p-t-50 p-b-50"></div>
            </div>
        </section>

        <section class="p-t-50 p-b-50">
            <div class="container-fluid">
                <h4 class="section-title">Proyectos en venta</h4>

                <div class="projects projects-dual row m-b-20">
                    <?php foreach ( $projects_sale as $key => $value ): ?>
                        <div class="col-12 <?= ( $key === 0 ) ? 'col-lg-8' : 'col-lg-4' ?> m-b-20">
                            <div class="project">
                                <figure>
                                    <img class="img-cover" src="{$path.uploads}<?= $value['image_cover'] ?>" alt="">
                                </figure>
                                <div class="content">
                                    <p class="h5"><strong class="d-block"><?= $value['data']['name'] ?></strong> <?= $value['data']['title'] ?></p>
                                    <p class="h2 text-uppercase"><strong>En venta</strong></p>
                                </div>
                                <a href="/desarrollo/<?= $value['url'] ?>">Ver proyecto.</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="text-right">
                    <a href="/desarrollos" class="btn btn-link btn-more-view-style-1"><strong class="d-block">Ver más</strong> Desarrollos</a>
                </div>
            </div>
        </section>

        <section class="p-b-50">
            <div class="container-fluid">
                <h4 class="section-title">Proyectos en construcción</h4>

                <div class="projects row m-b-20">
                    <?php foreach ( $projects_under_construction as $value ): ?>
                        <div class="col-12 col-lg-4 m-b-20">
                            <div class="project hover-reverse">
                                <figure>
                                    <img class="img-cover" src="{$path.uploads}<?= $value['image_cover'] ?>" alt="">
                                </figure>
                                <div class="content">
                                    <p class="h5"><strong class="d-block"><?= $value['data']['name'] ?></strong> <?= $value['data']['title'] ?></p>
                                </div>
                                <?php if ( isset($value['gallery_ready_constructions']) ): ?>
                                    <div class="d-none">
                                        <?php for ($i=0; $i < count($value['gallery_ready_constructions']); $i++): ?>
                                            <a rel="<?= $value['id'] ?>_under_construction_gallery" href="{$path.uploads}<?= $value['gallery_ready_constructions'][$i] ?>" class="fancybox"><img src="{$path.uploads}<?= $value['gallery_ready_constructions'][$i] ?>" alt="" /></a>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                                <a rel="<?= $value['id'] ?>_under_construction_gallery" href="{$path.uploads}<?= $value['image_cover'] ?>" class="fancybox">Ver proyecto.</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="text-right">
                    <a href="/desarrollos" class="btn btn-link btn-more-view-style-1"><strong class="d-block">Ver más</strong> Desarrollos</a>
                </div>
            </div>
        </section>

        <section class="p-b-50">
            <div class="container-fluid">
                <h4 class="section-title">Proyectos terminados</h4>

                <div class="projects row m-b-20">
                    <?php foreach ( $projects_finished as $key => $value ): ?>
                        <div class="col-12 col-lg-4 m-b-30">
                            <div class="project hover-reverse">
                                <figure>
                                    <img class="img-cover" src="{$path.uploads}<?= $value['image_cover'] ?>" alt="">
                                </figure>
                                <div class="content">
                                    <p class="h5"><strong class="d-block"><?= $value['data']['name'] ?></strong> <?= $value['data']['title'] ?></p>
                                </div>
                                <?php if ( isset($value['gallery_deliveries']) ): ?>
                                    <div class="d-none">
                                        <?php for ($i=0; $i < count($value['gallery_deliveries']); $i++): ?>
                                            <a rel="<?= $value['id'] ?>_finished_gallery" href="{$path.uploads}<?= $value['gallery_deliveries'][$i] ?>" class="fancybox"><img src="{$path.uploads}<?= $value['gallery_deliveries'][$i] ?>" alt="" /></a>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                                <a rel="<?= $value['id'] ?>_finished_gallery" href="{$path.uploads}<?= $value['image_cover'] ?>" class="fancybox">Ver proyecto.</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="text-right">
                    <a href="/desarrollos" class="btn btn-link btn-more-view-style-1"><strong class="d-block">Ver más</strong> Desarrollos</a>
                </div>
            </div>
        </section>

        <section class="p-t-50 p-b-50" style="background-color: #F1F1F1;">
            <div class="container-fluid">
                <h4 class="section-title">Servicios</h4>

                <div class="icons-services">
                    <div class="item">
                        <figure class="figure-img thumb-lg m-l-auto m-r-auto">
                            <img src="{$path.images}icon-1.svg" alt="" class="img-fluid">
                        </figure>
                        <p class="h5 font-avenir">Desarrollo de proyectos inmobiliarios</p>
                    </div>
                    <div class="item">
                        <figure class="figure-img thumb-lg m-l-auto m-r-auto">
                            <img src="{$path.images}icon-2.svg" alt="" class="img-fluid">
                        </figure>
                        <p class="h5 font-avenir">Administración <br>de obra civil</p>
                    </div>
                    <div class="item">
                        <figure class="figure-img thumb-lg m-l-auto m-r-auto">
                            <img src="{$path.images}icon-3.svg" alt="" class="img-fluid">
                        </figure>
                        <p class="h5 font-avenir">Edificación <br>e infraestructura</p>
                    </div>
                    <div class="item">
                        <figure class="figure-img thumb-lg m-l-auto m-r-auto">
                            <img src="{$path.images}icon-4.svg" alt="" class="img-fluid">
                        </figure>
                        <p class="h5 font-avenir">Pavimentación</p>
                    </div>
                    <div class="item">
                        <figure class="figure-img thumb-lg m-l-auto m-r-auto">
                            <img src="{$path.images}icon-5.svg" alt="" class="img-fluid">
                        </figure>
                        <p class="h5 font-avenir">Tramitología</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-t-50 p-b-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-5 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center">
                            <h1 class="section-title">Construye tu proyecto con nosotros</h1>
                            <a class="#r1" href="/construccion#portafolio" class="btn btn-dark btn-md">Portafolio</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-7" style="position: relative;">
                        <div class="slideshow-projects owl-carousel owl-theme">
                            <?php foreach ($slideshows_portfolio as $key => $value): ?>
                                <?php if ( !empty($value['gallery_portfolio']) ): ?>
                                    <?php for ($i=0; $i < count($value['gallery_portfolio']); $i++): ?>
                                        <div class="item">
                                            <figure>
                                                <img src="{$path.uploads}<?= $value['gallery_portfolio'][$i] ?>" alt="">
                                            </figure>
                                        </div>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div slideshow-projects-buttons class="owl-controls">
                            <button class="prev"><i class="fa fa-angle-left"></i></button>
                            <button class="next"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-t-50 p-b-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-7" style="position: relative;">
                        <div class="slideshow-projects owl-carousel owl-theme">
                            <?php foreach ($slideshows_portfolio as $key => $value): ?>
                                <?php if ( !empty($value['gallery_deliveries']) ): ?>
                                    <?php for ($i=0; $i < count($value['gallery_deliveries']); $i++): ?>
                                        <div class="item">
                                            <figure>
                                                <img src="{$path.uploads}<?= $value['gallery_deliveries'][$i] ?>" alt="">
                                            </figure>
                                        </div>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div slideshow-projects-buttons class="owl-controls">
                            <button class="prev"><i class="fa fa-angle-left"></i></button>
                            <button class="next"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center">
                            <h1 class="section-title">Proyectos terminados</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-t-50 p-b-50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-5 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center">
                            <h1 class="section-title">Construcciones listas</h1>
                        </div>
                    </div>
                    <div class="col-12 col-md-7" style="position: relative;">
                        <div class="slideshow-projects owl-carousel owl-theme">
                            <?php foreach ($slideshows_portfolio as $key => $value): ?>
                                <?php if ( !empty($value['gallery_ready_constructions']) ): ?>
                                    <?php for ($i=0; $i < count($value['gallery_ready_constructions']); $i++): ?>
                                        <div class="item">
                                            <figure>
                                                <img src="{$path.uploads}<?= $value['gallery_ready_constructions'][$i] ?>" alt="">
                                            </figure>
                                        </div>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div slideshow-projects-buttons class="owl-controls">
                            <button class="prev"><i class="fa fa-angle-left"></i></button>
                            <button class="next"><i class="fa fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="call-to-action">
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

        <section class="p-t-50 p-b-50">
            <div class="container-fluid">
                <h4 class="section-title">Nuestro equipo</h4>

                <div class="row">
                    <div class="col-12 col-md-8 d-flex flex-column align-items-center justify-content-center">
                        <figure class="m-0">
                            <img src="{$path.uploads}<?= $get_photo_team ?>" alt="" class="img-cover">
                        </figure>
                    </div>
                    <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center">
                            <a href="/acerca" class="btn btn-dark btn-md r2">Cónocenos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
