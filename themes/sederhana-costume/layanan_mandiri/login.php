<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

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
<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
	<link rel="shortcut icon" href="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" />
<?php else: ?>
    <link rel="shortcut icon" href="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" />
<?php endif; ?>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url(); ?>rss.xml" />

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/bootswatch/flatly/bootstrap.min.css">

<!-- Quicksand Google Fonts -->
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/font.css">

<!-- Font Awesome -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/dataTables.bootstrap.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/select2.min.css">

<!-- Bootstrap Date time Picker -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-datetimepicker.min.css">

<!-- Portal Style -->
<link rel="stylesheet" href="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/css/custom.css">
<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>


<div class="container-default body-mandiri">
	<div class="container">
<?php if(!isset($_SESSION['mandiri']) OR $_SESSION['mandiri']<>1){ ?>
	
	<div class="col-sm-4 col-sm-offset-4 form-box">
		<div class="block-login-mandiri">
			<div class="login-mandiri">
				<div class="head-title-reset-mandiri">Layanan Mandiri</div>
			</div>
			<div class="form-top">
				<div class="logo-sec">
					<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" alt="Logo Desa"
					style="display: block;margin-left: auto;margin-right: auto;"></a>
				</div>
			</div>
			<div class="form-bottom">
				<?php if($form == 'nik'): ?>
				<form action="<?php echo site_url('layanan_mandiri/masuk/reset')?>" method="post" class="form-horizontal form-mandiri">
					<?php  if($error){ ?>
					<p style="margin-bottom:5px;padding: 5px;background: tomato;color: #fff;text-align: center;font-size: 12px;border-radius:5px;">
						<?php echo $error ?>
					</p>
					<?php }?>
					<input name="nik" type="text" placeholder="Masukkan NIK" class="form-control input-sm form-reset mandiri-login-form text-center" required autocomplete="off">					
					<button type="submit" id="but" class="btn btn-success btn-sm btn-mandiri center-block">CARI NIK</button>	 
				</form>

				<?php elseif($form == 'password'): ?>
					<form action="<?php echo site_url('layanan_mandiri/masuk/reset/password/'.$kode)?>" method="post" class="form-horizontal">
				<?php  if($error){ ?>
					<p style="margin-bottom:5px;padding: 2.5px;background: tomato;color: #fff;text-align: center;font-size: 12px;border-radius:5px;">
						<?php echo $error ?>
					</p>
					<?php }?>
					<div class="form-mandiri">
						<input name="pin" type="text" placeholder="Masukkan PIN Baru" class="form-control input-sm mandiri-login-form text-center" required autocomplete="off">
					</div>
					<div class="form-mandiri">
						<input name="pinc" type="text" placeholder="Ulangi PIN Baru" class="form-control input-sm mandiri-login-form text-center" required autocomplete="off">
					</div>
					<button type="submit" id="but" class="btn btn-success btn-sm">GANTI PIN</button>
	 
				</form>
				<?php elseif($form == 'nohp'): ?>
				<form action="<?php echo site_url('layanan_mandiri/masuk/reset/nohp')?>" method="post" class="form-horizontal">
					<?php  if($error){ ?>
					<p style="margin-bottom:5px;padding: 2.5px;background: tomato;color: #fff;text-align: center;font-size: 12px;border-radius:5px;">
						<?php echo $error ?>
					</p>
					<?php }?>
					<div class="form-mandiri">
						<span class="no-hp">Nomor Telepon anda : <?php echo $nohpbintang ?></span>
						<input name="nohp" type="text" placeholder="Masukkan no HP" class="form-control input-sm form-reset mandiri-login-form text-center" required autocomplete="off">
					</div>
					<button type="submit" id="but" class="btn btn-success btn-sm">LANJUT</button>
	 
				</form>
				<?php else: ?>
				<form action="<?php echo site_url('layanan_mandiri/login')?>" method="post" class="form-horizontal">
					<?php  if($_SESSION['mandiri_try'] AND isset($_SESSION['mandiri']) AND $_SESSION['mandiri']==-1){ ?>
					<p style="margin-bottom:5px;padding: 2.5px;background: tomato;color: #fff;text-align: center;font-size: 12px;border-radius:5px;">
						Login Gagal. Kesempatan mencoba <?php echo ($_SESSION['mandiri_try']-1); ?> kali lagi.
					</p>
					<?php }?>
					<?php  if(isset($_SESSION['mandiri']) AND $_SESSION['mandiri']==-1){ ?>
						<p style="padding: 2.5px;background: tomato;color: #fff;text-align: center;font-size: 12px;border-radius:5px;">
							Username atau Password yang Anda masukkan salah!
						</p>
					<?php }?>
					<div class="form-mandiri">
						<input name="nik" type="text" placeholder="Masukkan NIK" class="form-control input-sm mandiri-login-form text-center" required autocomplete="off">
					</div>
					<div class="form-mandiri">
						<input name="pin" type="password" placeholder="Masukkan PIN" class="form-control input-sm mandiri-login-form text-center" required autocomplete="off">
					</div>
					<button type="submit" id="but" class="btn btn-success btn-sm btn-mandiri" style="margin-bottom: 5px;">MASUK LAYANAN MANDIRI</button>
					<br />
					<a href="<?php echo site_url('layanan_mandiri/masuk/reset') ?>" class="btn btn-sm btn-primary btn-mandiri">GANTI PIN</a>
				</form>
			<?php endif ?>
			</div>
			<div class="bottom-footer text-center">&copy; <?php echo date("Y");?> <a href="https://www.portaldesadigital.id" target="_blank" class="text-default">Portal Desa Digital</a></div>
		</div>		
	</div>

	<?php }else{ ?>
	</div>
</div>
<?php } ?>
<!-- end container -->
