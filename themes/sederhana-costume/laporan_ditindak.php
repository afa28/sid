<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
	
<script>
  jQuery(document).ready(function($) {
    var owl = $('.laporan_warga');
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
        autoplayTimeout: 6000,
        autoplayHoverPause: true,
        margin: 10,
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


<div class="laporanslide">
	<div class="section-head text-center ">
		<h2 class="title"><a href="<?php echo base_url();?>laporan_warga">Laporan dan Aspirasi Warga</a></h2>
		<div class="dlab-separator-outer ">
			<div class="dlab-separator bg-primary style-skew"></div>
		</div>
	</div>
	<div class="laporan_warga owl-carousel owl-theme">
  	<?php foreach ($data_lapor as $key => $value) : ?>
		<?php
		$sql = "SELECT COUNT(id) as num FROM komentar_reply WHERE id_komentar = ?";
		$reply = $this->db->query($sql, $value['id'])->row()->num;
		?>
    	<div class="body-laporan">
      		<div class="judul-laporan-warga">
      			<a href="<?php echo site_url('laporan_warga/read/' . $value['id']) ?>">
      				<?= substr($value['judul'], 0, 30) ?>...
      			</a>
      		</div>
      		<div class="isi-laporan-warga">
      			<?php echo ucwords(character_limiter($value['komentar'], 150)); ?>
      		</div>
      		<div class="tgl-laporan-warga">
				<b>Dilaporkan :</b> <?= tgl_indo2($value['tgl_upload']) ?><br />
				<b>Oleh :</b> <?= $value['owner'] ?><br />
				<b>Status :</b> <?= $value['status'] ?>
			</div>
      		<div class="footer-laporan-warga">
      			<img src="<?php echo base_url() . $this->theme_folder . '/' . $this->theme; ?>/assets/images/icons/reply-laporan.png" style="margin-right: 5px;float:left; width:24px; height: 25px;"> <?= $reply ?> Respon
      		</div>
    	</div>
 	<?php endforeach ?>
  </div>
</div>