<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaturan Pembangunan</h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Pengaturan Pembangunan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
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
                                                    <table class="table table-striped table-bordered" id="tabel_data">
                                                        <div class="table-responsive">
                                                            <thead class="bg-gray disabled color-palette">
                                                                <tr>
                                                                    <th width="1%"><input type="checkbox" id="checkall"</th>
                                                                    <th width="1%">No</th>
                                                                    <th width="5%">Aksi</th>
                                                                    <th>Judul</th>
                                                                    <th>Harga</th>
                                                                    <th>Harga</th>
                                                                    <th>Harga</th>
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
		</form>
	</section>
</div>

<?php $this->load->view('global/confirm_delete');?>

<script type="text/javascript">
    $(document).ready(function(){
        //READ/SHOW
        load_data();
        
        function load_data()
        {
            $.ajax({
                url : '<?= site_url('pembangunan/list_data')?>',
                type: 'GET',
                dataType: 'json',
                success : function(data){
                    var html = '';
                    var i;
                    var no;
                    for(i=0; i<data.length; i++){
                        no = i+1;
                        html += 
                        '<tr>'+
                            '<td><input type="checkbox" name="id_cb[]" value="'+data[i].id+'" /></td>'+
                            '<td class="text-center">'+no+'</td>'+
                            '<td nowrap>'+
                            '<a href="javascript:;" class="btn bg-orange btn-flat btn-sm item_edit" title="Ubah" data="'+data[i].id+'"><i class="fa fa-edit"></i></a>'+
                            '&nbsp'+
                            '<a href="#" data-href="delete_input/'+data[i].id+'" class="btn bg-maroon btn-flat btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>'+
                            '</td>'+
                            '<td>'+data[i].judul+'</td>'+
                            '<td>'+data[i].gambar+'</td>'+
                            '<td>'+data[i].uraian+'</td>'+
                            '<td>'+data[i].tahun_anggaran+'</td>'+
                            '<td>'+data[i].status+'</td>'+
                        '</tr>';
                    }
                    $('#load_data').html(html);

                    $('#tabel_data').dataTable({
                        'processing': true,
                        'pageLength': 10,
                        'order': [],
                        'columnDefs': [
                            {
                                "searchable": false,
                                "orderable": false,
                                "targets": [0, 1, 2]
                            }
                        ],
                        'language': {
                            'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
                        },
                        'drawCallback': function (){
                            $('.dataTables_paginate > .pagination').addClass('pagination-sm no-margin');
                        },
                    });
                }
            });
        }

    });
</script>


