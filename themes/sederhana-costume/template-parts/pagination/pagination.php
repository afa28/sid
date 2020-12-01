<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if ( $paging->end_link > 1 ) { ?>
    <div class="paging text-center">
        <div>
            Menampilkan halaman <?php echo $page.' dari '.$paging->end_link; ?>
        </div>

        <ul class="pagination text-center">
            <?php if ($paging->start_link){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->start_link); ?>">Pertama</a>
                </li>
            <?php } ?>

            <?php if ($paging->prev){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->prev); ?>">Sebelumnya</a>
                </li>
            <?php } ?>

            <?php foreach ($pages as $i){ ?>
                <li <?php echo ($page == $i) ? 'class="active"' : "" ?>>
                    <a href="<?php echo ($page == $i) ? 'javascript:void(0)' : site_url($paging_page."?page=".$i); ?>" title="Halaman <?= $i ?>"><?= $i ?></a>
                </li>
            <?php } ?>

            <?php if ($paging->next){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->next); ?>">Selanjutnya</a>
                </li>
            <?php } ?>

            <?php if ($paging->end_link){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->end_link); ?>">Terakhir</i></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>