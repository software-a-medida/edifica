<?php
defined('_EXEC') or die;

// Tinymce
$this->dependencies->add(['js', '{$path.plugins}tinymce/tinymce.min.js']);

// Sweet Alert
$this->dependencies->add(['css', '{$path.plugins}sweet-alert2/sweetalert2.min.css']);
$this->dependencies->add(['js', '{$path.plugins}sweet-alert2/sweetalert2.min.js']);

// Pages
$this->dependencies->add(['js', '{$path.js}pages/blog/create.js']);
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
                            <a href="index.php?c=blog">Blog</a>
                        </li>
                        <li class="breadcrumb-item active">Nuevo artículo</li>
                    </ol>

                    <h4 class="page-title">Crear nuevo artículo</h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <form name="create_article" class="row font-14">
            <?php echo $this->format->get_file( Security::DS(PATH_ADMINISTRATOR_LAYOUTS . 'Blog/tpl_form_blog.php'), ['categories' => $categories, 'count_slideshow' => $count_slideshow] ); ?>
        </form>
    </div>
</main>
