<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="sidebar">

    <?php
    // Tampilkan Widget
    if($w_cos){
        foreach($w_cos as $data){
            if($data["jenis_widget"] == 1){
                echo '<div class="card my4">';
                echo '<h5 class="card-header">'.$data['judul'].'</h5>';
                echo '<div class="card-body">';
                $this->load->view($folder_themes.'/widgets/'.trim($data['isi']));
                echo '</div>';
                echo '</div>';
            } elseif($data["jenis_widget"] == 2){
                echo '<div class="blo-top">';
                echo '<div class="tech-btm">';
                include(LOKASI_WIDGET.trim($data['isi']));
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

    ?>

</div>