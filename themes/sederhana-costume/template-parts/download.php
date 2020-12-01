<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Widget Arsip -->
<?php


$limit = $_GET['limit'] ? $_GET['limit'] : 5;
$page = $_GET['page'] ? $_GET['page'] : 1;

	$query = 'SELECT * FROM `dokumen` WHERE `kategori` <= 3 ORDER BY tgl_upload DESC LIMIT '.$limit;
	$query2 = 'SELECT count(id) as count FROM `dokumen` WHERE `kategori` <= 3';
    if(@$_GET['filter'] == 'dokumen-umum')
    {
    	$query = 'SELECT * FROM `dokumen` WHERE `kategori` = 1 ORDER BY tgl_upload DESC LIMIT '.$limit;
    	$query2 = 'SELECT count(id) as count FROM `dokumen` WHERE `kategori` = 1';
    }
    elseif (@$_GET[filter] == 'sk-kades') {
    	$query = 'SELECT * FROM `dokumen` WHERE `kategori` = 2 ORDER BY tgl_upload DESC LIMIT '.$limit;
    	$query2 = 'SELECT count(id) as count FROM `dokumen` WHERE `kategori` = 2';
    }
    elseif (@$_GET['filter'] == 'perdes') {
    	$query = 'SELECT * FROM `dokumen` WHERE `kategori` = 3 ORDER BY tgl_upload DESC LIMIT '.$limit;
    	$query2 = 'SELECT count(id) as count FROM `dokumen` WHERE `kategori` = 3';
    }
    
    $query = $query." OFFSET ".($limit*(($page = $page-1) > 0) ? $page : 0);

    $downloads = $this->db->query($query)->result_array();
    $downloads_count = $this->db->query($query2)->row_array()[count];

    $this->load->library('paging');

		$cfg['page'] = $page;

		$filter = $_GET['filter'];

		$cfg['suffix'] = "?&filter=$filter&limit=$limit";

		$cfg['per_page'] = $limit;

		$cfg['num_rows'] = $downloads_count;

		$this->paging->init($cfg);

		$page;

		$paging = $this->paging;

		$paging_page = 'downloads';

		$paging_range = 3;

		$start_paging = max($paging->start_link, $page - $paging_range);

		$end_paging = min($paging->end_link, $page + $paging_range);

		$pages = range($start_paging, $end_paging);
?>
<?php if ($downloads) : ?>
<script src="<?php echo base_url();?>assets/js/axios.js"></script>
<script>
    function dokumen_download_redirect(satuan) {
        window.location.href = '<?= base_url() . LOKASI_DOKUMEN ?>' + satuan
    }
    function dokumen_download_hit(id) {
        axios.get('<?php echo site_url($this->theme_folder . '/' . $this->theme . '/dokhit.php?id=') ?>'+id).then(data => dokumen_download_redirect(data.data)).catch(e => console.log(e))
    }
</script>
<div class="block-downloads">
	<div class="head-downloads">Regulasi & Dokumen Publik</div>
	<div class="row">
		<div class="col-md-1" style="padding-top:10px;text-align:right">Tampilkan</div>
		<div class="col-md-2"><script type="text/javascript">
				function limit_dokumen(limit)
				{
					if(filter == '')
					{
						return window.location.href = '/downloads'
					}					
					window.location.href='/downloads?limit='+limit+'&filter=<?=$filter ?>'
				}
			</script>			
			<form id="dokumenlimit">
				 <input type="number" value="<?=$limit ?>" class="form-control input-sm form-filter" style="width: 60px" name="limit" onchange="dokumenlimit.submit()">
			</form>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3" style="padding-top:10px;text-align:right">Tampilkan Hanya</div>
		<div class="col-md-3"> 
			<script type="text/javascript">
				function filter_dokumen(filter)
				{
					if(filter == '')
					{
						return window.location.href = '/downloads'
					}					
					window.location.href='/downloads?limit=<?=$limit ?>&filter='+filter
				}
			</script>
			<form id="dokumenfilter">
				<select class="form-control input-sm form-filter" name="filter" onchange="dokumenfilter.submit()">
				<option value="semua" <?php echo $_GET['filter'] == 'semua' ? 'selected':'' ?>>Semua</option>
				<option value="dokumen-umum" <?php echo $_GET['filter'] == 'dokumen-umum' ? 'selected':'' ?>><?php echo unserialize(KODE_KATEGORI)[1] ?></option>
				<option value="sk-kades" <?php echo $_GET['filter'] == 'sk-kades' ? 'selected':'' ?>><?php echo unserialize(KODE_KATEGORI)[2] ?></option>
				<option value="perdes" <?php echo $_GET['filter'] == 'perdes' ? 'selected':'' ?>><?php echo unserialize(KODE_KATEGORI)[3] ?></option>
			</select>
			</form>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center uppercase">No.</th>
					<th class="text-center uppercase">Nama Data</th>
					<th class="text-center uppercase">Kategori</th>
					<th class="text-center uppercase">Tanggal</th>
					<th class="text-center uppercase">Aksi</th>
					<th class="text-center uppercase">Didownload</th>
				</tr>
			</thead>
			<tbody>
			<?php $no = 1; ?>
			<?php foreach ($downloads as $data) : ?>
			<tr>
				<td class="text-center"><?php echo $no++ ?></td>
				<td><a onclick="dokumen_download_hit(<?php echo $data['id'] ?>)"><?php echo $data['nama']; ?></a></td>
				<td class="text-center">
					<?php if (trim($data['kategori']) != '') : ?>
                        <?php echo unserialize(KODE_KATEGORI)[$data['kategori']] ?>
                    <?php endif; ?>
				</td>
				<td class="text-center"><?php echo tgl_indo($data['tgl_upload']); ?></td>
				<td class="text-center"><a class="btn btn-sm btn-mandiri btn-success" onclick="dokumen_download_hit(<?php echo $data['id'] ?>)">Unduh</a></td>
				<td class="text-center"><?php echo ($data['hit']); ?> Kali</td>
			</tr>			
			</tbody>
			<?php endforeach; ?>
		</table>
	</div>
	<?php if ( $paging->end_link > 1 ) { ?>
    <div class="paging text-center">
        <div class="paging-head">
            Menampilkan halaman <?php echo $page.' dari '.$paging->end_link; ?>
        </div>

        <ul class="pagination text-center">
            <?php if ($paging->start_link){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->start_link."&filter=$filter&limit=$limit"); ?>">Pertama</a>
                </li>
            <?php } ?>

            <?php if ($paging->prev){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->prev."&filter=$filter&limit=$limit"); ?>">Sebelumnya</a>
                </li>
            <?php } ?>

            <?php foreach ($pages as $i){ ?>
                <li <?php echo ($page == $i) ? 'class="active"' : "" ?>>
                    <a href="<?php echo ($page == $i) ? 'javascript:void(0)' : site_url($paging_page."?page=".$i."&filter=$filter&limit=$limit"); ?>" title="Halaman <?= $i ?>"><?= $i ?></a>
                </li>
            <?php } ?>

            <?php if ($paging->next){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->next."&filter=$filter&limit=$limit"); ?>">Selanjutnya</a>
                </li>
            <?php } ?>

            <?php if ($paging->end_link){ ?>
                <li>
                    <a href="<?php echo site_url($paging_page."?page=".$paging->end_link."&filter=$filter&limit=$limit"); ?>">Terakhir</i></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
</div>
<?php endif; ?>