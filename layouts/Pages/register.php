<?php
defined('_EXEC') or die;

// Page
$this->dependencies->add(['js', '{$path.js}pages/register.js']);
?>
<div id="page">
    %{main-header}%

    <main id="main-content">
        <section class="p-t-10 p-b-50 gradient-primary-gray">
            <div class="container">
                <?php echo $this->format->get_file( Security::DS(PATH_LAYOUTS . 'Templates/register_form.php'), ['ladas' => $ladas] ); ?>
            </div>
        </section>
    </main>
</div>
