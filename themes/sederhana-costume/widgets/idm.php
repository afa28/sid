<style>
.cardc {
	border-radius: 5px;
	padding: 0px;
	margin: 0 10px 10px 10px;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 10px 15px;
    position: relative;
}
.bg-danger {
    background: #f82649!important;
}
.bg-secondary {
    background: #d43f8d !important;
}
.number-font {
	font-size: 20px;
}
.ml-auto, .mx-auto {
    margin-left: auto !important;
}
.emot {
	top: 10px;
    float: right;
    right: 10px;
    position: absolute;
}
.emot .icon-emot {
	width: 40px;
	height: 40px;
}
.heading-corona {
	text-transform: uppercase;
	font-size: 14px;
}
.caption-corona {
	font-size: 10px;
	text-transform: uppercase;
}
.ctitle {
	text-transform: uppercase;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    color: #666;
    padding-bottom: 5px;
    border-bottom: 1px dashed #ddd;
    margin-bottom: 10px;
}
.csumber {
	text-align: right;
}
.csumber a {
	color: #429dea;
}
.cdupdate {
	text-align: right;
}
.ctupdate {
	text-align: right;
}
.provdata {
	padding: 10px;
}
.hprovdata {
	text-align: center;
	font-weight: bold;
	text-transform: uppercase;
	padding-bottom: 5px;	
	border-bottom: 1px dashed #ddd;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 10px;
	font-size: 11px;
}
.lprovdata {
	text-transform: uppercase;
	font-weight: bold;
	color: #fff;
	padding: 10px 5px 0px 5px;
	font-size: 11px;
}
.gprovdata {
    color: #fff;
    padding: 5px 10px 10px 10px;
}
</style>

<?php

		function idm_desimal($str) {

		$data = explode('.', $str);

		if (!empty($data[1])) {

			return implode('.', [$data[0], substr($data[1], 0, 2)]);
		}

		return $data[0];
	}

?>

<div class="row">
	<div class="col-md-6 col-xs-6">
		<div class="row">
		<div class="cardc bg-danger img-card box-primary-shadow">
			<div class="card-body">
				<div class="d-flex">
					<div class="text-white">					
						<div class="heading-indeks">IKS</div>
						<div class="number-skor">
							<?=idm_desimal($idm_skor[0]) ?>
						</div>
						
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-6">
		<div class="row">
			<div class="cardc bg-orange img-card box-primary-shadow">
				<div class="card-body">
					<div class="d-flex">
						<div class="text-white">					
							<div class="heading-indeks">IKE</div>
							<div class="number-skor">
								<?=idm_desimal($idm_skor[1]) ?>
							</div>
							
						</div>
						<div class="icon">
							<i class="fa fa-pie-chart"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-6">
		<div class="row">
			<div class="cardc bg-secondary img-card box-primary-shadow">
				<div class="card-body">
					<div class="d-flex">
						<div class="text-white">					
							<div class="heading-indeks">IKL</div>
							<div class="number-skor">
								<?=idm_desimal($idm_skor[2]) ?>
							</div>
							
						</div>
						<div class="icon">
							<i class="fa fa-area-chart"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-xs-6">
		<div class="row">
			<div class="cardc bg-success img-card box-primary-shadow">
				<div class="card-body">
					<div class="d-flex">
						<div class="text-white">					
							<div class="heading-indeks">IDM</div>
							<div class="number-skor">
								<?=idm_desimal($idm_skor[3]) ?>
							</div>
							
						</div>
						<div class="icon">
							<i class="fa fa-bar-chart"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="cfooter">
	<div class="csumber">
		<b>Status</b> : <b style="color: <?php

								if ($idm_skor[4] == 'Tertinggal')

								{
									echo "red";
								}

								else if ($idm_skor[4] == 'Berkembang')

								{
									echo "orange";
								}

								if ($idm_skor[4] == 'Maju')

								{
									echo "green";
								}

								?>"><?=$idm_skor[4] ?></b>
	</div>
</div>

