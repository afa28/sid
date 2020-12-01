<?php foreach ($datas as $data): ?>
    <!-- item from load more -->
    <div class="col-sm-12 col-xs-12">
        <div class="blog-post blog-md clearfix">
                <div class="dlab-post-media dlab-img-effect zoom-slow">
                    <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
                        <img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
                    </a>
                </div>
                <div class="dlab-post-info">
                    <div class="dlab-post-meta">
                        <ul>
                            <li class="post-date"><?php echo tgl_indo2( $data['tgl_upload'] ); ?></li>
                            <li class="post-author"><?=empty($data['author']) ? $data['owner'] : $data['author']?></li>
                            <li class="post-cat"><?=$data['enabled'] > 1 ? 'Belum Aktif' : 'Aktif'?></li>
                        </ul>
                    </div>
                    <div class="dlab-post-title">
                        <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
                            <h2 class="post-title"><?php echo ucwords(character_limiter( $data['judul'], 40 )); ?></h2>
                        </a>
                    </div>
                    <div class="dlab-post-text">
                        <?= ucwords(character_limiter( $data['komentar'], 300 )); ?>
                    </div>                                              
                </div>
                
        </div>
    </div>
<?php endforeach; ?>