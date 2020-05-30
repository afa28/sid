<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaturan Pembangunan</h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Pengaturan Pembangunan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                        <h3 class="profile-username text-center">Nina Mcintire</h3>
                        <p class="text-muted text-center">Software Engineer</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <a href="<?=site_url("menu/form/$tip")?>" class="btn btn-social btn-flat btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Menu Baru">
                            <i class="fa fa-plus"></i>Tambah Pembangunan
                        </a>
                        <?php if ($this->CI->cek_hak_akses('h')): ?>
                            <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?=site_url("menu/delete_all/$tip/$p/$o")?>')" class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i class='fa fa-trash-o'></i> Hapus Data Terpilih</a>
                        <?php endif; ?>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <form id="mainform" name="mainform" action="" method="post">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-striped table-bordered" id="tabel_data" data-url="<?= site_url('pembangunan/list_data')?>">
                                                    <div class="table-responsive">
                                                        <thead class="bg-gray disabled color-palette">
                                                            <tr>
                                                                <th width="1%"><input type="checkbox" id="checkall"</th>
                                                                <th width="1%">No</th>
                                                                <th width="5%">Aksi</th>
                                                                <th>Judul</th>
                                                                <th>Harga</th>
                                                                <th>Waktu Pengerjaan</th>
                                                                <th>Tahun Anggaran</th>
                                                                <th>Harga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="load_data">
                                                        </tbody>
                                                    </div>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</section>
</div>
