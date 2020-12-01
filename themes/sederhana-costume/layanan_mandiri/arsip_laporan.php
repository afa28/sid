<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $this->load->model('lapor_model') ?>
<div class="content-wrapper">
    <div class="tombol">
        <a href="<?=site_url('layanan_mandiri/lapor')?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Buat Laporan"><i class="fa fa-pencil-square-o"></i> Buat Laporan Anda</a>
    </div>
    <div class="section-list-laporan">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center uppercase" width="5">No</th>
                    <th class="text-center uppercase">Judul</th>
                    <th class="text-center uppercase">Kategori</th>
                    <th class="text-center uppercase">Tanggal</th>                    
                    <th class="text-center uppercase">Balasan</th>
                    <th class="text-center uppercase">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($laporan as $item) : ?>
                    <?php foreach (json_decode($item['meta'], true) as $key => $value) {
                        $item[$key] = $value;
                    }
                ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><a href="<?php echo site_url('layanan_mandiri/laporan/read/' . $item['id']) ?>"><?php echo $item['judul'] ?></a></td>
                        <td class="text-center"><?php echo Lapor_model::get_jenis($item['jenis']) ?></td>
                        <td class="text-center"><?php echo tgl_indo2($item['tgl_upload']) ?></td>
                        <td class="text-center"><a href="<?php echo site_url('layanan_mandiri/laporan/read/' . $item['id']) ?>"> <?php echo count($item['jawaban'] ?? []) ?> Balasan</a></td>
                        <td class="text-center">
                            <?php if ($item['status']) : ?>
                               <span class="bg-<?php 

                                if($item['status'] == 'Dalam Proses')
                                {
                                    echo 'yellow';
                                }

                                elseif($item['status'] == 'Pending')
                                {
                                    echo 'orange';
                                }

                                elseif($item['status'] == 'Selesai')
                                {
                                    echo 'green';
                                }

                                elseif($item['status'] == 'Belum Diverifikasi')
                                {
                                    echo 'red';
                                }

                                elseif($item['status'] == 'Diteruskan Ke Pihak Terkait')
                                {
                                    echo 'blue';
                                }
                                ?> btn-flat btn btn-sm" style="padding: 2px 5px;font-size: 12px; border-radius: 3px; text-transform: uppercase;"><?php echo $item['status'] ?></span>
                            <?php else: ?>
                            <span class="bg-red btn-flat btn btn-sm" style="padding: 2px 5px;font-size: 12px; border-radius: 3px; text-transform: uppercase;">Belum Diverifikasi</span>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<!-- end content -->