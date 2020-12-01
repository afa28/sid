<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/highcharts/highcharts-3d.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/highcharts/highcharts-more.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/highcharts/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/highcharts/export-data.js"></script>

<?php if($tipe==1){?>
	<script type="text/javascript">
		$(function () {
			var chart;
			$(document).ready(function () {
				Highcharts.setOptions({
					lang: {
						decimalPoint: ',',
						thousandsSep: '.'
					}
				});
				Highcharts.chart('container', {
				    chart: {
				        type: 'column',
				        options3d: {
				            enabled: true,
				            alpha: 0,
				            beta: 45,
				            depth: 50
				        }
				    },				    
				    title: {
				        text: ['Grafik Data Demografi Berdasar <?php echo $heading ?>']
				    },
				    plotOptions: {
				    	series: {
							colorByPoint: true
						},
				        column: {
				            depth: 25
				        }
				    },
				    xAxis: {
				        categories: [
						<?php  $i=0;foreach($stat as $data){$i++;?>
							<?php if($data['jumlah'] != "-" AND $data['nama']!= "TOTAL" AND $data['nama']!= "JUMLAH"){echo "'$i',";}?>
						<?php }?>
						]
				    },
				    yAxis: {
				        title: {
				            text: null
				        }
				    },
				    series: [{
						type: 'column',
						name: 'Jumlah',
						shadow:1,
						border:1,
						data: [
						<?php  foreach($stat as $data){?>
							<?php if($data['jumlah'] != "-" AND $data['nama']!= "TOTAL" AND $data['nama']!= "JUMLAH"){?>
								['<?php echo $data['nama']?>',<?php echo $data['jumlah']?>],
							<?php }?>
						<?php }?>
						]
					}]
				});
			});
		});
	</script>
<?php }else{?>

	<script type="text/javascript">
		$(function () {
			var chart;

			$(document).ready(function () {

    	// Build the chart
		Highcharts.setOptions({
			lang: {
				decimalPoint: ',',
				thousandsSep: '.'
			}
		});
    	Highcharts.chart('container', {
		    chart: {
		        type: 'pie',
		        options3d: {
		            enabled: true,
		            alpha: 45
		        }
		    },
		    title: {
		        text: ['Grafik Data Demografi Berdasar <?php echo $heading ?>']
		    },
		    plotOptions: {
		        pie: {
		            allowPointSelect: true,
		            cursor: 'pointer',
		            innerSize: 100,
				    depth: 45,
		        }
		    },
		    series: [{
		        type: 'pie',
    			name: 'Jumlah',
    			shadow:1,
    			border:1,
    			data: [
    			<?php  foreach($stat as $data){?>
    				<?php if($data['jumlah'] != "-" AND $data['nama']!= "TOTAL" AND $data['nama']!= "JUMLAH"){?>
    					['<?php echo $data['nama']?>',<?php echo $data['jumlah']?>],
    				<?php }?>
    			<?php }?>
    			]
		    }]
		});
    });

		});
	</script>
<?php }?>

<style>
tr.lebih{
	display:none;
}
</style>
<script>
	$(function(){
		$('#showData').click(function(){
			$('tr.lebih').show();
			$('#showData').hide();
		});
	});
</script>
<?php

echo "
<div class=\"box-statistik\">
<div class=\"box-header with-border\">
<div class=\"box-tools pull-right\">
<div class='btn-group'>";
$strC = ($tipe==1)? "btn-info":"btn-default";
echo "<a href=\"".site_url("statistik/$st/1")."\" class=\"btn ".$strC." btn-sm\">Bar Graph</a>";
$strC = ($tipe==0)? "btn-info":"btn-default";
echo "<a href=\"".site_url("statistik/$st/0")."\" class=\"btn ".$strC." btn-sm\">Pie Cart</a>
</div>
</div>
</div>
<div class=\"body-statistik\">
<div id=\"container\"></div>
<div id=\"contentpane\">
<div class=\"ui-layout-north panel top\"></div>
</div>
</div>
</div>

<div class=\"box-statistik\">
<div class=\"box-header with-border\">
<div class=\"box-title\">Tabel Data Demografi Berdasar ". $heading."</div>
</div>
<div class=\"body-statistik\">
<div class=\"table-responsive\">
<table class=\"table table-striped table-bordered\">
<thead>
<tr>
<th rowspan=\"2\" class=\"text-center uppercase\" width=\"30\">No</th>
<th rowspan=\"2\" class=\"text-left uppercase\">Kelompok</th>
<th colspan=\"2\" class=\"text-center uppercase\">Jumlah</th>";
if($jenis_laporan == 'penduduk'){
	echo "<th colspan=\"2\" class=\"text-center uppercase\">Laki-laki</th>
	<th colspan=\"2\" class=\"text-center uppercase\">Perempuan</th>";
}
echo "
</tr>
<tr>
<th class=\"text-center uppercase\">Jumlah</th><th class=\"text-center uppercase\">Persentase</th>";
if($jenis_laporan == 'penduduk'){
	echo "<th class=\"text-center uppercase\">Jumlah</th><th class=\"text-center uppercase\">Persentase</th>
	<th class=\"text-center uppercase\">Jumlah</th><th class=\"text-center uppercase\">Persentase</th>";
}
echo "
</tr>
</thead>
<tbody>";
$i=0; $l=0; $p=0;
$hide="";$h=0;
$jm = count($stat);
foreach($stat as $data){
	$h++;
	if($h > 10 AND $jm > 11)$hide="lebih";
	echo "<tr class=\"$hide\">
	<td class=\"text-center\">".$data['no']."</td>
	<td>".$data['nama']."</td>
	<td class=\"text-center\">".$data['jumlah']."</td>
	<td class=\"text-center\">".$data['persen']."</td>";
	if($jenis_laporan == 'penduduk'){
		echo "<td class=\"text-center\">".$data['laki']."</td>
		<td class=\"text-center\">".$data['persen1']."</td>
		<td class=\"text-center\">".$data['perempuan']."</td>
		<td class=\"text-center\">".$data['persen2']."</td>";
	}
	echo "</tr>";
	$i=$i+$data['jumlah'];
	$l=$l+$data['laki']; $p=$p+$data['perempuan'];
}
echo "
</tbody>
</table>";
if($hide=="lebih"){
	echo "
	
	<button class='btn btn-sm btn-info btn-statistik' id='showData'>Selengkapnya...</button>
	";
}

echo "
</div>
</div>
</div>";
