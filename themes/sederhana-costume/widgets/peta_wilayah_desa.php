<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxsKE9ArOZcaNtsfXIMFqr4N-UCsmp-Ng&callback=initMap"
    defer
></script>

<script>
var map
var kantorDesa
function initMap() {
    <?php if (!empty($data_config['lat']) && !empty($data_config['lng'])): ?>
        var center = {
            lat: <?=$data_config['lat']?>,
            lng: <?=$data_config['lng']?>
        }
    <?php else: ?>
        var center = {
            lat: -1.0546279422758742,
            lng: 116.71875000000001
        }
    <?php endif; ?>
        
    var zoom = 15
    //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
    map = new google.maps.Map(document.getElementById("map-wilayah-desa"), { center, zoom });

    kantorDesa = new google.maps.Marker({
        position: center,
        map: map,
        title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?>'
    });

    <?php if (!empty($data_config['path'])): ?>
        let polygon_desa = <?= $data_config['path']; ?>;
        
        polygon_desa[0].map((arr, i) => {
            polygon_desa[i] = { lat: arr[0], lng: arr[1] }
        })
        
        //Style polygon
        var batasWilayah = new google.maps.Polygon({
            paths: polygon_desa,
            strokeColor: '#555555',
            strokeOpacity: 0.5,
            strokeWeight: 1,
            fillColor: '#007bb5',
            fillOpacity: 0.25
        });

        batasWilayah.setMap(map)
    <?php endif; ?>
}
</script>

<!-- widget Peta Wilayah Desa -->
<div class="widget-wilayah_desa">
    <div id="map-wilayah-desa" style="height: 200px"></div>
</div>