<script>
(function()
{
  var infoWindow;
  window.onload = function()
  {
    <?php if (!empty($desa['lat']) AND !empty($desa['lng'])): ?>
      var posisi = [<?=$desa['lat'].",".$desa['lng']?>];
      var zoom   = <?=$desa['zoom'] ?: 10?>;
    <?php elseif (!empty($desa['path'])): ?>
      var wilayah_desa = <?=$desa['path']?>;
      var posisi       = wilayah_desa[0][0];
      var zoom         = <?=$desa['zoom'] ?: 10?>;
    <?php else: ?>
      var posisi = [-8.2714784, 114.3019389];
      var zoom   = 10;
    <?php endif; ?>

    //Membuat peta, dan menyimpannya ke variabel 'peta' secara global
    var mymap = L.map('map').setView(posisi, zoom);

    //Menambahkan tile layer OSM ke peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
      id: 'mapbox.streets'
    }).addTo(mymap); //Menambahkan tile layer ke variabel 'peta'

    //Semua marker akan ditampung divariabel ini
    var semua_marker = [];

    //WILAYAH DESA
    <?php if ($layer_desa==1 AND !empty($desa['path'])): ?>
      //daerah_desa berupa kumpulan array berisi lat dan long
      //array polygon memiliki kedalaman 2 array [[latlong]]
      var daerah_desa = <?=$desa['path']?>;
      var jml = daerah_desa[0].length;

      //Titik awal dan titik akhir poligon harus sama
      daerah_desa[0].push(daerah_desa[0][0]);

      //TurfJS menangkap nilai lat dan long secara terbalik (long, lat)
      //Maka perlu dilakukan proses membalikan array agar menjadi (long, lat)
      for (var x = 0; x < jml; x++)
      {
        daerah_desa[0][x].reverse();
      }

      //Style polygon
      var style_polygon = {
          stroke: true,
          color: '#555555',
          opacity: 0.5,
          weight: 2,
          fillColor: '#8888dd',
          fillOpacity: 0.05
      };
      //Menambahkan poligon ke marker
      semua_marker.push(turf.polygon(daerah_desa, {content: "Wilayah Desa", style: style_polygon}))
      //Menambahkan point kantor desa
      semua_marker.push(turf.point([<?=$desa['lng'].",".$desa['lat']?>], {content: "Kantor Desa"}))
    <?php endif; ?>

    //WILAYAH ADMINISTRATIF - DUSUN RW RT
    <?php if ($layer_wilayah==1 AND !empty($wilayah)): ?>
      var path_wilayah_adm = JSON.parse('<?=addslashes(json_encode($wilayah))?>');
      var jml = path_wilayah_adm[0].length;
      var wil = {
          paths: path_<?=$wil['id']?>,
          map: map,
          strokeColor: '#00ff00',
          strokeOpacity: 0.5,
          strokeWeight: 2,
          <?php if ($wil['rw']==0 AND $wil['rw']==0): ?>
            fillColor: '#00ff00',
          <?php elseif ($wil['rw'] != 0 AND $wil['rt']==0): ?>
            fillColor: '#ffff00',
          <?php else: ?>
            fillColor: '#00ffff',
          <?php endif; ?>
            fillOpacity: 0.22
       };
    <?php endif; ?>

    //LOKASI DAN PROPERTI
    <?php if ($layer_lokasi == 1 AND !empty($lokasi)): ?>
      var daftar_lokasi = JSON.parse('<?=addslashes(json_encode($lokasi))?>');
      var jml = daftar_lokasi.length;
      var content;
      var foto;
      var path_foto = '<?= base_url()."assets/images/gis/point/"?>';
      var point_style = {
          iconSize: [32, 37],
          iconAnchor: [16, 37],
          popupAnchor: [0, -28],
      };

      for (var x = 0; x < jml; x++)
      {
        if (daftar_lokasi[x].lat)
        {
          point_style.iconUrl = path_foto+daftar_lokasi[x].simbol;
          if (daftar_lokasi[x].foto)
          {
            foto = '<td><img src="'+AmbilFotoLokasi(daftar_lokasi[x].foto)+'" class="foto_pend"/></td>';
          }
          else
            foto = '';
            content = '<div id="content">'+
                      '<div id="siteNotice">'+
                      '</div>'+
                      '<h1 id="firstHeading" class="firstHeading">'+daftar_lokasi[x].nama+'</h1>'+
                      '<div id="bodyContent">'+ foto +
                      '<p>'+daftar_lokasi[x].desk+'</p>'+
                      '</div>'+
                      '</div>';
            semua_marker.push(turf.point([daftar_lokasi[x].lng, daftar_lokasi[x].lat], {content: content,style: L.icon(point_style)}));
        }
      }
    <?php endif; ?>

    //AREA
    <?php if ($layer_area==1 AND !empty($area)): ?>
      //Style polygon
      var area_style = {
          stroke: true,
          color: '#555555',
          opacity: 0.5,
          weight: 1,
          fillColor: '#8888dd',
          fillOpacity: 0.22
      }
      var daftar_area = JSON.parse('<?=addslashes(json_encode($area))?>');
      var jml = daftar_area.length;
      var jml_path;
      var foto;
      var content_area;
      var lokasi_gambar = "<?= base_url().LOKASI_FOTO_AREA?>";

      for (var x = 0; x < jml;x++)
      {
        if (daftar_area[x].path)
        {
          daftar_area[x].path = JSON.parse(daftar_area[x].path)
          jml_path = daftar_area[x].path[0].length;
          for (var y = 0; y < jml_path; y++)
          {
            daftar_area[x].path[0][y].reverse()
          }
          if (daftar_area[x].foto)
          {
            foto = '<img src="'+lokasi_gambar+'sedang_'+daftar_area[x].foto+'" style=" width:200px;height:140px;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;border:2px solid #555555;"/>';
          }
          else
            foto = "";
            content_area =  '<div id="content">'+
                            '<div id="siteNotice">'+
                            '</div>'+
                            '<h1 id="firstHeading" class="firstHeading">'+daftar_area[x].nama+'</h1>'+
                            '<div id="bodyContent">'+ foto +
                            '<p>'+daftar_area[x].desk+'</p>'+
                            '</div>'+
                            '</div>';

            daftar_area[x].path[0].push(daftar_area[x].path[0][0])
            //Menambahkan point ke marker
            semua_marker.push(turf.polygon(daftar_area[x].path, {content: content_area, style: area_style}));
        }
      }
    <?php endif; ?>

    //Jika tidak ada centang yang dipilih, maka tidak perlu memproses geojson
    if (semua_marker.length != 0)
    {
      //Menjalankan geojson menggunakan leaflet
      var geojson = L.geoJSON(turf.featureCollection(semua_marker), {
      //Method yang dijalankan ketika marker diklik
      onEachFeature: function (feature, layer) {
        //Menampilkan pesan berisi content pada saat diklik
        layer.bindPopup(feature.properties.content);
        layer.bindTooltip(feature.properties.content);
      },
      //Method untuk menambahkan style ke polygon dan line
      style: function(feature)
      {
        if (feature.properties.style)
        {
          return feature.properties.style;
        }
      },
      //Method untuk menambahkan style ke point (titik marker)
      pointToLayer: function (feature, latlng)
      {
        if (feature.properties.style)
        {
          return L.marker(latlng, {icon: feature.properties.style});
        }
        else
          return L.marker(latlng);
        }
      }).addTo(mymap);

      //Mempusatkan tampilan map agar semua marker terlihat
      mymap.fitBounds(geojson.getBounds());
    }
  }; //EOF window.onload

  })();
