<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<p><strong>HASIL POLLING</strong></p>
        <strong>Total Vote: <?=$total_vote?></strong><hr/>
        <?php foreach( $data_pilihan as $key => $row ){
            // hitung persentase
            $jumlah = $this->poll->count_vote( $row['id'] );
            $persen = ( ( $jumlah / $total_vote ) * 100 );
            ?>
            <div class="pilihan-polling"><?=$row['nama']?></div>
            <div class="progress">
                <div class="progress-bar progress-bar-<?=$warnabar[$key]?> progress-bar-striped active" role="progressbar" aria-valuenow="<?=number_format( $persen, 0 )?>" aria-valuemin="0" aria-valuemax="100" style="width:<?=number_format( $persen, 0 )?>%">
                    <b><?=number_format( $persen, 0 )?>%</b>
                </div>
            </div>
        <?php } ?>
<hr/>