<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<?php if (count($slide_galeri)>0 OR count($slide_artikel)>0): ?>
<?php //$this->load->view($folder_themes."/template-parts/slider/main-slider") ?>
<?php endif; ?>
<div class="container-default hal-content">
	<div class="container">
		<div class="row">
			<!-- page content -->
			<div class="col-md-9">

				<div class="page-content">
					<?php echo $page_content; ?>
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
</div><!-- end content -->

<?php $this->load->view($folder_themes.'/apbdes2');?>

<?php $this->load->view($folder_themes.'/footer');?>