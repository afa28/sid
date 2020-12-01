<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style type="text/css">
.carousel-fade .carousel-inner .item {
  opacity: 0;
  transition-property: opacity;
}    
.carousel-fade .carousel-inner .active {
  opacity: 1;
}    
.carousel-fade .carousel-inner .active.left,
.carousel-fade .carousel-inner .active.right {
  left: 0;
  opacity: 0;
  z-index: 1;
}    
.carousel-fade .carousel-inner .next.left,
.carousel-fade .carousel-inner .prev.right {
  opacity: 1;
}    
.carousel-fade .carousel-control {
  z-index: 2;
}

/*WHAT IS NEW IN 3.3: "Added transforms to improve carousel performance in modern browsers."
  Need to override the 3.3 new styles for modern browsers & apply opacity*/
@media all and (transform-3d), (-webkit-transform-3d) {
    .carousel-fade .carousel-inner > .item.next,
    .carousel-fade .carousel-inner > .item.active.right {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.prev,
    .carousel-fade .carousel-inner > .item.active.left {
      opacity: 0;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
    .carousel-fade .carousel-inner > .item.next.left,
    .carousel-fade .carousel-inner > .item.prev.right,
    .carousel-fade .carousel-inner > .item.active {
      opacity: 1;
      -webkit-transform: translate3d(0, 0, 0);
              transform: translate3d(0, 0, 0);
    }
}
</style>

<!-- MAIN SLIDER -->
<div class="main-slider">
    <div id="mainSlider" class="carousel slide carousel-fade" data-ride="carousel">
        <?php if(count($slider_gambar['gambar']) > 1){ ?>
            <?php } ?>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php foreach ($slider_gambar['gambar'] as $key => $data) { ?>
                <div class="item <?php echo $key === 0 ? 'active' : '' ?>">
                <?php

                $id_kategori = $this->db->query('select id_kategori from artikel where id = ?', $data['id'])->row_array();
                
                ?>
                  <a href="<?php echo get_artikel_url( $data['id'], $id_kategori['id_kategori'] ); ?>">
                    <img src="<?php echo thumbnail_uri($data['gambar']); ?>" alt="<?php echo $data['judul'] ?>" class="gambar-slide">
                  </a>
                  <div class="carousel-caption">
                    <div class="slide-caption">
                      <a href="<?php echo get_artikel_url( $data['id'], $id_kategori['id_kategori'] ); ?>">
                        <?php echo character_limiter($data['judul'], 80); ?>
                      </a>
                    </div>
                  </div>
                </div>
        <?php } ?>
        </div>
    </div>
</div>
<!-- END MAIN SLIDER -->