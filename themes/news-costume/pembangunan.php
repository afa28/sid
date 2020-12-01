<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <!-- page content -->
			<div class="halaman-arsip">
				<div class="col-md-9">
					<div class="blog-section">
						<div class="section-heading mt-3"><?php echo $page_header; ?> <?php echo ucwords($this->setting->sebutan_desa)." "?></div>
						<?php if ($datas){ ?>
						    <!-- LIST BLOG -->
						    <div class="row">
						        <?php foreach ($datas as $data){ ?>
						            <!-- item -->
						            <div class="col-sm-6">
						                <div class="panel panel-default item">
						                    <div class="panel-body no-padding">
						                        <div class="blog-image">
						                                 <a href="<?php echo base_url('pembangunan/'.$data['slug']); ?>">
														<img src="<?php echo thumbnail_uri($data['gambar'],600,350) ?>" class="img-responsive" alt="<?php echo $data['judul'] ?>">
													</a>
				                                </div>
						                        <div class="blog-content">
													<div class="blog-title">
						                                 <a href="<?php echo base_url('pembangunan/'.$data['slug']); ?>">
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
						<?php $this->load->view($folder_themes.'/template-parts/pagination/pagination');?>
					</div>
				</div>
				<!-- end content -->
				<!-- Sidebar -->
				<div class="col-md-3">
					<?php $this->load->view($folder_themes.'/sidebar');?>
				</div>
			</div>
		</div>
        <div class="clearfix"></div>
        <!-- /.row -->
    </div>
</div>

<?php $this->load->view($folder_themes.'/footer');?>
