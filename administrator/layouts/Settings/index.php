<?php
defined('_EXEC') or die;

// Alertify
$this->dependencies->add(['css', '{$path.plugins}alertify/css/alertify.css']);
$this->dependencies->add(['js', '{$path.plugins}alertify/js/alertify.js']);

// Sweet Alert
$this->dependencies->add(['css', '{$path.plugins}sweet-alert2/sweetalert2.min.css']);
$this->dependencies->add(['js', '{$path.plugins}sweet-alert2/sweetalert2.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/settings.js?v=1.0.0']);
?>
<main class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <ol class="breadcrumb hide-phone">
                        <li class="breadcrumb-item">
                            <a href="index.php">{$vkye_webpage}</a>
                        </li>
                        <li class="breadcrumb-item active">Configuraciones</li>
                    </ol>

                    <h4 class="page-title">Configuraciones</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card m-b-30">
                    <div class="card-body">
                        <!-- Title container -->
                        <h4 class="header-title m-t-0">Foto del equipo.</h4>
                        <p class="text-muted m-b-20">Actualizar foto del equipo.</p>
                        <!-- End title container -->

                        <form name="image_team" enctype="multipart/form-data">
                            <div class="label">
                                <label>
                                    <div class="upload_image_preview">
                                        <?php if ( isset($get_photo_team) ): ?>
                                            <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $get_photo_team ?>"></figure>
                                        <?php else: ?>
                                            <figure class="m-0"><img class="img-fluid" src="{$path.images}upload-file.svg"></figure>
                                        <?php endif; ?>
                                        <span class="d-block">Elegir imágen</span>
                                        <input type="file" name="image" accept="image/*" />
                                    </div>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-block">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
