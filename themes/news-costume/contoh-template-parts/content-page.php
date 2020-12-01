<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if(is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar'])) { ?>
	<img width="100%" class="img-responsive" src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>" alt="<?php echo $content['judul']; ?>">
<?php } ?>

<div class="box">
	<div class="box-body">
		<div class="statik-title"><?php echo $content['judul']; ?></div>
		<hr/>
		<?php echo $content['isi']; ?>
	</div>
</div>

<?php //$this->load->view($folder_themes.'/comments');?>