<?php

defined('_EXEC') or die;

$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.carousel.min.css']);
$this->dependencies->add(['css', '{$path.plugins}OwlCarousel2-2.3.4/assets/owl.theme.default.min.css']);
$this->dependencies->add(['js', '{$path.plugins}OwlCarousel2-2.3.4/owl.carousel.min.js']);
$this->dependencies->add(['js', '{$path.js}pages/developments_view.js?v=1.0.3']);
$this->dependencies->add(['other',
'<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=map"></script>
<script type="text/javascript">
function map()
{
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 17,
        center: {
            lat: ' . $project['data']['map_lat'] . ',
            lng: ' . $project['data']['map_long'] . '
        }
    });

    var circle = new google.maps.Circle({
        strokeColor: "#fa7268",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#fa7268",
        fillOpacity: 0.2,
        map: map,
        center: {
            lat: ' . $project['data']['map_lat'] . ',
            lng: ' . $project['data']['map_long'] . '
        },
        radius: 100
    });

    var marker = new google.maps.Marker({
        position: {
            lat: ' . $project['data']['map_lat'] . ',
            lng: ' . $project['data']['map_long'] . '
        },
        map: map
    });

    var title = new google.maps.InfoWindow({
        content: "' . $project['data']['name'] . '"
    });

    title.open(map, marker);
}
</script>']);

?>

<div id="page">
    %{main-header}%
    <main id="main-content">
        <header class="page-title" style="height: 100vh;">
            <figure class="cover">
                <img class="img-cover" src="{$path.uploads}<?= $project['image_cover'] ?>" alt="">
            </figure>
            <div class="container-fluid">
                <div class="content text-center">
                    <figure class="figure-img">
                        <img src="{$path.uploads}<?= $project['project_logotype'] ?>" alt="" class="img-fluid m-l-auto m-r-auto" style="width: 350px;">
                    </figure>
                </div>
            </div>
        </header>
        <section class="p-t-50 p-b-50">
            <div class="container-fluid p-t-50 p-b-50 text-center">
                <h1 class="text-uppercase font-20" style="color: #979797;"><?= $project['data']['price_text'] ?> <br> <strong class="d-block font-40" style="font-weight: 900;">desde $<?= number_format($project['data']['price']) ?></strong></h1>
                <?php if (!empty($project['brochure'])) : ?>
                    <a href="{$path.uploads}<?php echo $project['brochure']; ?>" download="<?php echo $project['brochure']; ?>" class="btn btn-lg btn-success m-t-30" style="background-color: #00695c; padding: 20px 40px; font-size: 2em;">Descargar Brochure</a>
                <?php endif; ?>
            </div>
        </section>
        <section class="p-t-50 p-b-50" style="background-color: #eaeaea;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <figure>
                            <img class="img-cover" src="{$path.uploads}<?= $project['image_content'] ?>" alt="">
                        </figure>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <?= $project['data']['description'] ?>
                    </div>
                </div>
            </div>
        </section>
        <?php if ( !empty($project['gallery_deliveries']) ) : ?>
            <section class="p-t-50 p-b-50">
                <div class="container-fluid" style="position: relative;">
                    <h1 class="text-uppercase font-20 text-center" style="color: #979797;">Galería de entregas.</h1>

                    <div class="slideshow-projects owl-carousel owl-theme">
                        <?php foreach ( $project['gallery_deliveries'] as $value ): ?>
                            <div class="item">
                                <figure>
                                    <img src="{$path.uploads}<?= $value ?>" alt="" class="img-cover">
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="slideshow-projects-buttons" class="owl-controls">
                        <button class="prev"><i class="fa fa-angle-left"></i></button>
                        <button class="next"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ( !empty($project['gallery_ready_constructions']) ) : ?>
            <section class="p-t-50 p-b-50">
                <div class="container-fluid" style="position: relative;">
                    <h1 class="text-uppercase font-20 text-center" style="color: #979797;">Construciones listas.</h1>

                    <div class="slideshow-projects owl-carousel owl-theme">
                        <?php foreach ( $project['gallery_ready_constructions'] as $value ): ?>
                            <div class="item">
                                <figure>
                                    <img src="{$path.uploads}<?= $value ?>" alt="" class="img-cover">
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="slideshow-projects-buttons" class="owl-controls">
                        <button class="prev"><i class="fa fa-angle-left"></i></button>
                        <button class="next"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if ( !empty($project['gallery_portfolio']) ) : ?>
            <section class="p-t-50 p-b-50">
                <div class="container-fluid" style="position: relative;">
                    <h1 class="text-uppercase font-20 text-center" style="color: #979797;">Portafolio</h1>

                    <div class="slideshow-projects owl-carousel owl-theme">
                        <?php foreach ( $project['gallery_portfolio'] as $value ): ?>
                            <div class="item">
                                <figure>
                                    <img src="{$path.uploads}<?= $value ?>" alt="" class="img-cover">
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div id="slideshow-projects-buttons" class="owl-controls">
                        <button class="prev"><i class="fa fa-angle-left"></i></button>
                        <button class="next"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <section class="maps <?php echo (!empty($project['project_croquis']) ? '' : 'complete'); ?>">
            <div class="gmap">
                <div id="map"></div>
                <a href="https://www.google.com/maps/place/@<?php echo $project['data']['map_lat']; ?>,<?php echo $project['data']['map_long']; ?>,17z" target="_blank">Ver en Google Maps</a>
            </div>
            <div class="image-map">
                <?php if (!empty($project['project_croquis'])) : ?>
                    <figure class="m-0">
                        <img src="{$path.uploads}<?php echo $project['project_croquis']; ?>" alt="" class="img-cover">
                    </figure>
                <?php endif; ?>
            </div>
        </section>
        <div class="_form_29"></div>
        <script src="https://heydani.activehosted.com/f/embed.php?id=29" type="text/javascript" charset="utf-utf-8"></script>
        <section class="call-to-action bg-gray" style="background: #00695c;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 d-flex flex-column align-items-center justify-content-center">
                        <h1>Vive en el departamento de tus sueños.</h1>
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
