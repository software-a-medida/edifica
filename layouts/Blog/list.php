<?php defined('_EXEC') or die; ?>
<div id="page">
    %{main-header}%

    <main id="main-content">
        <section class="p-t-50 p-b-50">
            <div class="container-fluid">
                <h1 class="section-title p-t-50 p-b-50">Blog</h1>

                <div class="row">
                    <?php foreach ( $data as $key => $value ): ?>
                        <div class="col-12 col-lg-4 p-b-50 m-b-50">
                            <article class="blog">
                                <header>
                                    <figure>
                                        <img src="{$path.uploads}<?= $value['image'] ?>" alt="" class="img-cover">
                                    </figure>
                                    <h1 class="text__h text-truncate"><?= $value['title'][Configuration::$lang_default] ?></h1>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item"><?= $value['author'] ?></li>
                                        <li class="list-inline-item"><?= Dates::formatted_date($value['publication_date']) ?></li>
                                    </ul>
                                </header>
                                <main>
                                    <p class="text-muted text-justify"><?= substr( html_entity_decode( preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], str_replace('&nbsp;', ' ', strip_tags( json_decode($value['article'][Configuration::$lang_default]) ) ) ) ), 0, 255) ?> ...</p>
                                </main>
                                <footer>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a class="social-icon" href="https://www.facebook.com/sharer/sharer.php?u=https://octopuscapital.com/articulo/<?= $value['url'] ?>" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=602,width=555');return false;"><i class="fa fa-facebook-square"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon" href="https://twitter.com/intent/tweet?text=<?= urlencode($value['title'][Configuration::$lang_default]) ?>&url=https://octopuscapital.com/articulo/<?= $value['url'] ?>" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=602,width=555');return false;"><i class="fa fa-twitter-square"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="space-links"></span>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="/articulo/<?= $value['url'] ?>" class="btn btn-link p-0">Leer más...</a>
                                        </li>
                                    </ul>
                                </footer>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
</div>
