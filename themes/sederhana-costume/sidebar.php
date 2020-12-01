<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php

    $hide = [
        'sinergi_program.php',
        'peta_lokasi_kantor.php',
        'media_sosial.php',
        'layanan_mandiri.php',
        'galeri.php',
        'aparatur_desa.php',
        'polling.php',
    ];

?>

<div class="sidebar">

    <?php
    // Tampilkan Widget
    if($w_cos){
        foreach($w_cos as $data){
            if(!in_array($data['isi'], $hide))
            {
                
            if($data["jenis_widget"] == 1){
                echo '<div class="widget bg-white p-a20 recent-posts-entry">';
                echo '<h5 class="widget-title style-1">'.$data['judul'].'</h5>';
                echo '<div class="widget-post-bx">';
                $this->load->view($folder_themes.'/widgets/'.trim($data['isi']));
                echo '</div>';
                echo '</div>';
            } elseif($data["jenis_widget"] == 2){
                echo '<div class="widget bg-white p-a20 recent-posts-entry">';
                echo '<h5 class="widget-title style-1">'.$data['judul'].'</h5>';
                echo '<div class="widget-post-bx">';
                $this->load->view($folder_themes.'/widgets/'.trim($data['isi']));
                echo '</div>';
                echo '</div>';
            } else {
                echo "
                <div class=\"blo-top\">
                <div class=\"tech-btm\">
                <div class=\"box-header\">
                <h4>".$data["judul"]."</h4>
                </div>
                
                ".html_entity_decode($data['isi'])."
                </div>
                </div>
                ";
            }
            }
        }
    }

    ?>

</div>