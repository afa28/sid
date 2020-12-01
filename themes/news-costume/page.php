<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="container-default hal-content">
	<div class="container">
		<div class="row">
			<!-- page content -->
			<div class="col-md-9">
				<div class="page-content">

					<?php if (isset($page_content)) {
						echo $page_content;
					} else { 
						$this->load->view($folder_themes.'/template-parts/content-single'); 
					} ?>
				</div>
			</div>
			<!-- end content -->

			<!-- Sidebar -->
			<div class="col-md-3">

				<?php $this->load->view($folder_themes.'/sidebar');?>

			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<!-- end content -->

<?php $this->load->view($folder_themes.'/footer');?>