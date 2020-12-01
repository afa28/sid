<div class="content-wrapper">
	<section class="content-header">
		<div class="page-header">Indeks Desa Membangun Tahun <?php echo isset($_GET['tahun']) ? $_GET['tahun'] : date('Y'); ?></div>
		<div class="select-tahun">
			<form id="main" method="get">
				<select class="form-control select2 " id="nik" name="tahun" onchange="formAction('main')">
						<option selected="selected">Tahun</option>
					<?php for ($i = date('Y'); $i >= 2019; $i -= 1): ?>
						<option value="<?=$i ?>"><?=$i ?></option>
					<?php endfor; ?>
				</select>
			</form>
		</div>
	</section>

	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box-info">
					<div class="box-header with-border">
						<form id="main" method="get">
							<div class="row">
								<div class="col-sm-6">
								</div>
							</div>
						</form>
						<div class="row">
							<div class="col-md-6">
								<div class="idm-poin">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<td class="label-idm">Indeks Ketahanan Sosial (IKS)</td>
												<td class="text-center" width="2%">:</td>
												<td class="idm-skor"><?=$idm_skor[0] ?></td>
											</tr>
											<tr>
												<td class="label-idm">Indeks Ketahanan Ekonomi (IKE)</td>
												<td class="text-center" width="2%">:</td>
												<td class="idm-skor"><?=$idm_skor[1] ?></td>
											</tr>
											<tr>
												<td class="label-idm">Indeks Ketahanan Lingkungan (IKL)</td>
												<td class="text-center" width="2%">:</td>
												<td class="idm-skor"><?=$idm_skor[2] ?></td>
											</tr>
											<tr>
												<td class="label-idm">Indeks Desa Membangun (IDM)</td>
												<td class="text-center" width="2%">:</td>
												<td class="idm-skor"><?=$idm_skor[3] ?></td>
											</tr>
											<tr>
												<td class="label-idm">Status</td>
												<td class="text-center" width="2%">:</td>
												<td class="idm-skor">
													<span class="badge <?php
													if ($idm_skor[4] == 'Tertinggal')
													{
														echo "bg-red";
													}
													else if ($idm_skor[4] == 'Berkembang')
													{
														echo "bg-orange";
													}
													if ($idm_skor[4] == 'Maju')
													{
														echo "bg-green";
													}
													?>"><?=$idm_skor[4] ?></span>
												</td>
											</tr>										
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div id="piechart_status"></div>
							</div>
						</div>
					</div>
					<div class="box-body" style="padding: 20px 20px 15px 20px;">
					<?php $row = $idm_data['mapData']['ROW'] ?>
						<div class="table-responsive">
							<table class="table table-bordered table-striped dataTable table-hover">
								<thead class="bg-gray disabled color-palette">
									<tr>	
										<?php foreach ($row[0] as $key => $value): ?>
											<td>
												<?=$key ?>
											</td>
										<?php endforeach; ?>	
									</tr>
								</thead>		
								<?php foreach ($row as $baris): ?>
									<tr>			
									<?php foreach ($row[0] as $key => $value): ?>
										<td class="<?php echo empty($baris['NO']) ? 'bg-green' : '' ?>" style="padding:10px 5px;">
									<?=$baris[$key] ?>
									</td>			
									<?php endforeach ?>			
									</tr>		
								<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<script src="<?php echo base_url(); ?>assets/js/amcharts/core.js"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/charts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/amcharts/animated.js"></script>
<script>
	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("piechart_status", am4charts.PieChart);

	// Add data
	chart.data = [{
  		"series": "IKS",
  		"point": <?=$idm_skor[0] ?>
	}, {
  		"series": "IKS",
  		"point": <?=$idm_skor[1] ?>
	}, {
  		"series": "IKS",
  		"point": <?=$idm_skor[2] ?>
	}];

	// Add and configure Series
	var pieSeries = chart.series.push(new am4charts.PieSeries());
	pieSeries.dataFields.value = "point";
	pieSeries.dataFields.category = "series";
	pieSeries.innerRadius = am4core.percent(50);
	pieSeries.ticks.template.disabled = false;
	pieSeries.labels.template.disabled = false;
	pieSeries.labels.template.text = "[bold {color}]{series} [bold {color}]{point}"

	let rgm = new am4core.RadialGradientModifier();
	rgm.brightnesses.push(-0.8, -0.8, -0.5, 0, - 0.5);
	pieSeries.slices.template.fillModifier = rgm;
	pieSeries.slices.template.strokeModifier = rgm;
	pieSeries.slices.template.strokeOpacity = 0.4;
	pieSeries.slices.template.strokeWidth = 0;

	// Legend
	chart.legend = new am4charts.Legend();
	chart.legend.position = "right";
	chart.legend.useDefaultMarker = false;
	let marker = chart.legend.markers.template.children.getIndex(0);
	marker.cornerRadius(12, 12, 12, 12);
	marker.strokeWidth = 2;
	marker.strokeOpacity = 1;
	marker.stroke = am4core.color("#ccc");
	chart.legend.labels.template.text ="[bold {color}]{series}: [bold {color}]{point}";

	pieSeries.slices.template.events.on("validated", function(event){
	    var gradient = event.target.fillModifier.gradient
	    gradient.rotation = event.target.middleAngle + 90;

	    var gradient2 = event.target.strokeModifier.gradient
	    gradient2.rotation = event.target.middleAngle + 90; 
	})
</script>