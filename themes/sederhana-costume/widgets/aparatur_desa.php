<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Widget aparatur desa -->
<div class="widget-aparatur_desa">
    <div id="aparatur-desa" class="carousel slide-aparatur" data-ride="carousel">
		<!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php foreach($aparatur_desa as $data){ ?>
                    <?php if(AmbilFoto($data['foto'], "besar") AND is_file(LOKASI_USER_PICT.$data['foto'])){ ?>
                        <div class="item <?php echo $data['jabatan'] === "Kepala Desa" ? 'active' : '' ?>">
                            <img src="<?php echo AmbilFoto($data['foto'],"besar") ?>" alt="Foto <?php echo $data['jabatan'] ?>" width="100%">
                            <div class="carousel-aparatur text-center">
                                <div class="jabatan_aparatur"><?php echo $data['jabatan']; ?></div>
                                <div class="nama_aparatur"><?php echo $data['nama']; ?></div>
								<div class="niap_aparatur">NIAP :<?=$data['pamong_niap']?></div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

            <!-- <a class="left carousel-control" href="#aparatur-desa" data-slide="prev">
                <span class="fa fa-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            
            <a class="right carousel-control" href="#aparatur-desa" data-slide="next">
                <span class="fa fa-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
    </div>