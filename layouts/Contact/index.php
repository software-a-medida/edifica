<?php
defined('_EXEC') or die;

// Map
$this->dependencies->add(['other', '<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLCea8Q6BtcTHwY3YFCiB0EoHE5KnsMUE&callback=map"></script>']);

// Page
$this->dependencies->add(['js', '{$path.js}pages/contact.js?v=1.0.3']);
?>
<div id="page">
    %{main-header}%

    <main id="main-content">
        <header class="home-cover">
            <figure data-desktop>
                <img class="img-cover" src="{$path.images}asset-12.jpg?v=1.0.1" alt="">
            </figure>
            <figure data-mobile>
                <img class="img-cover" src="{$path.images}asset-12-mobile.jpg?v=1.0.1" alt="">
            </figure>
        </header>

        <section class="p-t-50 p-b-50" style="background-color: #000;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h4 class="section-title text-white text-left m-0">Contacto</h4>

                        <p class="text-white font-avenir">Sus comentarios son importantes.</p>
                        <p class="text-white font-avenir m-b-50">Si tienes alguna duda, comentario o sugerencia, usa el siguiente formulario para contactarnos, igualmente puedes enviarnos un correo electrónico a: ventas@edifica67.mx</p>

                        <h6 class="section-title text-white text-left m-0">Oficina</h6>

                        <p class="text-white font-avenir"><small>Calle 38 x 7 No. 271 Y Col. Campestre CP: 97120 <br> Mérida, Yucatán , México. <br> Teléfono: (999)-913-6357</small></p>

                        <h6 class="section-title text-white text-left m-0">Antuan Charruf</h6>
                        <p class="text-white font-avenir"><small>acharruf@edifica67.mx</small></p>

                        <h6 class="section-title text-white text-left m-0">Juan Pablo Molina</h6>
                        <p class="text-white font-avenir"><small>jpmolina@edifica67.mx</small></p>
                    </div>
                    <div class="col-12 col-md-6">
                        <form name="contact">
                            <div class="label label-dark">
                                <label>
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <p class="p-t-10 m-0 text-white">Nombre</p>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <input type="text" name="name"/>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="label label-dark">
                                <label>
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <p class="p-t-10 m-0 text-white">Correo electrónico</p>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <input type="text" name="email"/>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="label label-dark">
                                <label>
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <p class="p-t-10 m-0 text-white">Teléfono</p>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <input type="text" name="phone"/>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="label label-dark">
                                <label>
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <p class="p-t-10 m-0 text-white">Mensaje</p>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <textarea name="message"></textarea>
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-light">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="map">
            <div id="map"></div>
        </section>
    </main>
</div>
