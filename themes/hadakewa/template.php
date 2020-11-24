<!DOCTYPE html>

<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<title>Website Resmi Pemerintah <?= ucwords($this->setting->sebutan_desa . ' ' . $desa['nama_desa']); ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= gambar_desa($desa['logo']); ?>" alt="<?= $desa['nama_desa']; ?>" />

	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" href="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/css/home.css'; ?>">
	<link rel="stylesheet" href="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/css/loader.css'; ?>">
	<link rel="stylesheet" href="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/font-awesome/css/font-awesome.min.css'; ?>">
</head>

<body>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129107776-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-129107776-1');
	</script>

	<div class="preloader">
		<div class="loader"><img src="<?= gambar_desa($desa['logo']);?>" alt="<?= $desa['nama_desa']; ?>" alt=""></div>
	</div>



	<video id="bgvid" playsinline autoplay loop muted>
		<source src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/media/lutrafix.mp4" type="video/mp4'; ?>" />
	</video>
	<section id="wrapper">
		<div class="content">
			<div class="logo">
				<img src="<?= gambar_desa($desa['logo']);?>" alt="<?= $desa['nama_desa']; ?>" class="img-resonsive"/>
			</div>
			<div class="judul-desa">PEMERINTAH <?= $this->setting->sebutan_desa . ' ' . $desa['nama_desa']; ?></div>
			<div class="judul-wilayah"><?= $this->setting->sebutan_kecamatan_singkat . ' ' . $desa['nama_kecamatan'] . ' ' . $this->setting->sebutan_kabupaten_singkat . ' ' . $desa['nama_kabupaten'] . ' Prov. ' . $desa['nama_propinsi']; ?></div>
			<div class="slogan">"Aman, Nyaman, Adil, Sejahtera dan Berdaya Saing di Era 4.0"</div>

			<form action="https://www.denpasarkota.go.id/search/filter" method="post">
				<div class="input-group cari">
					<input type="text" class="form-control" name="keywords" value="" size="50" placeholder="<?= ucwords('Cari informasi seputar ' . $this->setting->sebutan_desa . ' ' . $desa['nama_desa']); ?>" required="" style="color:black;"> <span class="input-group-btn">
						<button class="btn btn-success" style="background:#03401a;" type="submit"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>

			<ul class="menu">
				<li>
					<div class="menu-item dropdown">
						<i></i>
						<a href="#" class="icon dropdown-toggle" data-toggle="dropdown">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/berita.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">Berita</div>
					</div>
				</li>
				<li>
					<div class="menu-item dropdown">
						<a href="#" class="icon dropdown-toggle" data-toggle="dropdown">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/pemerintah.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">PEMERINTAHAN</div>
					</div>
				</li>
				<li>
					<div class="menu-item dropdown">
						<a href="#" class="icon dropdown-toggle" data-toggle="dropdown">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/agenda.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">AGENDA</div>
					</div>
				</li>
				<li>
					<div class="menu-item">
						<a href="http://e-agenda.luwuutarakab.go.id/" target="_blank" class="icon">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/bantuan-2.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">PROGRAM BANTUAN</div>
					</div>
				</li>
				<li>
					<div class="menu-item">
						<a href="https://gollum.sg.rapidplex.com:2096/" target="_blank" class="icon">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/apbedes.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">APBDES</div>
					</div>
				</li>
				<li>
					<div class="menu-item">
						<a href="http://portal.luwuutarakab.go.id/news" target="_blank" class="icon">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/publik.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">INFORMASI PUBLIK</div>
					</div>
				</li>
				<li>
					<div class="menu-item dropdown">
						<a href="#" class="icon dropdown-toggle" data-toggle="dropdown">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/galeri.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">GALERI</div>
					</div>
				</li>
				<li>
					<div class="menu-item">
						<a href="http://www.luwuutarakab.go.id/subdomain.html" target="_blank" class="icon">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/statistik.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">DATA STATISTIK</div>
					</div>
				</li>
				<li>
					<div class="menu-item">
						<a href="http://infodesa.luwuutarakab.go.id/" target="_blank" class="icon">
							<img src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/img/icon/layanan-mandiri.png'; ?>" class="img-resonsive">
						</a>
						<div class="title">LAYANAN MANDIRI</div>
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</section>

	<!-- JS -->
	<script src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/js/jquery.min.js'; ?>"></script>
	<script src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/js/bootstrap.min.js'; ?>"></script>
	<script src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/js/app.js'; ?>"></script>
	<script src="<?= base_url() . $this->theme_folder . '/' . $this->theme . '/assets/js/script.js'; ?>"></script>
</body>
</html>
