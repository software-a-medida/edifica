<?php
defined('_EXEC') or die;

$this->dependencies->add(['css', '{$path.plugins}fancybox-2.1.7/source/jquery.fancybox.css?v=2.1.7']);
$this->dependencies->add(['js', '{$path.plugins}fancybox-2.1.7/source/jquery.fancybox.pack.js?v=2.1.7']);

$this->dependencies->add(['js', '{$path.js}pages/developments.js?v=1.0.1']);
?>
<div id="page">
    %{main-header}%

    <main id="main-content">
        <header class="page-title" style="height: 100vh;">
            <figure class="cover">
                <img class="img-cover" src="{$path.images}Nature-montebello-a.jpg" alt="">
            </figure>
            <div class="container-fluid">
                <div class="content text-center">
                    <h1 class="r3">Desarrollos</h1>
                </div>
            </div>
        </header>

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
                                <?php if ( isset($value['gallery']) ): ?>
                                    <div class="d-none">
                                        <?php for ($i=0; $i < count($value['gallery']); $i++): ?>
                                            <a rel="<?= $value['id'] ?>_under_construction_gallery" href="{$path.uploads}<?= $value['gallery'][$i] ?>" class="fancybox"><img src="{$path.uploads}<?= $value['gallery'][$i] ?>" alt="" /></a>
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
                                <?php if ( isset($value['gallery']) ): ?>
                                    <div class="d-none">
                                        <?php for ($i=0; $i < count($value['gallery']); $i++): ?>
                                            <a rel="<?= $value['id'] ?>_finished_gallery" href="{$path.uploads}<?= $value['gallery'][$i] ?>" class="fancybox"><img src="{$path.uploads}<?= $value['gallery'][$i] ?>" alt="" /></a>
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
