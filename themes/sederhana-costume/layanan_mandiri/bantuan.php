<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui/jquery-base-ui.css">
<script src="<?php echo base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>

<script>
    function show_kartu_peserta(elem){
        var id = elem.attr('target');
        var title = elem.attr('title');
        var url = elem.attr('href');
        $('#'+id+'').remove();

        $('body').append('<div id="'+id+'" title="'+title+'" style="display:none;position:relative;overflow:scroll;"></div>');

        $('#'+id+'').dialog({
            resizable: true,
            draggable: true,
            width: 500,
            height: 'auto',
            open: function(event, ui) {
                $('#'+id+'').load(url);
            }
        });
        $('#'+id+'').dialog('open');
    }
</script>

<div class="box mb-4">
    <div class="box-header">
        Daftar Bantuan Yang Diterima (Sasaran Perorangan)
    </div>

    <div class="box-body">
        <?php if(!empty($daftar_bantuan)){ ?>
            <table  class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="uppercase text-center">Program Bantuan</th>
                        <th class="uppercase text-center">Mulai</th>
                        <th class="uppercase text-center">Sampai</th>
                        <th class="uppercase text-center">Cetak Kartu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($daftar_bantuan as $bantuan) { ?>
                        <tr>
                            <td class="uppercase text-center"><?php echo $bantuan['nama']?></td>
                            <td class="uppercase text-center"><?php echo tgl_indo($bantuan['sdate'])?></td>
                            <td class="uppercase text-center"><?php echo tgl_indo($bantuan['edate'])?></td>
                            <td class="uppercase text-center">
                                <?php if($bantuan['no_id_kartu']) { ?>
                                    <a href="<?php echo site_url('layanan_mandiri/layanan/kartu_peserta_pdf/'.$bantuan['id'])?>" class="btn btn-sm btn-mandiri btn-success" alt="Cetak Kartu Bantuan">Cetak Kartu Bantuan</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-danger">Anda tidak terdaftar dalam program bantuan apapun</div>
        <?php } ?>
    </div>
</div>

