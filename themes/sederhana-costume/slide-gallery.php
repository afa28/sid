<style type="text/css">
    .col-center {
        margin: 0 auto;
        float: none !important;
    }
    .carousel .item .img-thumb {
        background: #fff;
        padding: 10px;
        box-shadow: 10px 0px 10px -10px rgba(0, 0, 0, 0.4);
    }

    .carousel .item img {
        margin: 0 auto;
    }

    .carousel .carousel-control {
        width: 24px;
        background: none;
    }    
    .carousel-indicators-gallery {
    position: absolute;
    bottom: 10px;
    left: 50%;
    z-index: 15;
    width: 60%;
    margin-left: -30%;
    padding-left: 0;
    list-style: none;
    text-align: center;
}

    .carousel-indicators-gallery li,
    .carousel-indicators-gallery li.active {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 1px 4px;
        box-shadow: inset 0 2px 1px rgba(0, 0, 0, 0.2);
    }

    .carousel-indicators-gallery li {
        background: #999;
        border-color: transparent;
    }

    .carousel-indicators-gallery li.active {
        background: #555;
    }
</style>

<?php
foreach ($data_galeri as $data_galeri_item) {
    if (is_file(FCPATH . 'desa/upload/galeri/sedang_'. $data_galeri_item['gambar']) && !in_array($data_galeri_item['gambar'], $_SERVER['topslide'])) {
        $data_galeri_data[] = $data_galeri_item;
    }
}
?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
        <?php $data_galeri_part = intval(ceil(count($data_galeri_data) / 3)) ?>
        <?php for ($i = 0; $i <= count($data_galeri_data); $i++) : ?>
            <div class="item carousel-item <?php if($i == 0) echo "active"; ?>">
                <div class="row">
                    <?php for ($j = $i; $j < $i + 3; $j++) : ?>
                        <div class="col-sm-4">
                            <div class="img-thumb">
                                <a href="<?php echo base_url()?>desa/upload/galeri/sedang_<?php echo $data_galeri_data[$j]['gambar'] ?? $data_galeri_data[$j - $i]['gambar']; ?>" class="img-responsive cover-album img-fluid" data-lightbox="images" data-title="<?php echo ( $data_galeri_data[$j]['nama'] ?? $data_galeri_data[$j - $i]['nama'] ); ?>">
                                <img src="<?php echo base_url()?>desa/upload/galeri/sedang_<?php echo $data_galeri_data[$j]['gambar'] ?? $data_galeri_data[$j - $i]['gambar']; ?>" class="img-responsive img-fluid img-popup" alt="" style="width: 215px; height: 120px;">
                                </a>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>
        <?php endfor ?>
    </div>
</div>
