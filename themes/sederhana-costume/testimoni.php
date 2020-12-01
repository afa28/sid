<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="section-full content-inner">
    <div class="container">
        <div class="section-head text-center ">
            <h2 class="title">Komentar Terbaru</h2>
            <div class="dlab-separator-outer ">
                <div class="dlab-separator bg-primary style-skew"></div>
            </div>
            <p><i>Dengan komentar dari pengunjung website ini dapat menjadi tolak ukur peningkatan kualitas informasi Portal <?php echo $this->setting->sebutan_desa?> <?php echo ucwords($desa['nama_desa'])?></i></p>
        </div>
        <div class="row">
            <div class="col-md-12 col-center m-auto">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($komen as $key => $data) { ?>
                        <div class="item carousel-item <?php echo $key === 0 ? 'active' : '' ?>">
                            <div class="img-box"><img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/icons/profile.png"></div>
                            <div class="testimonial"><i><?php echo $data['komentar']?></i></div>
                            <div class="overview"><?php echo $data['owner']?></div>
                            <div class="meta"><?php echo tgl_indo2($data['tgl_upload'])?></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
            items:3,
            itemsDesktop:[1000,3],
            itemsDesktopSmall:[990,2],
            itemsTablet:[768,2],
            itemsMobile:[650,1],
            pagination:true,
            navigation:false,
            autoPlay:true
        });
    });
</script>
