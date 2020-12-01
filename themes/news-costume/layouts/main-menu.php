<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-inverse navbar-fixed-top hidden-lg hidden-md">
	<div class="container">
		<div class="navbar-header">
			<div class="navbar-brand">
				<div class="logo-menu">
					<a href="<?= site_url(); ?>"><img src="<?= base_url().'desa/logo/'.$desa['logo']; ?>" alt="Logo Desa" height="50">
						<span class="nama-desa">
							<?= ucwords($this->setting->sebutan_desa)." "?><?= ucwords($desa['nama_desa'])?>
						</span>
					</a>
				</div>
			</div>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<ul class="nav navbar-nav navbar-right navbar-collapse collapse main-menu">
			<li><a href="<?= site_url();?>" class="nav-link">Beranda</a></li>
			<?php foreach($menu_atas as $data) { ?>
				<li class="<?= count($data['submenu']) > 0 ? 'dropdown' : '' ?>">
					<a <?= count($data['submenu']) > 0 ? 'data-toggle="dropdown"' : ''; ?> class="nav-link <?= count($data['submenu']) > 0 ? 'dropdown-toggle' : ''; ?>" href="<?= count($data['submenu']) > 0 ? '#' : $data['link']; ?>">
						<?= $data['nama'] ?>  <?php if(count($data['submenu']) > 0){ ?><b class="caret"></b><?php } ?>
					</a>
					<?php if(count($data['submenu'])>0) { ?>
						<ul class="dropdown-menu">
							<?php foreach($data['submenu'] as $submenu) { ?>
								<li><a href="<?= $submenu['link']; ?>" style="color:#fff;"><?= $submenu['nama']; ?></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>

<nav class="navbar navbar-inverse navbar-fixed-top hidden-sm hidden-xs">
	<div class="container">
		<div class="navbar-header">
			<div class="navbar-brand">
				<div class="logo-menu">
					<a href="<?= site_url(); ?>"><img src="<?= base_url().'desa/logo/'.$desa['logo']; ?>" alt="Logo Desa" height="50">
						<span class="nama-desa">
							<?= ucwords($this->setting->sebutan_desa)." "?><?= ucwords($desa['nama_desa'])?>
						</span>
					</a>
				</div>
			</div>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<ul class="nav navbar-nav navbar-right navbar-collapse collapse main-menu">
			<li><a href="<?= site_url();?>" class="nav-link" style="border-bottom:3px solid;border-color:#f5ed09">Beranda</a></li>
			<?php foreach($menu_atas as $data) { ?>
				<li class="<?= count($data['submenu']) > 0 ? 'dropdown' : '' ?>" style="border-bottom:3px solid;border-color:<?= $data['warna']?>">
					<a <?= count($data['submenu']) > 0 ? 'data-toggle="dropdown"' : ''; ?> class="nav-link <?= count($data['submenu']) > 0 ? 'dropdown-toggle' : ''; ?>" href="<?= count($data['submenu']) > 0 ? '#' : $data['link']; ?>">
						<?= $data['nama'] ?>  <?php if(count($data['submenu']) > 0){ ?><b class="caret"></b><?php } ?>
					</a>
					<?php if(count($data['submenu'])>0) { ?>
						<ul class="dropdown-menu">
							<?php foreach($data['submenu'] as $submenu) { ?>
								<li><a href="<?= $submenu['link']; ?>" style="color:#fff;"><?= $submenu['nama']; ?></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>
