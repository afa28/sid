<div class="content-wrapper">
	<section class="content-header">
		<h1>Costume Tema</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('tema')?>"> Themes</a></li>
			<li class="active"> Costome</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row" >
			<form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<?php include($lokasi.'/setting.php'); ?>
			</form>
		</div>
	</section>
</div>
