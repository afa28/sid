<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$penduduk = $this->db->query('SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE status_dasar = 1')->result_array()[0]['jumlah'];
?>

<?php $penduduk_l = $this->db->query('SELECT COUNT(id) AS jumlah_l FROM tweb_penduduk WHERE sex = 1')->result_array()[0]['jumlah_l'];
?>

<?php $penduduk_p = $this->db->query('SELECT COUNT(id) AS jumlah_p FROM tweb_penduduk WHERE sex = 2')->result_array()[0]['jumlah_p'];
?>

<?php $keluarga = $this->db->query('SELECT COUNT(id) AS jumlah FROM tweb_keluarga')->result_array()[0]['jumlah'];
?>

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
          fillColor: '#18bc9c'
      };
      //Menambahkan poligon ke marker
      semua_marker.push(turf.polygon(daerah_desa, {content: "<b>Wilayah <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></b><br /><?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?><br /><?php echo $desa['nama_propinsi']?> - <?php echo $desa['kode_pos']?><br /><br /><b>Populasi :</b><br />&nbsp;<i class='fa fa-male'></i> Laki-laki: <?= number_format($penduduk_l,0,'', '.')?> Jiwa<br />&nbsp;<i class='fa fa-female'></i> Perempuan: <?= number_format($penduduk_p,0,'', '.')?> Jiwa<br />&nbsp;<i class='fa fa-user'></i> Total Penduduk: <?= number_format($penduduk,0,'', '.')?> Jiwa<br /><i class='fa fa-users'></i> Kepala Keluarga <?= number_format($keluarga,0,'', '.')?> Jiwa", style: style_polygon}))
      //Menambahkan point kantor desa
      semua_marker.push(turf.point([<?=$desa['lng'].",".$desa['lat']?>], {content: "<b>Kantor <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></b><br /><?php echo $desa['alamat_kantor']?><br /><?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?><br /><?php echo $desa['nama_propinsi']?> - <?php echo $desa['kode_pos']?><br />Telepon : <?php echo $desa['telepon']?><br />Email : <?php echo $desa['email_desa']?><br />"}))
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

 <?php if ($layer_garis==1 AND !empty($garis)): ?>


      //Style polygon
      var garis_style = {
          stroke: true,
          color: '#555555',
          opacity: 0.5,
          weight: 1,
          fillColor: '#8888dd',
          fillOpacity: 0.22
      }
      var daftar_garis = JSON.parse('<?=addslashes(json_encode($garis))?>');
      var jml = daftar_garis.length;
      var jml_path;
      var foto;
      var content_garis;
      var lokasi_gambar = "<?= base_url().LOKASI_FOTO_garis?>";

      for (var x = 0; x < jml;x++)
      {
        if (daftar_garis[x].path)
        {
          daftar_garis[x].path = JSON.parse(daftar_garis[x].path)

          if (daftar_garis[x].foto)
          {
            foto = '<img src="'+lokasi_gambar+'sedang_'+daftar_garis[x].foto+'" style=" width:200px;height:140px;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;border:2px solid #555555;"/>';
          }
          else
            foto = "";
            content_garis =  '<div id="content">'+
                            '<div id="siteNotice">'+
                            '</div>'+
                            '<h1 id="firstHeading" class="firstHeading">'+daftar_garis[x].nama+'</h1>'+
                            '<div id="bodyContent">'+ foto +
                            '<p>'+daftar_garis[x].desk+'</p>'+
                            '</div>'+
                            '</div>';



            //Menambahkan point ke marker
            L.polyline(daftar_garis[x].path, {content: content_garis, style: garis_style})

            .bindPopup(content_garis)

            .addTo(mymap);
        }
      }
 <?php endif ?>

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
            foto = '<td><img src="'+AmbilFotoLokasi(daftar_lokasi[x].foto)+'" class="foto"/></td>';
          }
          else
            foto = '';
            content = '<div id="content">'+
                      '<div id="siteNotice">'+
                      '</div>'+
                      '<div id="bodyContent">'+ foto +
                      '<div id="firstHeading" class="firstHeading">'+daftar_lokasi[x].nama+'</div>'+
                      '<div class="desk">'+daftar_lokasi[x].desk+'</div>'+
                      '</div>'+
                      '</div>';
            semua_marker.push(turf.point([daftar_lokasi[x].lng, daftar_lokasi[x].lat], {content: content,style: L.icon(point_style)}));
        }
      }
    <?php endif; ?>

    //AREA
    <?php if ($layer_area==1 AND !empty($area)): ?>
      //Style polygon
      var area_stylePlaceholder = {
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

        var area_style = {};

        Object.assign(area_style, area_stylePlaceholder);

        if (daftar_area[x].warna) {

          area_style.fillColor = daftar_area[x].warna
        }

        else {

          area_style.fillColor = area_stylePlaceholder.fillColor
        }

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
                            '<div id="firstHeading" class="firstHeading">'+daftar_area[x].nama+'</div>'+
                            '<div id="bodyContent">'+
                            '<div class="desk-area">'+daftar_area[x].desk+'</div>'+
                            '</div>'+
                            '</div>';

            daftar_area[x].path[0].push(daftar_area[x].path[0][0])
            //Menambahkan point ke marker
            semua_marker.push(turf.polygon(daftar_area[x].path, {content: content_area, style: area_style}));
        }
      }
    <?php endif; ?>

    //PENDUDUK
    <?php if ($layer_penduduk==1 OR $layer_keluarga==1 AND !empty($penduduk)): ?>
      //Data penduduk
      var penduduk = JSON.parse('<?=addslashes(json_encode($penduduk))?>');
      var jml = penduduk.length;
      var foto;
      var content;
      var point_style = L.icon({
          iconUrl: '<?= base_url()."assets/images/gis/point/pend.png"?>',
          iconSize: [32, 37],
          iconAnchor: [16, 37],
          popupAnchor: [0, -28],
      });
      for (var x = 0; x < jml;x++)
      {
        if (penduduk[x].lat || penduduk[x].lng)
        {
          //Jika penduduk ada foto, maka pakai foto tersebut
          //Jika tidak, pakai foto default
          if (penduduk[x].foto)
          {
            foto = '<td><img src="'+AmbilFoto(penduduk[x].foto)+'" class="foto_pend"/></td>';
          }
          else
            foto = '<td><img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="foto_pend"/></td>';

          //Konten yang akan ditampilkan saat marker diklik
          content =   '<table border=0><tr>' + foto +
                      '<td style="padding-left:2px"><font size="2.5" style="bold">'+penduduk[x].nama+'</font> - '+penduduk[x].sex+
                      '<p>'+penduduk[x].umur+' Tahun '+penduduk[x].agama+'</p>'+
                      '<p>'+penduduk[x].alamat+'</p>'+
                      '<p><a href="<?=site_url("penduduk/detail/1/0/")?>'+penduduk[x].id+'" target="ajax-modalx" rel="content" header="Rincian Data '+penduduk[x].nama+'" >Data Rincian</a></p></td>'+
                      '</tr></table>';
          //Menambahkan point ke marker
          semua_marker.push(turf.point([Number(penduduk[x].lng), Number(penduduk[x].lat)], {content: content, style: point_style}));
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
    height:86vh;
    border-radius: 5px;
    border: 1px solid #ddd;
  }
  .form-group a
  {
    color: #FEFFFF;
  }
  .foto
  {
    width:230px;
    height:140px;
    border-radius:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:3px;
  }
  .firstHeading {
    padding: 5px 0;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: 'Arial', sans-serif;
  }
  .bodyContent .desk {
    font-size: 13px;
  }
  .icos
  {
    padding-top: 9px;
  }
  .foto_pend
  {
    width:70px;
    height:70px;
    border-radius:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
  }

</style>
<div class="content-wrapper">
  <form id="mainform" name="mainform" action="" method="post">
    <div class="row">
      <div class="col-md-12">
        <div class="map-blok">
        <div id="map">
          <div class="leaflet-top leaflet-right">
            <div class="leaflet-control-layers leaflet-bar leaflet-control">
              <a class="leaflet-control-control icos" href="#" title="Legenda" role="button" aria-label="Legenda" onclick="$('#target2').toggle();$('#target2').removeClass('hidden');$('#target1').hide();"><i class="fa fa-list"></i></a>
            </div>
            <div id="target2" class="leaflet-control-layers leaflet-control-layers-expanded leaflet-control hidden" aria-haspopup="true" style="max-height: 315px;">
              <div class="leaflet-control-layers-overlays">
                <div class="leaflet-control-layers-group" id="leaflet-control-layers-group-3">
                  <span class="leaflet-control-layers-group-name">LEGENDA</span>
                  <div class="leaflet-control-layers-separator"></div>
                  <label>
                    <input type="checkbox" name="layer_desa" value="1"onchange="handle_desa(this);" <?php if ($layer_desa==1): ?>checked<?php endif; ?>>
                    <span> <?= ucwords($this->setting->sebutan_desa)?></span>
                  </label>
                  <label>
                    <input type="checkbox" name="layer_wilayah" value="1"onchange="handle_wil(this);" <?php if ($layer_wilayah==1): ?>checked<?php endif; ?>>
                    <span> Wilayah Administratif</span>
                  </label>
                  <label>
                    <input type="checkbox" name="layer_area" value="1"onchange="handle_area(this);" <?php if ($layer_area==1): ?>checked<?php endif; ?>>
                    <span> Area</span>
                  </label>
                                    <label>
                    <input type="checkbox" name="layer_garis" value="1"onchange="handle_garis(this);" <?php if ($layer_garis==1): ?>checked<?php endif; ?>>
                    <span> Garis</span>
                  </label>
                  <label>
                    <input type="checkbox" name="layer_lokasi" value="1"onchange="handle_lokasi(this);" <?php if ($layer_lokasi==1): ?>checked<?php endif; ?>>
                    <span> Lokasi/Properti Desa </span>
                  </label>
                </div>
              </div>
              <script>
                function handle_pend(cb)
                {
                  formAction('mainform', '<?=site_url('gis')?>/layer_penduduk');
                }
                function handle_kel(cb)
                {
                  formAction('mainform', '<?=site_url('gis')?>/layer_keluarga');
                }
                function handle_desa(cb)
                {
                  formAction('mainform', '<?=site_url('gis')?>/layer_desa');
                }
                function handle_wil(cb)
                {
                  formAction('mainform', '<?=site_url('gis')?>/layer_wilayah');
                }
                function handle_area(cb)
                {
                  formAction('mainform', '<?=site_url('gis')?>/layer_area');
                }
                function handle_lokasi(cb)
                {
                  formAction('mainform', '<?=site_url('gis')?>/layer_lokasi');
                }
                function AmbilFoto(foto, ukuran = "kecil_")
                {
                  ukuran_foto = ukuran || null
                  file_foto = '<?= base_url().LOKASI_USER_PICT;?>'+ukuran_foto+foto;
                  return file_foto;
                }
                function AmbilFotoLokasi(foto, ukuran = "kecil_")
                {
                  ukuran_foto = ukuran || null
                  file_foto = '<?= base_url().LOKASI_FOTO_LOKASI;?>'+ukuran_foto+foto;
                  return file_foto;
                }
              </script>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </form>
</div>
