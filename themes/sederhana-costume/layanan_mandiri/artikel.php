<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="content-wrapper">
    <div class="list-artikel-mandiri">
        <div class="table-responsive">
            <table class="table table-bordered dataTable table-hover">
                <thead class="bg-gray disabled color-palette">
                    <tr>
                        <th class="text-center" width="5">No</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Tanggal</th>                    
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($list_artikel_warga as $item) : ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td><?=$item['judul']?></td>
                            <td class="text-center"><?=$item['kategori']?></td>
                            <td class="text-center"><?php echo tgl_indo2($item['tgl_upload']) ?></td>
                            <td class="text-center"><?=$item['enabled'] > 1 ? 'Belum Aktif': 'Aktif'?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>   

    <br>
    
    <div class="tombol">
		<a onclick="$('#form_submit').toggle()" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Buat Laporan"><i class="fa fa-pencil-square-o"></i> Submit Artikel Anda</a>
	</div>

</div>


<?php if (isset($_COOKIE['success']) AND $_COOKIE['success'] > 0) { ?>
    <div class="alert alert-success">Artikel yang berhasil di submit akan menunggu proses persetujuan sebelum dapat ditampilkan.</div>
<?php } ?>

	<div class="box mb-4">
		<div class="box-body" id="form_submit" style="display: none">

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
                height: 500,
                theme: 'modern',
                plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                ],
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | fontselect fontsizeselect",
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

        <div class="content-wrapper">
                <section class="content" id="maincontent">
            <form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="box box-info">
                            <div class="box-body">
                                <input type="hidden" name="id_user" value="<?=$penduduk['id']?>">
                                <input type="hidden" name="by_warga" value="1">
                                <div class="form-group">
                                    <label class="control-label" for="judul">Judul Artikel</label>
                                    <input id="judul" name="judul" class="form-control input-sm required" type="text"
                                    placeholder="Judul Artikel" value="<?=$artikel['judul']?>"></input>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kategori Artikel</label>
                                    <div class="radio">
                                    <label><input type="radio" name="kategori" value="0" onclick="toggleCat(0)" checked>Potensi & Produk Desa</label>
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" name="kategori" value="1" onclick="toggleCat(1)">Berita</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="kode_desa">Isi Artikel</label>
                                    <textarea name="isi" class="form-control input-sm" style="height:350px;">
                                        <?=$artikel['isi']?>
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-info collapsed-box">
                            <div class="box-header with-border">
                                <h5 class="box-title">Unggah Gambar</h5>
                            </div>
                                <div class="box-body no-padding">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                                <label class="control-label" for="gambar">Gambar Utama</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" id="file_path">
                                                    <input type="file" class="hidden" id="file" name="gambar">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-flat" id="file_browser"><i
                                                            class="fa fa-search"></i> Browse</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    
                                                        <label class="control-label" for="gambar1">Gambar Tambahan</label>
                                                        <div class="input-group input-group-sm">
                                                            <input type="text" class="form-control" id="file_path1">
                                                            <input type="file" class="hidden" id="file1" name="gambar1">
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-info btn-flat" id="file_browser1"><i
                                                                    class="fa fa-search"></i> Browse</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            
                                                                <label class="control-label" for="gambar2">Gambar Tambahan</label>
                                                                <div class="input-group input-group-sm">
                                                                    <input type="text" class="form-control" id="file_path2">
                                                                    <input type="file" class="hidden" id="file2" name="gambar2">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-info btn-flat" id="file_browser2"><i
                                                                            class="fa fa-search"></i> Browse</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                   
                                                                        <label class="control-label" for="gambar3">Gambar Tambahan</label>
                                                                        <div class="input-group input-group-sm">
                                                                            <input type="text" class="form-control" id="file_path3">
                                                                            <input type="file" class="hidden" id="file3" name="gambar3">
                                                                            <span class="input-group-btn">
                                                                                <button type="button" class="btn btn-info btn-flat" id="file_browser3"><i
                                                                                    class="fa fa-search"></i> Browse</button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div id="potensi_produk">
                                                                <input name="id_potensi" type="hidden" value="<?=$artikel['id_potensi']?>">
                                                                <div class="box box-info">
                                                                    <div class="box-header with-border">
                                                                        <h5 class="box-title">Pengaturan Produk & Potensi <?php echo ucwords($this->setting->sebutan_desa)." "?></h5>
                                                                    </div>
                                                                    <div class="box-body no-padding">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">                                                                                
                                                                                <label class="control-label" for="nama_produk">Nama Produk/Usaha</label>
                                                                                <div class="input-group input-group-sm">
                                                                                    <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-bookmark"></i></div>
                                                                                    <input class="form-control input-sm pull-right" name="nama_produk"
                                                                                        type="text" required placeholder="Masukan Nama Produk/Usaha"
                                                                                        value="<?=$artikel['nama_produk']?>">
                                                                                </div>
                                                                                <span class="help-block"><code>(Isikan Nama Produk/Usaha)</code></span>
                                                                                    
                                                                                <label class="control-label" for="pengelola_produk">Pengelola Produk/Usaha</label>
                                                                                <div class="input-group input-group-sm">
                                                                                    <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-user"></i></div>
                                                                                    <input class="form-control input-sm pull-right" name="pengelola_produk"
                                                                                        type="text" required placeholder="Masukan Nama Pengelola Produk"
                                                                                        value="<?=ucfirst(strtolower($penduduk['nama']))?>">
                                                                                </div>
                                                                                <span class="help-block"><code>(Isikan Pengelola Produk/Usaha)</code></span>
                                                                                    
                                                                                <label class="control-label" for="kontak_pengelola">Nomor Kontak Pengelola</label>
                                                                                <div class="input-group input-group-sm">
                                                                                    <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-phone-square"></i></div>
                                                                                    <input class="form-control input-sm pull-right" name="kontak_pengelola"
                                                                                        type="text" required placeholder="Masukan Nomor Kontak Pengelola"
                                                                                        value="<?=$artikel['kontak_pengelola']?>">
                                                                                </div>
                                                                                <span class="help-block"><code>(Isikan Nomor Kontak Pengelola)</code></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="box box-info">
                                                                <div class="box-header with-border">
                                                                    <h5 class="box-title">Pengaturan Lainnya</h5>
                                                                </div>
                                                                <div class="box-body no-padding">
                                                                    <div class="col-sm-12">
                                                                        <?php if ($artikel['dokumen']): ?>
                                                                        <div class="form-group">
                                                                            <div class="mailbox-attachment-info">
                                                                                <a href="<?=base_url() . LOKASI_DOKUMEN . $artikel['dokumen']?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Unduh Dokumen</a>
                                                                            </div>
                                                                        </div>
                                                                        <?php endif;?>
                                                                        <div class="form-group">                                                                                
                                                                            <label class="control-label" for="link_embed">ID Video Youtube</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;">
                                                                                    <i class="fa fa-youtube-play"></i>
                                                                                </div>
                                                                                <input class="form-control input-sm pull-right" name="link_embed" type="text" placeholder="Masukan ID Youtube Disini" value="<?=$artikel['link_embed']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan ID Video Youtube)</code></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="dokumen">Dokumen Lampiran</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <input type="text" class="form-control" id="file_path4">
                                                                                <input type="file" class="hidden" id="file4" name="dokumen">
                                                                                <span class="input-group-btn">
                                                                                    <button type="button" class="btn btn-info btn-flat" id="file_browser4"><i class="fa fa-search"></i> Browse</button>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="nama_dokumen">Nama Dokumen</label>
                                                                            <input id="link_dokumen" name="link_dokumen" class="form-control input-sm" type="text" value="<?=$artikel['link_dokumen']?>"></input>
                                                                            <span class="help-block"><code>(Nantinya akan menjadi link unduh/download)</code></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="sumber_berita">Sumber Berita</label>
                                                                            <input id="sumber_berita" name="sumber_berita" class="form-control input-sm" type="text" value="<?=ucfirst(strtolower($penduduk['nama']))?>"></input>
                                                                            <span class="help-block"><code>(Masukan Nama sumber berita misal "Portal Desa Digital")</code></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="link_sumber_berita">Link Sumber Berita</label>
                                                                            <input id="link_sumber_berita" name="link_sumber_berita" class="form-control input-sm url" type="text" value="<?=$artikel['link_sumber_berita']?>"></input>
                                                                            <span class="help-block"><code>(Masukan link sumber berita)</code></span>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="tgl_post">Tanggal Posting</label>
                                                                            <div class="input-group input-group-sm date">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                </div>
                                                                                <input class="form-control input-sm pull-right tgl_posting" id="tgl_jam" name="tgl_upload" type="text" value="<?=$artikel['tgl_upload']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Kosongkan jika ingin langsung di post, bisa digunakan untuk artikel terjadwal)</code></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="box box-info">
                                                                <div class="box-body no-padding">
                                                                    <div class='box-footer'>
                                                                        <button type='reset' class='btn btn-social btn-flat btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
                                                                        <button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </section>
                                            </div>

                </div>	
                </div>