<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="main-wrapper bg-gray">
    <div class="container">
            <!-- page content -->
			<div class="halaman-arsip">
					<div class="blog-section">
						<?php $this->load->view($folder_themes.'/breadcrumb');?>
						<?php $this->load->view($folder_themes.'/template-parts/content-archive');?>
						<?php $this->load->view($folder_themes.'/template-parts/pagination/pagination');?>
					</div>
				<!-- end content -->
		</div>
        <div class="clearfix"></div>
</div>

<?php $this->load->view($folder_themes.'/footer');?>