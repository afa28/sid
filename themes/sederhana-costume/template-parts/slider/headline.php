<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if ($headline): ?>
    <!-- HEADLINE -->
    <div class="post-slider">
        <div id="headlineSlider" class="carousel slide" data-ride="carousel">
            <?php if(count($headline) > 1){ ?>
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php foreach($headline as $key => $data){ ?>
                        <li data-target="#headlineSlider" data-slide-to="<?php echo $key ?>"
                            class="<?php echo $key === 0 ? 'active' : '' ?>"></li>
                        <?php } ?>
                    </ol>
                <?php } ?>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php foreach($headline as $key => $data){ ?>
                        <div class=" <?php echo $key === 0 ? 'active' : '' ?>">
                            <a
                            href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
                            <img src="<?php echo thumbnail_uri($data['gambar'], 900, 350); ?>"
                            alt="<?php echo $data['judul'] ?>" width="100%">
                        </a>

                        <div class="carousel-caption text-center">
                            <h3><?php echo character_limiter($data['judul'], 150); ?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?php if(count($headline) > 1){ ?>
                <!-- Navigation -->
                <a class="left carousel-control" href="#headlineSlider" role="button" data-slide="prev">
                    <span class="glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#headlineSlider" role="button" data-slide="next">
                    <span class="glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            <?php } ?>
        </div>
    </div>
    <!-- END HEADLINE -->
    <?php endif; ?>