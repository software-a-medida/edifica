<?php defined('_EXEC') or die; ?>
<input type="hidden" name="action" value="finished" />

<div class="card m-b-30">
    <div class="card-body row">
        <div class="col-12 m-b-30">
            <h4 class="header-title m-t-0">1 - Crear un proyecto finalizado.</h4>
            <p class="text-muted m-b-0">Agréga información acerca del proyecto finalizado.</p>
        </div>

        <div class="col-12 m-b-10">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12">
                            <h6>Nombre del proyecto.</h6>
                        </div>
                        <div class="col-12">
                            <div class="label">
                                <label>
                                    <input class="form-control" type="text" name="name" value="<?= ( isset($project['data']['name']) ) ? $project['data']['name'] : ''; ?>">
                                    <p class="description text-muted">Escribe el nombre de tu proyecto en venta.</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12">
                            <h6>Título del proyecto</h6>
                        </div>
                        <div class="col-12">
                            <div class="label">
                                <label>
                                    <input class="form-control" type="text" name="title" value="<?= ( isset($project['data']['title']) ) ? $project['data']['title'] : ''; ?>">
                                    <p class="description text-muted">Ejem: Residencial 2021.</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4">
                            <h6 class="p-t-md-5">Posición en el slide de inicio</h6>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="label">
                                <label>
                                    <select name="slide_home">
                                        <option value="0">No mostrar en el slide.</option>
                                        <?php if ( !isset($project['data']['name']) ): ?>
                                            <?php $count_slideshow['pos_home'] += 1; ?>
                                        <?php endif; ?>

                                        <?php for ($i=1; $i <= $count_slideshow['pos_home']; $i++): ?>
                                            <option value="<?= $i ?>" <?= ( isset($project['data']['slide_home']) && !empty($project['data']['slide_home']) && (int) $project['data']['slide_home'] === $i ) ? 'selected' : '' ?> ><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4">
                            <h6 class="p-t-md-5">Posición en el slide del portafolio</h6>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="label">
                                <label>
                                    <select name="slide_portfolio">
                                        <option value="0">No mostrar en el slide.</option>
                                        <?php if ( !isset($project['data']['name']) ): ?>
                                            <?php $count_slideshow['pos_portfolio'] += 1; ?>
                                        <?php endif; ?>

                                        <?php for ($i=1; $i <= $count_slideshow['pos_portfolio']; $i++): ?>
                                            <option value="<?= $i ?>" <?= ( isset($project['data']['slide_portfolio']) && !empty($project['data']['slide_portfolio']) && (int) $project['data']['slide_portfolio'] === $i ) ? 'selected' : '' ?> ><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card m-b-30">
    <div class="card-body">
        <div class="row">
            <div class="col-12 m-b-30">
                <h4 class="header-title m-t-0">2 - Subir imágenes para ilustrar el proyecto.</h4>
                <p class="text-muted m-b-0">Sólo se permíten imágenes típo <span class="text-danger">png, jpg y jpeg</span>, no mayores a <span class="text-danger">2Mb</span>.</p>
            </div>

            <div class="col-lg-3 m-t-20 m-t-lg-0">
                <div class="label">
                    <label class="upload_image_preview m-0">
                        <figure class="m-0"><img class="img-fluid" src="<?= ( isset($project['image_cover']) ) ? '{$path.root_uploads}'. $project['image_cover'] : '{$path.images}upload-file.svg'; ?>"></figure>
                        <span class="d-block">Imagen de portada</span>
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?= (new Upload())->get_maximum_file_size(); ?>" />
                        <input type="file" name="image_cover" accept="image/*" />
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card m-b-30">
    <div class="card-body">
        <div class="row m-b-30" target-preview-gallery>
            <div class="col-12 m-b-30">
                <h4 class="header-title m-t-0">5 - Galería.</h4>
                <p class="text-muted m-b-0">Agrega tantas fotos como necesites a la galería de imagenes del proyecto. Sólo se permíten imágenes típo <span class="text-danger">png, jpg y jpeg</span>, no mayores a <span class="text-danger">2Mb</span>.</p>
            </div>

            <div class="col-lg-3 m-b-20">
                <div class="upload_image_preview">
                    <a href="javascript:void(0);" data-add-gallery>
                        <figure class="m-0"><img class="img-fluid" src="{$path.images}add-file.svg"></figure>
                    </a>
                </div>
            </div>

            <?php if ( isset($project['gallery']) ): ?>
                <?php foreach ( $project['gallery'] as $key => $value ): ?>
                    <div class="col-lg-3 m-b-20" data-image-box-item="true">
                        <div class="label">
                            <label class="upload_image_preview m-0">
                                <figure class="m-0"><img class="img-fluid" src="{$path.root_uploads}<?= $value['image'] ?>"></figure>
                                <button type="button" class="btn btn-block btn-danger" data-delete-image="<?= $value['id'] ?>">Eliminar</button>
                            </label>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 offset-lg-4 suffix-lg-4">
                <button type="submit" class="btn btn-block">Guardar proyecto</button>
            </div>
        </div>
    </div>
</div>
