<?php
defined('_EXEC') or die;

// Bootstrap-inputmask
$this->dependencies->add(['js', '{$path.plugins}bootstrap-inputmask/jquery.inputmask.min.js']);

// Sweet Alert
$this->dependencies->add(['css', '{$path.plugins}sweet-alert2/sweetalert2.min.css']);
$this->dependencies->add(['js', '{$path.plugins}sweet-alert2/sweetalert2.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/users/create.js']);
$this->dependencies->add(['js', '{$path.js}pages/users/view.js']);
$this->dependencies->add(['js', '{$path.js}pages/users/update.js']);
$this->dependencies->add(['js', '{$path.js}pages/users/delete.js']);
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
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>

                    <h4 class="page-title">Usuarios</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12 m-b-20 d-print-none">
                <div class="button-items text-lg-right">
                    <?php if ( in_array('{users_create}', Session::get_value('session_permissions')) ): ?>
                        <button class="btn btn-success waves-effect waves-light" type="button" data-button-modal="users_create">Nuevo usuario</button>
                    <?php endif; ?>
                    <?php if ( in_array('{permissions_read}', Session::get_value('session_permissions')) ): ?>
                        <button class="btn waves-effect waves-light" type="button" data-button-modal="permissions">Permisos de usuario</button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form name="search" class="m-b-20" data-table-target="users">
                            <input type="search" name="search" value="" placeholder="Busca por nombre o correo electr??nico.">
                        </form>

                        <div class="table-box-responsive-lg">
                            <table id="users" class="table m-b-0" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Correo electr??nico</th>
                                        <th>Nivel</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ( $users as $value ): ?>
                                        <tr>
                                            <td data-title="ID">#<?= $value['id'] ?></td>
                                            <td data-title="Nombre"><?= $value['name'] ?></td>
                                            <td data-title="Usuario"><?= $value['username'] ?></td>
                                            <td data-title="Correo electr??nico"><?= $value['email'] ?></td>
                                            <td data-title="Nivel"><?= $value['level'] ?></td>

                                            <td data-title="Acciones">
                                                <div class="content-cell">
                                                    <div class="button-items text-right">
                                                        <a href="javascript:void(0);" class="btn waves-effect waves-light" data-ajax-user="<?= $value['id'] ?>">Ver</a>
                                                        <?php if ( in_array('{users_delete}', Session::get_value('session_permissions')) ): ?>
                                                            <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" data-ajax-delete-user="<?= $value['id'] ?>"><i class="fa fa-trash"></i></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Crear nuevo usuario -->
<section id="users_create" class="modal size-small" data-modal="users_create">
    <div class="content">
        <header>Agregar nuevo usuario.</header>
        <main>
            <form name="users_create">
                <?php echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Users/tpl_form_user.php'), ['levels' => $levels, 'permissions' => $permissions, 'ladas' => $ladas] ); ?>
            </form>
        </main>
        <footer>
            <div class="action-buttons text-right">
                <button class="btn btn-link" button-close><small>Cerrar sin crear</small></button>
                <?php if ( in_array('{users_create}', Session::get_value('session_permissions')) ): ?>
                    <button class="btn btn-primary waves-effect waves-light" button-submit>Crear usuario</button>
                <?php else: ?>
                    <button class="btn btn-primary waves-effect waves-light" disabled>No tienes permisos para crear un usuario.</button>
                <?php endif; ?>
            </div>
        </footer>
    </div>
</section>

<!-- Modificar usuario -->
<section id="users_update" class="modal size-small" data-modal="users_update">
    <div class="content">
        <header>Viendo el usuario: <strong data-user-title></strong>.</header>
        <main>
            <form name="users_update">
                <?php echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Users/tpl_form_user.php'), ['levels' => $levels, 'permissions' => $permissions, 'ladas' => $ladas] ); ?>
            </form>
        </main>
        <footer>
            <div class="action-buttons text-right">
                <button class="btn btn-link" button-close><small>Cerrar sin guardar</small></button>
                <?php if ( in_array('{users_update}', Session::get_value('session_permissions')) ): ?>
                    <button class="btn btn-primary waves-effect waves-light" button-submit>Guardar cambios</button>
                <?php else: ?>
                    <button class="btn btn-primary waves-effect waves-light" disabled>No tienes permisos para modificar el usuario.</button>
                <?php endif; ?>
            </div>
        </footer>
    </div>
</section>

<!-- Permisos -->
<?php if ( in_array('{permissions_read}', Session::get_value('session_permissions')) ): ?>
    <section id="permissions" class="modal" data-modal="permissions">
        <div class="content">
            <header>Permisos para los usuarios.</header>
            <main>
                <?php if ( in_array('{permissions_create}', Session::get_value('session_permissions')) ): ?>
                    <form name="create_permission" class="m-b-20">
                        <div class="row">
                            <div class="col-12 m-b-5">
                                <h6>Agregar permiso.</h6>
                            </div>
                            <div class="col-12 col-md-3 m-b-10">
                                <div class="label">
                                    <label>
                                        <input name="code" type="text"/>
                                        <p class="description">C??digo</p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-5 m-b-10">
                                <div class="label">
                                    <label>
                                        <input name="title" type="text"/>
                                        <p class="description">Descripci??n</p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 m-b-10">
                                <button type="submit" class="btn btn-block m-t-10">Agregar</button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>

                <table id="users" class="table m-b-0" style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>C??digo</th>
                            <th>Descripci??n</th>
                            <?php if ( in_array('{permissions_delete}', Session::get_value('session_permissions')) ): ?>
                                <th></th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $permissions as $value ): ?>
                            <tr>
                                <td data-title="C??digo"><code><?= $value['code'] ?></code></td>
                                <td data-title="Descripci??n"><?= $value['title'] ?></td>

                                <?php if ( in_array('{permissions_delete}', Session::get_value('session_permissions')) ): ?>
                                    <td data-title="Acciones">
                                        <div class="content-cell">
                                            <div class="button-items text-right">
                                                <a href="javascript:void(0);" class="btn btn-danger waves-effect waves-light" data-ajax-delete-permission="<?= $value['id'] ?>"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </main>
            <footer>
                <div class="action-buttons text-right">
                    <button class="btn btn-link" button-close><small>Cerrar</small></button>
                </div>
            </footer>
        </div>
    </section>
<?php endif; ?>
