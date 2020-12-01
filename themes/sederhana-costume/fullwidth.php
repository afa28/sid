<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<?php if (count($slide_galeri)>0 OR count($slide_artikel)>0): ?>
<?php //$this->load->view($folder_themes."/template-parts/slider/main-slider") ?>
<?php endif; ?>
<div class="content-full bg-gray">
	<div class="container">
		<?php $this->load->view($folder_themes.'/breadcrumb');?>
		<div class="page-content">
			<?php echo $page_content; ?>
		</div>
		<!-- end content -->
	</div>
<!-- end content -->
</div>

<?php $this->load->view($folder_themes.'/footer');?>