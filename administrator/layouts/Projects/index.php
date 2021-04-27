<?php
defined('_EXEC') or die;

// Alertify
$this->dependencies->add(['css', '{$path.plugins}alertify/css/alertify.css']);
$this->dependencies->add(['js', '{$path.plugins}alertify/js/alertify.js']);

// Sweet Alert
$this->dependencies->add(['css', '{$path.plugins}sweet-alert2/sweetalert2.min.css']);
$this->dependencies->add(['js', '{$path.plugins}sweet-alert2/sweetalert2.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/projects/delete.js?v=1.0.0']);
?>
<main class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <ol class="breadcrumb hide-phone">
                        <li class="breadcrumb-item">
                            <a href="index.php">{$vkye_webpage}</a>
                        </li>
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Proyectos en venta</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 m-b-30">
                <div class="card elm-stretched" style="max-height: 450px;">
                    <a href="index.php?c=projects&m=create&type=sale" class="elm-stretched">
                        <img class="card-img img-cover" src="{$path.images}add-file.svg" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center">
                            <p class="card-text text-center text-dark text-uppercase m-b-20">Agregar proyecto <br> <small>en venta</small></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php foreach ( $projects_sale as $value ): ?>
                <div class="col-12 col-md-6 col-lg-3 m-b-30">
                    <div class="card elm-stretched" style="max-height: 450px;">
                        <figure class="elm-stretched m-0" style="max-height: 310px;">
                            <img class="card-img-top img-cover" src="{$path.root_uploads}<?= $value['image_cover'] ?>" alt="">
                        </figure>
                       <div class="card-body">
                           <h4 class="card-title font-20 text-truncate m-t-0 m-b-10"><?= $value['data']['name'] ?></h4>
                           <h6 class="card-title font-16 m-t-0 m-b-20 text-muted">

                               <small>
                                   <?= ( $value['data']['slide_home'] >= 1 ) ? '<spam class="bg-secondary text-white p-l-5 p-r-5" style="border-radius: 2px;">En inicio.</spam>' : '' ?>
                                   <?= ( $value['data']['slide_portfolio'] >= 1 ) ? '<spam class="bg-secondary text-white p-l-5 p-r-5" style="border-radius: 2px;">En portafolio.</spam>' : '' ?>
                               </small>
                           </h6>

                           <div class="button-items">
                               <a href="../desarrollo/<?= $value['url'] ?>" target="_blank" class="btn btn-primary waves-effect waves-light"><i class="fa fa-external-link m-r-5"></i> Ver</a>
                               <a href="index.php?c=projects&m=edit&id=<?= $value['id'] ?>&type=<?= $value['type'] ?>" class="btn btn-warning waves-effect waves-light">Editar</a>
                               <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" data-ajax-delete="<?= $value['id'] ?>">Eliminar</a>
                           </div>
                       </div>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Proyectos en construcción</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 m-b-30">
                <div class="card elm-stretched" style="max-height: 450px;">
                    <a href="index.php?c=projects&m=create&type=under_construction" class="elm-stretched">
                        <img class="card-img img-cover" src="{$path.images}add-file.svg" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center">
                            <p class="card-text text-center text-dark text-uppercase m-b-20">Agregar proyecto <br> <small>en construcción</small></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php foreach ( $projects_under_construction as $value ): ?>
                <div class="col-12 col-md-6 col-lg-3 m-b-30">
                    <div class="card elm-stretched" style="max-height: 450px;">
                        <figure class="elm-stretched m-0" style="max-height: 310px;">
                            <img class="card-img-top img-cover" src="{$path.root_uploads}<?= $value['image_cover'] ?>" alt="">
                        </figure>
                       <div class="card-body">
                           <h4 class="card-title font-20 text-truncate m-t-0 m-b-10"><?= $value['data']['name'] ?></h4>
                           <h6 class="card-title font-16 m-t-0 m-b-20 text-muted">

                               <small>
                                   <?= ( $value['data']['slide_home'] >= 1 ) ? '<spam class="bg-secondary text-white p-l-5 p-r-5" style="border-radius: 2px;">En inicio.</spam>' : '' ?>
                                   <?= ( $value['data']['slide_portfolio'] >= 1 ) ? '<spam class="bg-secondary text-white p-l-5 p-r-5" style="border-radius: 2px;">En portafolio.</spam>' : '' ?>
                               </small>
                           </h6>

                           <div class="button-items">
                               <a href="index.php?c=projects&m=edit&id=<?= $value['id'] ?>&type=<?= $value['type'] ?>" class="btn btn-warning waves-effect waves-light">Editar</a>
                               <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" data-ajax-delete="<?= $value['id'] ?>">Eliminar</a>
                           </div>
                       </div>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Proyectos terminados</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 m-b-30">
                <div class="card elm-stretched" style="max-height: 450px;">
                    <a href="index.php?c=projects&m=create&type=finished" class="elm-stretched">
                        <img class="card-img img-cover" src="{$path.images}add-file.svg" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end align-items-center">
                            <p class="card-text text-center text-dark text-uppercase m-b-20">Agregar proyecto <br> <small>terminado</small></p>
                        </div>
                    </a>
                </div>
            </div>
            <?php foreach ( $projects_finished as $value ): ?>
                <div class="col-12 col-md-6 col-lg-3 m-b-30">
                    <div class="card elm-stretched" style="max-height: 450px;">
                        <figure class="elm-stretched m-0" style="max-height: 310px;">
                            <img class="card-img-top img-cover" src="{$path.root_uploads}<?= $value['image_cover'] ?>" alt="">
                        </figure>
                       <div class="card-body">
                           <h4 class="card-title font-20 text-truncate m-t-0 m-b-10"><?= $value['data']['name'] ?></h4>
                           <h6 class="card-title font-16 m-t-0 m-b-20 text-muted">

                               <small>
                                   <?= ( $value['data']['slide_home'] >= 1 ) ? '<spam class="bg-secondary text-white p-l-5 p-r-5" style="border-radius: 2px;">En inicio.</spam>' : '' ?>
                                   <?= ( $value['data']['slide_portfolio'] >= 1 ) ? '<spam class="bg-secondary text-white p-l-5 p-r-5" style="border-radius: 2px;">En portafolio.</spam>' : '' ?>
                               </small>
                           </h6>

                           <div class="button-items">
                               <a href="index.php?c=projects&m=edit&id=<?= $value['id'] ?>&type=<?= $value['type'] ?>" class="btn btn-warning waves-effect waves-light">Editar</a>
                               <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" data-ajax-delete="<?= $value['id'] ?>">Eliminar</a>
                           </div>
                       </div>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
