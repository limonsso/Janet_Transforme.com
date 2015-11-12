<div class="contain">
    <div class="section-title">
        <h2>Portfolio</h2>
    </div>
    <script src="Js/js/modernizr.custom.js"></script>
    <article class="article">
        <div id="grid-gallery" class="grid-gallery">
            <section class="grid-wrap">
                <ul class="grid">
                    <li class="grid-sizer"></li>
                    <!-- for Masonry column width -->
                    <?php
                    $portfolio->Remplir();
                    foreach($portfolio->monportfolio as $item)
                    {
                        ?>
                        <li>
                            <figure class="picture">
                                <img src="img/Portfolio/thumb/<?php echo $item[1]; ?>" alt="<?php echo $item[0]; ?>"/>
<!--                                <figcaption><p>....</p></figcaption>-->
                            </figure>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </section>
            <!-- // grid-wrap -->
            <section class="slideshow">
                <ul>
                    <?php
                    $portfolio->Remplir();
                    foreach($portfolio->monportfolio as $item)
                    {
                        ?>
                        <li>
                            <figure>
                                <figcaption>
                                </figcaption>
                                <img src="img/Portfolio/large/<?php echo $item[1]; ?>" alt="<?php echo $item[1]; ?>"/>
                            </figure>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <nav>
                    <span class="icon nav-prev"></span>
                    <span class="icon nav-next"></span>
                    <span class="icon nav-close"></span>
                </nav>
            </section>
            <!-- // slideshow -->
        </div>
        <!-- // grid-gallery -->

        <script src="Js/js/imagesloaded.pkgd.min.js"></script>
        <script src="Js/js/masonry.pkgd.min.js"></script>
        <script src="Js/js/classie.js"></script>
        <script src="Js/js/cbpGridGallery.js"></script>
        <script>
            new CBPGridGallery(document.getElementById('grid-gallery'));
        </script>
    </article>
</div>