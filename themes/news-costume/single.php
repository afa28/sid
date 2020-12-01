<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="blog-content">
    <?php if($content["id"]) { ?>
        <?php $this->load->view($folder_themes.'/template-parts/content-single');?>

    <?php }else{ ?>
        <h1 class="title mt-3">Maaf, artikel tidak ditemukan</h1>

        <div class="alert alert-danger">
            Anda telah terdampar di halaman yang datanya tidak ada lagi di web ini. Mohon periksa kembali,
            atau laporkan
            kepada kami.
        </div>
    <?php } ?>

</div>