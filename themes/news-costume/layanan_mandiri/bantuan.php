<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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

<style type="text/css">
.ui-dialog-titlebar {background-color: #e9e9f9;}
</style>

<div class="box mb-4">
    <div class="box-header">
        Daftar Bantuan Yang Diterima (Sasaran Perorangan)
    </div>

    <div class="box-body">
        <?php if(!empty($daftar_bantuan)){ ?>
            <table  class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="uppercase text-center">Nama</th>
                        <th class="uppercase text-center">Awal</th>
                        <th class="uppercase text-center">Akhir</th>
                        <th class="uppercase text-center">ID KARTU</th>
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
                                    <button type="button" target="kartu_peserta" title="Kartu Peserta" href="<?php echo site_url('layanan_mandiri/kartu_peserta/'.$bantuan['id'])?>" onclick="show_kartu_peserta($(this));" class="btn btn-sm btn-default">
                                        <span class="fa fa-print">&nbsp;</span> <?php echo $bantuan['no_id_kartu']?>
                                    </button>
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

