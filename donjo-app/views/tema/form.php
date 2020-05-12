<div class="content-wrapper">
	<section class="content-header">
		<h1>Costume Tema <?= ucwords($themes)?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('tema')?>"> Tema</a></li>
			<li class="active"> Costome Tema <?= ucwords($themes)?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row" >
			<form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<?php include($path.'/setting.php'); ?>
			</form>
		</div>
	</section>
</div>
