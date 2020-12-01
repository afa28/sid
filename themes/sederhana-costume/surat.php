<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="surat-content">
	<div class="container">
		<?php echo $page_content; ?>
	</div>
</div>


<?php $this->load->view($folder_themes.'/footer');?>