<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?=$this->setting->admin_title
        . ' ' . ucwords($this->setting->sebutan_desa)
        . (($desa['nama_desa']) ? ' ' . unpenetration($desa['nama_desa']):  '')
        . get_dynamic_title_page_from_path();
        ?>
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta property="og:site_name" content="<?php echo $desa['nama_desa'];?>"/>
		<meta property="og:type" content="article"/>
		<?php if(isset($content)): ?>
	    <meta property="og:title" content="<?php echo $content["judul"];?>"/>
	    <meta property="og:url" content="<?= site_url().$content['kategori_slug'].'/'. $content['slug']?>"/>
		<?php if(is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar'])) { ?>
			<meta property="og:image" content="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>"/>
		<?php } ?>
	    <meta property="og:description" content="<?php echo potong_teks($content['isi'], 300)?> ..."/>
			<meta name="description" content="<?php echo potong_teks($content['isi'], 300)?> ..."/>
		<?php else: ?>
			<meta name="description" content="Website <?php echo ucwords($this->setting->sebutan_desa).' '.$desa['nama_desa'];?>"/>
		<?php endif; ?>
	
		<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
        <link rel="shortcut icon" href="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" />
        <?php else: ?>
            <link rel="shortcut icon" href="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" />
        <?php endif; ?>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url(); ?>rss.xml" />

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/bootswatch/flatly/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/dataTables.bootstrap.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/select2.min.css">
        <!-- Bootstrap Date time Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datetimepicker.min.css">
        <!-- OpenStreetMap Css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.pm.css" />
        <link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/css/custom.css">
        
        <!-- OpenStreetMap Js-->
        <script src="<?php echo base_url(); ?>assets/js/leaflet.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/turf.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/leaflet.pm.min.js"></script>
        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>
		<script type='text/javascript'>
		$(document).ready(function(){
			$(window).scroll(function(){
				if ($(window).scrollTop() > 100) {
					$('#tombolScrollTop').fadeIn();
				} else {
					$('#tombolScrollTop').fadeOut();
				}
			});
		});

		function scrolltotop()
		{
			$('html, body').animate({scrollTop : 0},500);
		}
		</script>
		
		
    </head>
    <body>
		<div class="container-default" id="header" >
			<?php include('template-parts/menu/top-menu.php');?>
			<?php include('template-parts/menu/main-menu.php');?>
        </div>
        
			
		<?php if($this->homepage){ ?>
            <div class="slide">
                <div class="container-default">
                    <?php $this->load->view($folder_themes.'/template-parts/slider/main-slider');?>
                </div>
            </div>			
        <?php } ?>
		<?php include('template-parts/menu/layanan_mandiri.php');?>
		