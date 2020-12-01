<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- widget Statistik -->
<div class="widget-statistik">
    <div id="container_widget"></div>
</div>

<script type="text/javascript">
$(function() {
    var chart_widget;
    $(document).ready(function() {
        // Build the chart
        chart_widget = new Highcharts.Chart({
            chart: {
                renderTo: 'container_widget',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Jumlah Penduduk'
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                }
            },
			xAxis: {
            categories: 
            [ 
            <?php  foreach($stat_widget as $data){?>
              <?php if($data['jumlah'] != "-" AND $data['nama']!= "JUMLAH"){?>
                ['<?php echo $data['jumlah']?> <br> <?php echo $data['nama']?>'],
              <?php }?>
            <?php }?>
            ]
			},
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    colorByPoint: true
                },
                column: {
                    pointPadding: 0,
                    borderWidth: 0,
                    borderRadius: 5
                }
            },
            series: [{
                type: 'column',
                styledMode: true,
                name: 'Populasi',
                data: [
                    <?php  foreach($stat_widget as $data){?>
                    <?php if($data['jumlah'] != "-" AND $data['nama']!= "JUMLAH"){?>[
                        '<?php echo $data['nama']?>', <?php echo $data['jumlah']?>],
                    <?php }?>
                    <?php }?>
                ]
            }]
        });
    });

});
</script>
<script src="<?php echo base_url()?>/assets/js/highcharts/highcharts.js"></script>