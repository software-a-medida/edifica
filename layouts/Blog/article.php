<?php
defined('_EXEC') or die;

// Facebook
$this->dependencies->add(['meta', '{$vkye_base}articulo/'. $data[0]['url'], ["property='og:url'"]]);
$this->dependencies->add(['meta', 'article', ["property='og:type'"]]);
$this->dependencies->add(['meta', $data[0]['sm_title']['es'], ["property='og:title'"]]);
$this->dependencies->add(['meta', $data[0]['sm_description']['es'], ["property='og:description'"]]);
$this->dependencies->add(['meta', '{$vkye_base}{$path.uploads}'. $data[0]['image'], ["property='og:image'"]]);

// Twitter
$this->dependencies->add(['meta', 'summary_large_image', ["name='twitter:card'"]]);
$this->dependencies->add(['meta', '{$vkye_base}articulo/'. $data[0]['url'], ["name='twitter:url'"]]);
$this->dependencies->add(['meta', $data[0]['sm_title']['es'], ["name='twitter:title'"]]);
$this->dependencies->add(['meta', $data[0]['sm_description']['es'], ["name='twitter:description'"]]);
$this->dependencies->add(['meta', '{$vkye_base}{$path.uploads}'. $data[0]['image'], ["name='twitter:image'"]]);
$this->dependencies->add(['meta', '@edificamx', ["name='twitter:site'"]]);
$this->dependencies->add(['meta', '@edificamx', ["name='twitter:creator'"]]);
?>
<div id="page">
    %{main-header}%

    <main id="main-content">
        <section class="p-t-50 p-b-50">
            <div class="container-fluid">
                <h1 class="section-title p-t-50 p-b-50">Blog</h1>

                <div class="row">
                    <div class="col-12 p-b-50 m-b-50">
                        <article class="blog">
                            <header>
                                <figure>
                                    <img src="{$path.uploads}<?= $data[0]['image'] ?>" alt="" class="img-cover">
                                </figure>
                                <h1 class="text__h"></h1>
                                <ul class="list-inline m-0 m-b-50">
                                    <li class="list-inline-item"><?= $data[0]['author'] ?></li>
                                    <li class="list-inline-item"><?= Dates::formatted_date($data[0]['publication_date']) ?></li>
                                    <li class="list-inline-item"><?= $data[0]['category'][Configuration::$lang_default] ?></li>
                                </ul>
                            </header>
                            <main>
                                <?= json_decode($data[0]['article'][Configuration::$lang_default]) ?>
                            </main>
                            <footer>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <p class="m-0">Compartir en</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon" href="https://www.facebook.com/sharer/sharer.php?u={$vkye_base}articulo/<?= $data[0]['url'] ?>" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=602,width=555');return false;"><i class="fa fa-facebook-square"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="social-icon" href="https://twitter.com/intent/tweet?text=<?= urlencode($data[0]['title'][Configuration::$lang_default]) ?>&url={$vkye_base}articulo/<?= $data[0]['url'] ?>" target="_blank" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=602,width=555');return false;"><i class="fa fa-twitter-square"></i></a>
                                    </li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
