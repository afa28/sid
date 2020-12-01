<?php
  $widget = $this->db->select('enabled')->where('isi', 'galeri.php')->get('widget')->row_array();
  if($widget['enabled'] == 1 && $data_galeri):
?>

<script>
  jQuery(document).ready(function($) {
    var owl = $('.slidegaleri');
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
        margin: 20,
        autoplayHoverPause: true,
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

<div class="galeri-slide">
  <div class="slidegaleri owl-carousel owl-theme">
  <?php
    foreach ($data_galeri as $data_galeri_item) {
      if (is_file(FCPATH . 'desa/upload/galeri/sedang_'. $data_galeri_item['gambar']) && !in_array($data_galeri_item['gambar'], $_SERVER['topslide'])) {
        $data_galeri_data[] = $data_galeri_item;
      }
    }
  ?>
    <?php $data_galeri_part = intval(ceil(count($data_galeri_data) / 1)) ?>
        <?php for ($i = 0; $i <= count($data_galeri_data); $i++) : ?>
    <div class="blog-image">
      <?php for ($j = $i; $j < $i + 1; $j++) : ?>
        <a href="<?php echo base_url()?>desa/upload/galeri/sedang_<?php echo $data_galeri_data[$j]['gambar'] ?? $data_galeri_data[$j - $i]['gambar']; ?>" class="img-responsive cover-album img-fluid" data-lightbox="images" data-title="<?php echo ( $data_galeri_data[$j]['nama'] ?? $data_galeri_data[$j - $i]['nama'] ); ?>">
          <img src="<?php echo base_url()?>desa/upload/galeri/sedang_<?php echo $data_galeri_data[$j]['gambar'] ?? $data_galeri_data[$j - $i]['gambar']; ?>" class="img-responsive img-fluid img-popup image-galeri" alt="<?php echo ( $data_galeri_data[$j]['nama'] ?? $data_galeri_data[$j - $i]['nama'] ); ?>">
        </a>
      <?php endfor ?>
    </div>
    <?php endfor ?>
  </div>
</div>

<?php endif ?>