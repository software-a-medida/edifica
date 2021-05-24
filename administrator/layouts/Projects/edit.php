<?php
defined('_EXEC') or die;

// Mask
$this->dependencies->add(['js', '{$path.plugins}jQuery-Mask/dist/jquery.mask.min.js']);

// Alertify
$this->dependencies->add(['css', '{$path.plugins}alertify/css/alertify.css']);
$this->dependencies->add(['js', '{$path.plugins}alertify/js/alertify.js']);

// Sweet Alert
$this->dependencies->add(['css', '{$path.plugins}sweet-alert2/sweetalert2.min.css']);
$this->dependencies->add(['js', '{$path.plugins}sweet-alert2/sweetalert2.min.js']);

// Tinymce
$this->dependencies->add(['js', '{$path.plugins}tinymce/tinymce.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/projects/form.js?v=2.0.1']);
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
                        <li class="breadcrumb-item">
                            <a href="index.php">Proyectos</a>
                        </li>
                        <li class="breadcrumb-item active">Editar</li>
                    </ol>

                    <h4 class="page-title">Modificar proyecto.</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="col-xl-12 m-t-20">
            <form name="project" enctype="multipart/form-data">
                <?php
                    switch ( $project['type'] )
                    {
                        default:
                        case 'sale':
                            echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Projects/tpl_form_project_sale.php'), ['project' => $project, 'count_slideshow' => $count_slideshow] );
                            break;

                        case 'under_construction':
                            echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Projects/tpl_form_project_under_construction.php'), ['project' => $project, 'count_slideshow' => $count_slideshow] );
                            break;

                        case 'finished':
                            echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Projects/tpl_form_project_finished.php'), ['project' => $project, 'count_slideshow' => $count_slideshow] );
                            break;
                    }
                ?>
            </form>
        </div>
    </div>
</main>
