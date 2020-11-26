<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php $this->load->view("$folder_themes/commons/meta.php"); ?>
	<!-- </head> -->
</head>
<body onLoad="renderDate()">
<!--
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
-->
<style type="text/css">
	.text-center {
		margin: 10px;
	}

	.card-bg {
		width: 130px;
		height: 130px;
		border-radius: 10px;
	}

	.text-white {
		margin: 5px;
	}

	.stat-title {
		margin-top: 10px;
		margin-bottom: 10px;
		font-weight: bold;
	}
</style>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container" style="background-color: #f6f6f6;">
	<header id="header">
		<?php $this->load->view("$folder_themes/partials/header.php"); ?>
	</header>
	<div id="navarea">
		<?php $this->load->view("$folder_themes/partials/menu_head.php"); ?>
	</div>
	<div class="row">
		<section id="mainContent">
			<div class="content_middle"></div>
			<div class="content_bottom">
				<div class="col-lg-9 col-md-9">
					<div class="box-header with-border">
						<h2 class="post_titile">Data Statistik</h2>
						<br>
					</div>
					<div class="row">
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/13'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-blind fa-4x text-white"></i>
										<div class="stat-title">Usia</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/0'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-graduation-cap fa-4x text-white"></i>
										<div class="stat-title">Pendidikan Dalam KK</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/14'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-graduation-cap fa-4x text-white"></i>
										<div class="stat-title">Pendidikan Ditempuh</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/1'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-briefcase fa-4x text-white"></i>
										<div class="stat-title">Pekerjaan</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/18'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-id-card-o fa-4x text-white"></i>
										<div class="stat-title">KTP</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/2'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-bullhorn fa-4x text-white"></i>
										<div class="stat-title">Perkawinan</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/3'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-bullhorn fa-4x text-white"></i>
										<div class="stat-title">Agama</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/4'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-venus-mars fa-4x text-white"></i>
										<div class="stat-title">Jenis Kelamin</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/6'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-check-square-o fa-4x text-white"></i>
										<div class="stat-title">Status</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/5'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-flag fa-4x text-white"></i>
										<div class="stat-title">Warga Negara</div>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/18'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-language fa-4x text-white"></i>
										<div class="stat-title">Akta Kelahiran</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/9'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-wheelchair fa-4x text-white"></i>
										<div class="stat-title">Penyandang Cacat</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/10'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-heartbeat fa-4x text-white"></i>
										<div class="stat-title">Sakit Menahun</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/7'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-medkit fa-4x text-white"></i>
										<div class="stat-title">Golongan Darah</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-dpt'); ?>">
								<div class="card-bg bg-cyan">
									<div class="card-bg bg-primary">
										<i class="fa fa-check-circle-o fa-4x text-white"></i>
										<div class="stat-title">Calon Pemilih</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('analisis'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-search fa-4x text-white"></i>
										<div class="stat-title">Analisis</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-2 col-xs-6 text-center">
							<a class="text-primary" href="<?= site_url('data-statistik/kelas_sosial'); ?>">
								<div class="card-bg bg-primary">
									<div class="card-body bg-light">
										<i class="fa fa-users fa-4x text-white"></i>
										<div class="stat-title">Kelas Sosial</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<?php $this->load->view("$folder_themes/partials/bottom_content_right.php"); ?>
				</div>
			</div>
		</section>
	</div>
</div>
<footer id="footer">
	<?php $this->load->view("$folder_themes/partials/footer_top.php"); ?>
	<?php $this->load->view("$folder_themes/partials/footer_bottom.php"); ?>
</footer>
<?php $this->load->view("$folder_themes/commons/meta_footer.php"); ?>
<!-- </body></html> -->
</body>
</html>