</script>
<style>
  #map
  {
    width:100%;
    height:86vh
  }
  .form-group a
  {
    color: #FEFFFF;
  }
  .foto
  {
    width:200px;
    height:140px;
    border-radius:3px;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    border:2px solid #555555;
  }
  .icos
  {
    padding-top: 9px;
  }
  .foto_pend
  {
    width:70px;height:70px;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;
  }

</style>

<div class="content-wrapper">
  <div id="map"></div>
          <div class="row">
            <!-- page content -->
      <div class="halaman-arsip">
        <div class="col-md-5 col-sm-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title" style="color:#777">Informasi Kontak</h3>
            </div>
            <div class="box-body">
              <div class="head-kontak-desa text-center">
                <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?>
              </div>
              <div class="alamat-kontak-desa">
                <i class="fa fa-map-marker"></i> &nbsp;<?php echo $desa['alamat_kantor']?>
                <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?>
                <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $desa['nama_propinsi']?>
                <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kodepos <?php echo $desa['kode_pos']?>
              </div>
              <div class="telepon-kontak-desa">
                <i class="fa fa-phone"></i> &nbsp;Telepon : <?php echo $desa['telepon']?>
              </div>
              <div class="email-kontak-desa">
                <i class="fa fa-envelope"></i> Email : <?php echo $desa['email_desa']?>
              </div>
              <div class="web-kontak-desa">
                <i class="fa fa-globe"></i> &nbsp;<?php echo $desa['website']?>
              </div>
              <div class="social-kontak-desa">
                <a href="<?php echo $sosmed[nested_array_search('Facebook',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
          <a href="<?php echo $sosmed[nested_array_search('Twitter',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
          <a href="<?php echo $sosmed[nested_array_search('YouTube',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-youtube"></i></span></a>
          <a href="<?php echo $sosmed[nested_array_search('Instagram',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
          <a href="https://api.whatsapp.com/send?phone=<?php echo $sosmed[nested_array_search('WhatsApp',$sosmed)]['link']?>" target="_blank"><span><i class="fa fa-whatsapp"></i></span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-sm-12">
                    <div class="page-content">                        
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="color:#777">Balas Pesan</h3>
                            </div>
                            <div class="box-body">
                                      <?php if($this->session->flashdata('flash_message')){ ?>
            <?php echo $this->session->flashdata('flash_message'); ?>
        <?php } ?>
                               



Dari: <?=$chat['nama'] ?><br/>
              Email: <?=$chat['email'] ?><br/>
              Telepon: <?=$chat['no_hp'] ?><br/>
              Waktu: <?=tgl_indo2($chat['waktu']) ?><br/>
              IP-4: <?=$chat['ip4'] ?><br/>
              Device: <?=$chat['ua'] ?><br/>
              Perihal: <?=$chat['perihal'] ?><br/><br/>

              <?=$chat['isi'] ?><br/>

              <?php foreach ($chat['balasan'] as $balasan){ ?>
                <?php if(empty($balasan['admin'])): ?>
                  <?=$balasan['isi'] ?><br/>
                <?php else: ?>
                  <?=$balasan['isi'] ?>[*]<br/>
                <?php endif; ?>
              <?php } ?>
              <form method="post" id="replayForm" action="<?=site_url("kontak/balas") ?>/<?=$chat['token'] ?>">
                <input type="text" name="isi"/>

                <button type="submit">Balas</button>
              </form>







                            </div>
                        </div>
                    </div>
        </div>
        
        <!-- end content -->
      </div>
    </div>
</div>