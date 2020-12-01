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
$corona = json_decode(file_get_contents('http://api.kawalcorona.com'));
$positif = $aktif = $meninggal = $sembuh = 0;
$update = [];
foreach ($corona as $data) {
  $update[] = $data->attributes->Last_Update;
  $positif += $data->attributes->Confirmed;
  $aktif += $data->attributes->Active;
  $meninggal += $data->attributes->Deaths;
  $sembuh += $data->attributes->Recovered;
  if ($data->attributes->Country_Region == "Indonesia") {
    $indonesia = [
      "update" => $data->attributes->Last_Update,
      "positif" => $data->attributes->Confirmed,
      "aktif" => $data->attributes->Active,
      "meninggal" => $data->attributes->Deaths,
      "sembuh" => $data->attributes->Recovered
    ];
  }
}

$update = max($update);
// Corona Provinsi START
$propinsi = $this->db->select('kode_propinsi')->get('config')->row_array()['kode_propinsi'];
$corona = json_decode(file_get_contents('http://api.kawalcorona.com/indonesia/provinsi'));
foreach ($corona as $data) {
  if($data->attributes->Kode_Provi == $propinsi)
  {
    $coronaProvpinsi = (array) $data->attributes;
    break;
  }
}
?>
<div class="ctitle">Indonesia Covid-19 Global Data</div>
<div class="row">
	<div class="col-md-6 col-xs-6">
		<div class="row">
		<div class="cardc bg-danger img-card box-primary-shadow">
			<div class="card-body">
				<div class="d-flex">
					<div class="text-white">					
						<div class="heading-corona">Kasus</div>
						<div class="number-font">
							<b><?= number_format($indonesia["positif"],0,'', '.') ?></b> <span class="caption-corona">Orang</span>
						</div>
						
					</div>
					<div class="ml-auto emot">
						<img src="<?php echo base_url('assets/images/sad-u6e.png')?>" class="icon-emot" alt="Positif">
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
							<div class="heading-corona">Suspect</div>
							<div class="number-font">
								<b><?= number_format($indonesia["aktif"],0,'', '.') ?></b> <span class="caption-corona">Orang</span>
							</div>
							
						</div>
						<div class="ml-auto emot">
							<img src="<?php echo base_url('assets/images/mask.png') ?>" class="icon-emot" alt="Positif">
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
							<div class="heading-corona">Meninggal</div>
							<div class="number-font">
								<b><?= number_format($indonesia["meninggal"],0,'', '.') ?></b> <span class="caption-corona">Orang</span>
							</div>
							
						</div>
						<div class="ml-auto emot">
							<img src="<?php echo base_url('assets/images/crying.png') ?>" class="icon-emot" alt="Positif">
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
							<div class="heading-corona">Sembuh</div>
							<div class="number-font">
								<b><?= number_format($indonesia["sembuh"],0,'', '.') ?></b> <span class="caption-corona">Orang</span>
							</div>
							
						</div>
						<div class="ml-auto emot">
							<img src="<?php echo base_url('assets/images/happy-ipM.png') ?>" class="icon-emot" alt="Positif">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="provdata">
	<div class="row">
		<div class="hprovdata">Kasus Terkonfirmasi Covid-19 <?=$coronaProvpinsi["Provinsi"] ?></div>
		<div class="col-md-4 col-xs-4 bg-orange img-card box-primary-shadow text-center">
			<div class="lprovdata">Positif</div>
			<div class="gprovdata"><?= number_format($coronaProvpinsi["Kasus_Posi"],0,'', '.') ?> Org</div>
		</div>
		<div class="col-md-4 col-xs-4 bg-success img-card box-primary-shadow text-center">
			<div class="lprovdata">Sembuh</div>
			<div class="gprovdata"><?= number_format($coronaProvpinsi["Kasus_Semb"],0,'', '.') ?> Org</div>
		</div>
		<div class="col-md-4 col-xs-4 bg-secondary img-card box-primary-shadow text-center">
			<div class="lprovdata">Meninggal</div>
			<div class="gprovdata"><?= number_format($coronaProvpinsi["Kasus_Meni"],0,'', '.') ?> Org</div>
		</div>
	</div>
</div>
<div class="cfooter">
	<div class="csumber">
		<b>Sumber</b> : <a href="https://www.kawalcorona.com" target="_blank" style="color: #429dea">Kawal Corona</a>
	</div>
	<div class="cdupdate">
		<b>Tanggal Update</b> : <span style="color: red"><?= date("d F Y", $indonesia["update"]/1000) ?></span>
	</div>
	<div class="ctupdate">
		<b>Jam Update</b> : <span style="color: red"><?= date("H:m:s", $indonesia["update"]/1000) ?> WIB</span>
	</div>
	<div class="ctupdate">
		<b>#BersatuMelawanCorona</b>
	</div>
</div>

