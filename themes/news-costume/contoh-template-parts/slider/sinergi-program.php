<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- MAIN SLIDER -->
<div class="main-slider">
    <div id="sinergiProgramSlider" class="carousel slide" data-ride="carousel">
        <?php if(count($slider_gambar['gambar']) > 1){ ?>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach ($slider_gambar['gambar'] as $key => $data) { ?>
                    <li data-target="#mainSlider" data-slide-to="<?php echo $key ?>"
                        class="<?php echo $key === 0 ? 'active' : '' ?>"></li>
                    <?php } ?>
                </ol>
            <?php } ?>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php foreach ($slider_gambar['gambar'] as $key => $data) { ?>
                    <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                        <a href="<?php get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
                            <img src="<?php echo thumbnail_uri($data['gambar'], 1500, 550); ?>" alt="<?php echo $data['judul'] ?>" width="100%">
                        </a>

                        <div class="carousel-caption">
                            <div class="slide-caption"><?php echo character_limiter($data['judul'], 80); ?></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
<!-- END MAIN SLIDER -->