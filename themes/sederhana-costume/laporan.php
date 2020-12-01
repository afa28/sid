<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<style>
.loading {
    display: none;
    padding: 50px;
    margin: 10px auto;
}
</style>

<div class="main-wrapper bg-gray">
    <div class="container">
            <!-- page content -->
			<div class="halaman-arsip-laporan">
					<div class="blog-section">
					<?php $this->load->view($folder_themes.'/breadcrumb');?>
                        <div id="post-data">
                        <?php foreach ($datas as $data):
                            for ($i = 1; $i <= 3; $i++) {
                            if (!empty($data['gambar'.$i])) $data['gambar'][] = $data['gambar'.$i];
                            }
                            $gambar = empty($data['gambar'][0]) ? site_url().'timthumb.php?src='.site_url().'assets/images/noimage.png&w=600&h=325' : 'desa/upload/laporan/'.$data['gambar'][0];
                        ?>
                        <div class="card login-card laporan-warga-list">
                            <div class="row no-gutters">
                                <div class="col-md-4 col-xs-5">
                                    <a href="<?=site_url()?>laporan_warga/read/<?=$data['id']?>">
                                        <img src="<?=$gambar?>" class="img-responsive gambar-laporan" alt="<?php echo $data['judul'] ?>">
                                    </a>
                                </div>
                                <div class="col-md-8 col-xs-7"> 
                                    <div class="row">                           
                                        <div class="top-block-laporan-warga-list">
                                            <div class="brand-wrapper laporan-warga-list-title">
                                                <a href="<?=site_url()?>laporan_warga/read/<?=$data['id']?>">
                                                    <div class="post-title"><?php echo ucwords(character_limiter( $data['judul'], 40 )); ?></div>
                                                 </a>
                                            </div>
                                            <div class="top-meta-laporan-warga-list">
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-12">
                                                        <div class="post-date">
                                                            <i class="ti-calendar"></i> <?php echo hari( $data['tgl_upload'] ); ?>, <?php echo tgl_indo2( $data['tgl_upload'] ); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-4 hidden-xs">
                                                        <div class="post-hit">
                                                            <b>Jenis Laporan :</b> <?php echo Lapor_model::get_jenis( $data['jenis'] ); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body laporan-warga-list-body hidden-xs">
                                            <div class="description-laporan-warga-list">
                                                <?= ucwords(character_limiter( $data['komentar'], 280 )); ?>
                                            </div>                                        
                                        </div>

                                        <div class="bottom-block-article-list hidden-xs">
                                            <div class="bottom-meta-laporan-warga-list">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-5">                                                 
                                                        <div class="post-owner">
                                                            <i class="ti-user"></i> <?php echo ( $data['owner'] ); ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-xs-">
                                                        <div class="post-cat">
                                                            <?php if($data['status']): ?>
                                                            <?php if($data['status'] == 'Dalam Proses'): ?>
                                                                <i class="fa fa-spinner" style="color: #777;"></i> Dalam Proses
                                                            <?php elseif($data['status'] == 'Pending'): ?>
                                                                <i class="fa fa-exclamation-triangle" style="color: #f39c12;"></i> Pending
                                                            <?php elseif($data['status'] == 'Selesai'): ?>
                                                                <i class="fa fa-thumbs-o-up" style="color: #25c112;"></i> Selesai
                                                            <?php elseif($data['status'] == 'Diteruskan Ke Pihak Terkait'): ?>
                                                                <i class="fa fa-random" style="color: #007bff;"></i> Diteruskan Ke Pihak Terkait
                                                            <?php elseif($data['status'] == 'Belum Diverifikasi'): ?>
                                                                <i class="fa fa-ban" style="color: red;"></i> Belum Diverifikasi
                                                        <?php endif ?>
                                                        <?php endif ?>
                                                        </div>                                                      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <?php endforeach; ?>
                        </div>
                        <input type="hidden" id="result_count" value="<?=count($datas)?>">
                        <div class="text-center loading">Sedang memuat ...</div>
                        <div class="text-center" id="load-button">
                            <button class="btn btn-primary" onclick="loadMore()">Muat Lebih Banyak ...</button>
                        </div>
					</div>
				<!-- end content -->
				<!-- Sidebar -->
			</div>
        <div class="clearfix"></div>
        <!-- /.row -->
    </div>
</div>

<script>
$().ready(() => {
    if ($('#result_count').val() == <?=$total?>) {
        $('#load-button').hide()
    }
})


let loadMore = () => {
    var last_id = $("#result_count").val();
    loadMoreData(last_id);
}


let loadMoreData = (last_id) => {
    $.ajax({
        url: '/laporan_warga/load_more/?limit=<?=$limit?>&offset=' + last_id,
        type: 'GET',
        beforeSend: () => {
            $('.loading').show()
        }
    })
    .done((data) => {
        
        $('.loading').hide()
        $('#result_count').val((i, oldval) => { return +oldval * 2 })
        $('#post-data').append(data)
        
        if ($('#result_count').val() == <?=$total?>) {
            $('#load-button').hide()
        }
        
    })
    .fail((e) => alert('Server not responding ...'))
}
</script>

<?php $this->load->view($folder_themes.'/footer');?>