<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script>
  jQuery(document).ready(function($) {
    var owl = $('.panduan_layanan');
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
	
	<?php if ($data_panduan){ ?>
		<?php $no=0; if ($data_panduan) $no++;{ ?>
	<div class="section-head text-center ">
		<h2 class="title"><a href="<?php echo get_kategori_url($data_panduan[$no]['id_kategori']); ?>" style="color:#fff;"><?php echo ($data_panduan[$no=0]['kategori']) ?> <?php echo $this->setting->sebutan_desa?></a></h2>
		<div class="dlab-separator-outer ">
			<div class="dlab-separator bg-primary style-skew"></div>
		</div>
	</div>


	<div class="pengumumanslide">
		<div class="panduan_layanan owl-carousel owl-theme">
	  	<?php foreach ($data_panduan as $data) { ?>
	    	<div class="service-box style3">
                <div class="icon-bx-wraper" data-name="<?= strtoupper($desa['nama_desa'])?>">
                    <div class="icon-lg">
                        <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"class="icon-cell"><i class="ti-printer"></i></a>
                    </div>
                    <div class="icon-content">
                        <div class="title-block"><a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 60 )); ?></a></div>        
                    </div>
                 </div>
            </div>
	  <?php } ?>
	  </div>
	</div>
	<?php } ?>
</div>		
<?php } ?>