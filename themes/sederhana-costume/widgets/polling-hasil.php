<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<p><strong>HASIL POLLING</strong></p>
<script src="<?php echo base_url(); ?>assets/js/highcharts/chart.js"></script>
<canvas id="pollingHasil"></canvas>
<?php foreach( $data_pilihan as $key => $row )

    {
        $data['labels'][] =  $row['nama'];

        $data['datasets'][] = $this->poll->count_vote( $row['id'] );
    }

?>

<script >
    //doughnut
var ctxD = document.getElementById("pollingHasil").getContext('2d');
var myLineChart = new Chart(ctxD, {
type: 'doughnut',
data: {
labels: <?php echo json_encode($data['labels']); ?>,
datasets: [{
data: <?php echo json_encode($data['datasets']); ?>,
backgroundColor: ["#0A9616", "#18BC9C", "#0273FF", "#E74C3C", "#4D5360"],
hoverBackgroundColor: ["#4ED059", "#79ECD6", "#83B4F1", "#F9A49B", "#616774"],
}]
},
options: {
responsive: true
}
});
</script>
<div class="text-center bold">Total Vote: <?=$total_vote?></div><hr/>