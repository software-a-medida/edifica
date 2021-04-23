<?php defined('_EXEC') or die; ?>
        <footer class="main-footer">
            <div class="container-fluid p-t-50">
                <div class="row">
                    <div class="col-12 col-md-3 offset-md-2">
                        <figure style="width: 200px;">
                            <img class="img-cover" src="{$path.images}logotype-small.svg" alt="" width="200">
                        </figure>

                        <p class="text-muted m-0 font-avenir">Calle 38 #271 x 7 y 5, Campestre, 97120.</p>
                        <p class="text-muted m-0 font-avenir">Mérida, Yucatán.</p>
                    </div>
                    <div class="col-12 col-md-3">
                        <ul class="list-unstyled navigation">
                            <li class="list-inline">
                                <a href="/" class="btn btn-link btn-light btn-block text-left" style="font-size: 1.1em">Inicio</a>
                            </li>
                            <li class="list-inline p-b-10">
                                <a href="/desarrollos" class="btn btn-link btn-light btn-block text-left p-b-0" style="font-size: 1.1em">Desarrollos</a>
                            </li>
                            <li class="list-inline p-b-10">
                                <a href="/construccion#portafolio" class="btn btn-link btn-light btn-block text-left p-b-0" style="font-size: 1.1em">Portafolio</a>
                            </li>
                            <li class="list-inline">
                                <a href="/inversion" class="btn btn-link btn-light btn-block text-left" style="font-size: 1.1em">Inversionistas</a>
                            </li>
                            <li class="list-inline">
                                <a href="/construccion" class="btn btn-link btn-light btn-block text-left" style="font-size: 1.1em">Construcción</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 suffix-md-2">
                        <ul class="list-unstyled navigation">
                            <li class="list-inline">
                                <a href="/acerca" class="btn btn-link btn-light btn-block text-left" style="font-size: 1.1em">¿Quiénes somos?</a>
                            </li>
                            <li class="list-inline">
                                <a href="/contacto" class="btn btn-link btn-light btn-block text-left" style="font-size: 1.1em">Contacto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <section class="copyright">
                <div class="container-fluid font-avenir">
                    © 2020 <b>{$vkye_webpage}</b> <i class="mdi mdi-heart text-danger"></i> Diseñado por <a href="javascript:void(0);" target="_blank">Tema Soluciona</a> & Desarrollado por <a href="https://codemonkey.com.mx" target="_blank">codemonkey.com.mx</a>
                </div>
            </section>
        </footer>

        <script src="{$path.js}jquery-3.4.1.min.js"></script>
        <script src="https://cdn.codemonkey.com.mx/js/valkyrie.js?v=1.0"></script>
        <script src="https://cdn.codemonkey.com.mx/js/codemonkey.js?v=1.0"></script>
        <script src="{$path.js}scripts.js?v=1.5"></script>

        {$dependencies.js}

        {$dependencies.other}
    </body>
</html>
