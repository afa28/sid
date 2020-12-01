<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if ($datas){ ?>
    <!-- LIST BLOG -->
    <div class="row">
        <?php foreach ($datas as $data){ ?>
            <!-- item -->
            <div class="arsip-kontent">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="panel panel-default-arsip item">
                            <div class="panel-body">
                                <div class="archive-blog-title">
                                        <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
                                        <?php echo ucwords(character_limiter( $data['judul'], 40 )); ?>...
                                        </a>
                                </div>
                                <div class="blog-image">
                                    <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
        								<img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive img-article-list" alt="<?php echo $data['judul'] ?>">
        							</a>
                                </div>

                                <div class="blog-content">
        							<div class="meta-arsip">
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-5">
                                                <div class="post-date">
                                                    <i class="ti ti-calendar"></i> <?php echo tgl_indo2( $data['tgl_upload'] ); ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-7">
                                                <div class="post-cat">
                                                    <?php if ( trim($data['kategori'] ) != ''): ?>
                                                        <a href="<?php echo get_kategori_url( $data['id_kategori'] ); ?>">
                                                        <i class="ti ti-agenda"></i> <?php echo ucwords( $data['kategori'] ); ?>
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
        								</div>
        							</div>					
                                </div>
        					</div>					
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="alert alert-danger">
        Saat ini belum ada artikel yang ditulis.
    </div>
    <?php } ?>