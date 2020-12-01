<script>
  jQuery(document).ready(function($) {
    var owl = $('.slidepotensi');
      owl.on('initialize.owl.carousel initialized.owl.carousel ' +
      'initialize.owl.carousel initialize.owl.carousel ' +
      'resize.owl.carousel resized.owl.carousel ' +
      'refresh.owl.carousel refreshed.owl.carousel ' +
      'update.owl.carousel updated.owl.carousel ' +
      'drag.owl.carousel dragged.owl.carousel ' +
      'translate.owl.carousel translated.owl.carousel ' +
      'to.owl.carousel changed.owl.carousel',
      function(e) {
        $('.' + e.type)
        .removeClass('secondary')
        .addClass('success');
        window.setTimeout(function() {
          $('.' + e.type)
            .removeClass('success')
            .addClass('secondary');
          }, 3000);
      });
      owl.owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        lazyLoad: true,
				autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        margin: 20,
        video: true,
        responsive:{
          0:{ 
            items:1
          },
					480:{
            items:2
          },
					800:{
            items:3
          },
          980:{
            items:4
          },
					1336:{
            items:3
          }
        }
      });
    });
</script>

<div class="pengumumanslide">
	<div class="section-head text-center ">
		<h2 class="title" style="color:#fff;">Ayo Ke <?php echo ucwords($desa['nama_desa'])?></h2>
		<div class="dlab-separator-outer ">
			<div class="dlab-separator bg-primary style-skew"></div>
		</div>
		<div class="subtitle">Saksikan keindahan dan keunikannya</div>
	</div>
  <div class="slidepotensi owl-carousel owl-theme">
  <?php foreach ($data_potensi as $data) { ?>
    <div class="blog-image">
      <a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
        <img src="<?php echo thumbnail_uri($data['gambar'], 600, 350) ?>" class="img-responsive img-potensi" alt="<?php echo $data['judul'] ?>">
      </a>
      <div class="caption-pengumuman">
        <div class="title-pengumuman"><a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>"><?php echo character_limiter($data['judul'], 40); ?></a></div>
      </div>
      <div class="meta-pengumuman">
        <div class="tgl-pengumuman">
          <?php echo tgl_indo2($data['tgl_upload']); ?>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
</div>