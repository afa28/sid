<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if ($datas){ ?>
    <!-- LIST BLOG -->
    <div class="row">
        <?php foreach ($datas as $data){ ?>
            <!-- item -->
            <div class="col-sm-6">
                <div class="panel panel-default item">
                    <div class="panel-body no-padding">
                        <div class="blog-image">
                            <?php if ( trim($data['kategori'] ) != ''): ?>
                                 <a href="<?php echo get_kategori_url( $data['id_kategori'] ); ?>" class="cat-label"><i class="fa fa-tag"></i> <?php echo ucwords( $data['kategori'] ); ?></a>
                            <?php endif; ?>

                            <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
								<img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
							</a>
                        </div>

                        <div class="blog-content">
							<div class="blog-title">
								<a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>">
                                <?php echo ucwords(character_limiter( $data['judul'], 40 )); ?>...
								</a>
							</div>
							<div class="blog-info">
                                <div class="col-xs-6 post-date text-center">
									<small><i class="fa fa-calendar-o"></i> <?php echo tgl_indo2( $data['tgl_upload'] ); ?></small>
								</div>
								<div class="col-xs-6 writter text-center">
									<small><i class="fa fa-pencil-square-o"></i> <?php echo $data['owner']; ?></small>
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