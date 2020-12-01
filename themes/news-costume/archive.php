<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <!-- page content -->
			<div class="halaman-arsip">
				<div class="col-md-9">
					<div class="blog-section">
						<div class="section-heading mt-3"><?php echo $page_header; ?></div>
						<?php $this->load->view($folder_themes.'/template-parts/content-archive');?>
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