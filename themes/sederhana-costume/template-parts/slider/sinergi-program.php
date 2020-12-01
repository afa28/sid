<?php
	$widget = $this->db->select('enabled')->where('isi', 'sinergi_program.php')->get('widget')->row_array();
	if($widget['enabled'] == 1 && $sinergi_program):
?>

<script>
  jQuery(document).ready(function($) {
    var owl = $('.slidesinergi');
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
        autoplayTimeout: 5000,
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
            items:5
          }
        }
      });
    });
</script>
<div class="container-default bg-white">
	<div class="container">
		<div class="section-sinergi">
			<div class="sinergi-slide">
			  <div class="slidesinergi owl-carousel owl-theme">
			  <?php foreach ($sinergi_program as $program) : ?>
			    <div class="blog-image">
					<a href="<?php echo $program['tautan'] ?>" target="_blank">
						<img src="<?php echo base_url() ?>desa/upload/widget/<?php echo $program['gambar'] ?>" class="img-responsive center sinergi-image">
					</a>
			    </div>
			  <?php endforeach ?>
			  </div>
			</div>
		</div>
	</div>
</div>

<?php endif ?>