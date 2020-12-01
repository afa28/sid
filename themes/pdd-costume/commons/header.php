<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" class="notranslate" translate="no">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google" content="notranslate">
	<title>
		<?=$this->setting->website_title . ' ' . ucwords($this->setting->sebutan_desa) . (($desa['nama_desa']) ? ' ' . unpenetration($desa['nama_desa']):  '') . get_dynamic_title_page_from_path(); ?>
	</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta name="keywords" content="portal desa digital, portal desa, pdd, desa digital, sid, sistem informasi desa, sistem informasi <?= ucwords($this->setting->sebutan_desa)." "?><?= ucwords($desa['nama_desa'])?>, web, blog, informasi, website, <?= ucwords($this->setting->sebutan_desa)." "?>, kecamatan, kabupaten, indonesia, kampung, <?= ucwords($desa['nama_desa'])?>, <?= ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?>, <?= ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?>, <?= $desa['nama_propinsi']?>, kadus, kades, kawil, camat, lurah, statistik, kependudukan, ektp, e-ktp, blt, dana desa, bantuan, layanan mandiri, <?= ucwords($this->setting->sebutan_desa)." "?> online, <?= ucwords($desa['nama_desa'])?> online, copyright by AyoKreatif, creat by MediaHost, buatan Happy Agung" />
	<meta property="og:site_name" content="<?= ucwords($this->setting->sebutan_desa)." "?><?= ucwords($desa['nama_desa'])?>"/>
	<meta property="og:type" content="article"/>
	<?php if(isset($content)): ?>
		<meta property="og:title" content="<?= $content["judul"];?>"/>
		<meta property="og:url" content="<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>"/>
		<?php if(is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar'])) { ?>
			<meta property="og:image" content="<?= base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>"/>
		<?php } ?>
		<meta property="og:description" content="<?= potong_teks($content['isi'], 300)?> ..."/>
		<meta name="description" content="<?= potong_teks($content['isi'], 300)?> ..."/>
	<?php else: ?>
		<meta name="description" content="Website <?= ucwords($this->setting->sebutan_desa).' '.$desa['nama_desa'];?>"/>
	<?php endif; ?>

	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
		<link rel="shortcut icon" href="<?= base_url().'desa/logo/'.$desa['logo']; ?>" />
	<?php else: ?>
		<link rel="shortcut icon" href="<?= base_url().'desa/logo/'.$desa['logo']; ?>" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url(); ?>rss.xml" />

		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/font-awesome.min.css">

		<!-- Quicksand Google Fonts -->
		<link rel="stylesheet" href="<?= base_url()?>/assets/css/font.css">

		<!-- jQuery -->
		<script src="<?= base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/jquery.min.js"></script>

		<script src="<?= base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/owl.carousel.min.js"></script>
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
