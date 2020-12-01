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
  

























  <div id="map">
          <div class="leaflet-top leaflet-right">
            <div id="target1" class="leaflet-control-layers leaflet-control-layers-expanded leaflet-control hidden" aria-haspopup="true" style="max-width: 250px;">
              <div class="leaflet-control-layers-overlays">
                <div class="leaflet-control-layers-group" id="leaflet-control-layers-group-2">
                  <span class="leaflet-control-layers-group-name">CARI PENDUDUK</span>
                  <div class="leaflet-control-layers-separator"></div>
                  <div class="form-group">
                    <label>Status Penduduk</label>
                    <select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url('gis/filter')?>')">
                      <option value="">Status</option>
                      <option value="1" <?php if ($filter==1): ?>selected<?php endif ?>>Aktif</option>
                      <option value="2" <?php if ($filter==2): ?>selected<?php endif ?>>Pasif</option>
                      <option value="2" <?php if ($filter==3): ?>selected<?php endif ?>>Pendatang</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control input-sm " name="sex" onchange="formAction('mainform','<?= site_url('gis/sex')?>')">
                      <option value="">Jenis Kelamin</option>
                      <option value="1" <?php if ($sex==1): ?>selected<?php endif ?>>Laki-laki</option>
                      <option value="2" <?php if ($sex==2): ?>selected<?php endif ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Dusun</label>
                    <select class="form-control input-sm " name="dusun" onchange="formAction('mainform','<?= site_url('gis/dusun')?>')">
                      <option value=""><?=ucwords($this->setting->sebutan_dusun)?></option>
                      <?php foreach ($list_dusun AS $data): ?>
                        <option <?php if ($dusun==$data['dusun']): ?>selected<?php endif ?> value="<?=$data['dusun']?>"><?=$data['dusun']?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <?php if ($dusun): ?>
                    <div class="form-group">
                      <label>RW</label>
                      <select class="form-control input-sm " name="rw" onchange="formAction('mainform','<?= site_url('gis/rw')?>')">
                        <option value="">RW</option>
                        <?php foreach ($list_rw AS $data): ?>
                          <option <?php if ($rw==$data['rw']): ?>selected<?php endif ?>><?=$data['rw']?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <?php if ($rw): ?>
                      <div class="form-group">
                        <label>RT</label>
                        <select class="form-control input-sm " name="rt" onchange="formAction('mainform','<?= site_url('gis/rt')?>')">
                          <option value="">RT</option>
                          <?php foreach ($list_rt AS $data): ?>
                            <option <?php if ($rt==$data['rt']): ?>selected<?php endif ?>><?=$data['rt']?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                  <div class="col-sm-12">
                    <div class="form-group row">
                      <label>Cari</label>
                      <div class="box-tools">
                        <div class="input-group input-group-sm pull-right">
                          <input name="cari_kontak" id="cari" class="form-control" placeholder="cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?=site_url("gis/search")?>');$('#'+'mainform').submit();endif">
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("gis/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <a  href="<?=site_url("gis/ajax_adv_search")?>" class="btn btn-block btn-social bg-olive btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pencarian Spesifik" title="Pencarian Spesifik">
                      <i class="fa fa-search"></i> Pencarian Spesifik
                    </a>
                    <a href="<?=site_url("gis/clear")?>" class="btn btn-block btn-social bg-orange btn-sm">
                      <i class="fa fa-refresh"></i> Bersihkan
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div id="target2" class="leaflet-control-layers leaflet-control-layers-expanded leaflet-control hidden" aria-haspopup="true" style="max-height: 315px;">
              <div class="leaflet-control-layers-overlays">
                <div class="leaflet-control-layers-group" id="leaflet-control-layers-group-3">
                  <span class="leaflet-control-layers-group-name">LEGENDA</span>
                  <div class="leaflet-control-layers-separator"></div>
                  <label>
                    <input class="leaflet-control-layers-selector" type="checkbox" name="layer_penduduk" value="1" onchange="handle_pend(this);" <?php if ($layer_penduduk==1): ?>checked<?php endif; ?>>
                    <span> Penduduk </span>
                  </label>
                  <label>
                    <input class="leaflet-control-layers-selector" type="checkbox" name="layer_keluarga" value="1" onchange="handle_kel(this);" <?php if ($layer_keluarga==1): ?>checked<?php endif; ?>>
                    <span> Keluarga</span>
                  </label>
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













        
    <div class="row">
      <!-- page content -->
      <div class="halaman-arsip">
        <div class="col-md-4 col-sm-12">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title" style="color:#777"><?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></div>
            </div>
            <div class="kontak-body"> 
              <div class="data-kontak-desa">
                <i class="fa fa-map-marker"></i> &nbsp;<?php echo $desa['alamat_kantor']?>
                <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?>
                <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $desa['nama_propinsi']?>
                <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kodepos <?php echo $desa['kode_pos']?>
              </div>
              <div class="data-kontak-desa">
                <i class="fa fa-phone"></i> &nbsp;Telepon : <a href="tel:<?php echo $desa['telepon']?>"><?php echo $desa['telepon']?></a>
              </div>
              <div class="data-kontak-desa">
                <i class="fa fa-envelope"></i> Email : <?php echo $desa['email_desa']?>
              </div>
              <div class="data-kontak-desa">
                <i class="fa fa-globe"></i> &nbsp;<a href="<?php echo $desa['website']?>"><?php echo $desa['website']?></a>
              </div>
              <div class="social-kontak-desa">
                <?php foreach ($sosmed As $data): ?>
                  <?php if (!empty($data["link"])): ?>
                    <a href="<?= $data['link']?>" target="_blank">
                      <img src="<?= base_url().'assets/front/'.$data['gambar'] ?>" alt="<?= $data['nama'] ?>"/>
                    </a>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-12">
          <div class="page-content">                        
              <div class="box">
                <div class="box-header">
                  <div class="box-title" style="color:#777">Formulir Kontak</div>
                </div>
                <div class="box-body">

                  <?php if($_SESSION['sukses'] === 1): ?>
                    <?php $_SESSION['sukses'] = 0 ?>
                    <div class="block-success">
                  <div class="text-center"><i class="ti-check-box" style="color: #60ce44; font-size: 90px;"></i><br />
                    Terimakasih telah mengirim pesan.<br />
                    Kami akan segera membalas atau menindaklanjuti pesan anda.
                  </div>
                </div>
                  <?php else: ?>





                  <?php if($this->session->flashdata('flash_message')){ ?>
                    <?php echo $this->session->flashdata('flash_message'); ?>
                  <?php } ?>
                  <form action="<?=base_url('kontak/store') ?>" method="post">
                    <div class="form-group col-md-12">
                      <label for="InputName">Nama:</label>
                      <input name="nama" type="text" class="form-control input-sm" id="InputName" placeholder="Rizky Fajar Prayoga">
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label for="InputEmail">Email:</label>
                        <input name="email" type="email" class="form-control input-sm" id="InputEmail" placeholder="rizky.yoga@gmail.com">
                      </div>
                      <div class="col-md-4">
                        <label for="InputPhone">Nomor HP:</label>
                        <input name="no_hp" type="number" class="form-control" id="InputPhone" type="tel" pattern="^\d{4}-\d{4}-\d{4}$" required placeholder="081234567890">
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="InputSubject">Perihal:</label>
                      <select name="hal" class="form-control input-sm" id="InputSubject" >
                       <?php foreach ($kontak_hal as $kontak_hal_id => $kontak_hal_nama): ?>
                         <option value="<?=$kontak_hal_id ?>"><?=$kontak_hal_nama ?></option>
                      <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="InputTitle">Judul:</label>
                      <input name="judul" type="text" class="form-control" id="InputTitle" placeholder="Judul Pesan">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="InputContent">Isi Pesan:</label>
                      <textarea name="isi" class="form-control" id="InputContent" rows="8"></textarea>
                    </div>
                    <div class="form-group col-md-8">
                    <img onclick="document.getElementById('captcha').src = '<?= base_url()."securimage/securimage_show.php?"?>' + Math.random(); return false" id="captcha" src="<?= base_url().'securimage/securimage_show.php'?>" alt="CAPTCHA Image" />
                    </div>
                    <div class="form-group col-md-4">
                      <p>Klik gambar untuk mengganti</p>
                    </div>
                    <div class="form-group captcha_code col-md-4">
                        <input autocomplete="off" type="text" class="form-control" name="captcha_code" maxlength="6"
                        value="<?= $_SESSION['post']['captcha_code']?>" placeholder="Tulis kode yg ada digambar"
                        required="" />
                    </div>
                    <div class="form-group col-md-12">
                      <button class="btn btn-info btn-sm" style="border-radius:0;">Kirim Pesan</button>
                    </div>
                  </form>   

                  <?php endif ?>  
                </div>
              </div>
            </div>
        </div>
        
        <!-- end content -->
      </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            let toggleCat = (val) => {
                if (val == 0) {
                    $('#potensi_produk').show()
                } else {
                    $('#potensi_produk').hide()
                    $('input[name=nama_produk]').removeAttr('required')
                    $('input[name=pengelola_produk]').removeAttr('required')
                    $('input[name=kontak_pengelola]').removeAttr('required')
                }
            }
            tinymce.init({
                selector: 'textarea',
                height: 300,
                theme: 'modern',
                plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
                image_advtab: true,
                external_filemanager_path: "<?=base_url()?>assets/filemanager/",
                filemanager_title: "Responsive Filemanager",
                filemanager_access_key: "<?=config_item('file_manager')?>",
                external_plugins: {
                    "filemanager": "<?=base_url()?>assets/filemanager/plugin.min.js"
                },
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                },
                {
                    title: 'Test template 2',
                    content: 'Test 2'
                }
                ],
                content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
                ],
                relative_urls : false,
                remove_script_host : false
            });

            $(document).ready(function() {
            $(".tgl_kegiatan").datetimepicker({
                format: "DD-MM-YYYY HH:mm:ss",
                locale: "id"
            });
            $(".tgl_posting").datetimepicker({
                format: "DD-MM-YYYY HH:mm:ss",
                locale: "id"
            });
        });
        </script>