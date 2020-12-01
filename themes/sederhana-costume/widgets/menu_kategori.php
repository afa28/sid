<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- widget Menu-->
<div class="widget-menu_kategori">
    <ul id="ul-menu" class="main">
        <?php foreach($menu_kiri as $data){?>
            <li class="cat-item">
                <a href="<?php echo get_kategori_url( $data['id'] ); ?>"><i class="fa fa-angle-right"></i> <?php echo $data['nama']; if(count($data['submenu'])>0) { echo "<span class='caret'></span>"; } ?></a>
                <?php if( count( $data['submenu'] ) > 0 ): ?>
                    <ul class="submenu">
                        <?php foreach($data['submenu'] as $submenu): ?>
                            <li>
                                <a href="<?php echo get_kategori_url( $submenu['id'] ); ?>"><?php echo $submenu['nama']?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php }?>
    </ul>
</div>