<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$this->setting->admin_title . ' ' . ucwords($this->setting->sebutan_desa) . (($desa['nama_desa']) ? ' ' . $desa['nama_desa']:  '') . 'Layanan Mandiri'; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
		<link rel="shortcut icon" href="<?= base_url()?><?= LOKASI_LOGO_DESA?>favicon.ico" />
	<?php else: ?>
		<link rel="shortcut icon" href="<?= base_url()?>favicon.ico" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url()?>rss.xml" />
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/skins/_all-skins.min.css">
	<script type="text/javascript">
		const BASE_URL = "<?= base_url(); ?>";
		const SITE_URL = "<?= site_url(); ?>";
	</script>
</head>
<body class="hold-transition skin-blue layout-top-nav fixed">
	<div class="wrapper">
		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?= site_url(); ?>">
							<img src="<?= gambar_desa($desa['logo']);?>" alt="<?= $desa['nama_desa']?>" width="30px" style="margin: -7px"/>
						</a>
						<div class="navbar-brand">
							<?= ucwords($this->setting->sebutan_desa).' '.$desa['nama_desa'] ?>
						</div>
					</div>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-envelope-o"></i>
									<span class="label label-success">4</span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">You have 4 messages</li>
									<li>
										<ul class="menu">
											<li>
												<a href="#">
													<h4>
														Support Team
														<small><i class="fa fa-clock-o"></i> 5 mins</small>
													</h4>
													<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
										</ul>
									</li>
									<li class="footer"><a href="#">See All Messages</a></li>
								</ul>
							</li>
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<?php if ($penduduk['foto']): ?>
										<img class="user-image" src="<?= AmbilFoto($penduduk['foto'])?>" alt="Foto">
									<?php else: ?>
										<img class="user-image" src="<?= base_url()?>assets/files/user_pict/kuser.png" alt="Foto">
									<?php endif; ?>
									<span class="hidden-xs"><?= $this->session->nama; ?></span>
								</a>
								<ul class="dropdown-menu">
									<!-- The user image in the menu -->
									<li class="user-header">
										<img class="penduduk profile-user-img img-responsive img-circle" src="<?= AmbilFoto($penduduk['foto']); ?>" alt="Foto Penduduk">
										<p>
											<?= $this->session->nik; ?>
											<small><?= $this->session->nama; ?></small>
										</p>
									</li>
									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="<?= site_url('first/mandiri'); ?>" class="btn btn-default btn-flat">Profil</a>
										</div>
										<div class="pull-right">
											<a href="<?= site_url('first/logout'); ?>" class="btn btn-default btn-flat">Keluar</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
