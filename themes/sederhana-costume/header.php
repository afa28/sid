<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" class="notranslate" translate="no">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" content="notranslate">
    <title>
        <?=$this->setting->website_title . ' ' . ucwords($this->setting->sebutan_desa) . (($desa['nama_desa']) ? ' ' . unpenetration($desa['nama_desa']):  '') . get_dynamic_title_page_from_path();?>
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="keywords" content="portal desa digital, portal desa, pdd, desa digital, sid, sistem informasi desa, sistem informasi <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?>, web, blog, informasi, website, <?php echo ucwords($this->setting->sebutan_desa)." "?>, kecamatan, kabupaten, indonesia, kampung, <?php echo ucwords($desa['nama_desa'])?>, <?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?>, <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?>, <?php echo $desa['nama_propinsi']?>, kadus, kades, kawil, camat, lurah, statistik, kependudukan, ektp, e-ktp, blt, dana desa, bantuan, layanan mandiri, <?php echo ucwords($this->setting->sebutan_desa)." "?> online, <?php echo ucwords($desa['nama_desa'])?> online, copyright by AyoKreatif, creat by MediaHost, buatan Happy Agung" />
    <meta property="og:site_name" content="<?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?>"/>
    <meta property="og:type" content="article"/>
    <?php if(isset($content)): ?>
    <meta property="og:title" content="<?php echo $content["judul"];?>"/>
    <meta property="og:url" content="<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>"/>
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
    <link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/css/animated.css">
    <link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/lightbox/css/lightbox.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/ionicons.min.css">

    <!-- Quicksand Google Fonts -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/font.css">  
        
    <!-- OpenStreetMap Js-->
    <script src="<?php echo base_url(); ?>assets/js/leaflet.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/turf.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/leaflet.pm.min.js"></script>
    
    <!-- jQuery -->
    <script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/axios.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/lightbox/js/lightbox-plus-jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/moment.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/select2.full.min.js"></script>

    <!-- DataTables -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>

    <!-- bootstrap Date time picker -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/id.js"></script>

    <!-- bootstrap Date picker -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap-datepicker.id.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/validasi.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/script.js"></script>
    <script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/owl.carousel.min.js"></script>
    <script>
        lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
        })
    </script>
		
		
    </head>
    <body class="skin-purle">
        <div class="wrapper">
		
            <div class="container">
                <?php include('template-parts/menu/main-menu.php');?>
            </div>           
			
			<?php include('template-parts/menu/layanan_mandiri.php');?>

            <?php if($this->homepage){ ?>
                <div class="slide hidden-xs">
                    <div class="container-default">
                        <?php $this->load->view($folder_themes.'/template-parts/slider/main-slider');?>
                    </div>
                </div>

            <?php include('template-parts/stat-modul.php');?>

            <?php } ?>     
