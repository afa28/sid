<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
    $kolom_hit = $this->db->query("SHOW COLUMNS FROM `artikel` LIKE 'hit'")->row_array();

    if(!$kolom_hit)
    {
        $this->db->query("ALTER TABLE `artikel` ADD `hit` INT NOT NULL DEFAULT '0' AFTER `boleh_komentar`");
    }
    
?>

<div class="blog-content">
    <?php if($content["id"]) { ?>
        <?php

            $this->db->query("UPDATE `artikel` SET `hit` = hit +1 WHERE `id` = ".$content["id"]);

        ?>

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