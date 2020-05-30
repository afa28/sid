$(document).ready(function () {
	var url = $('.table').attr('data-url');
	//var site_url = site_url();

	tampilData()();

	// Tampil Data
	function tampilData() {
		$.ajax({
			url: url + 'tampil',
			type: 'POST',
			dataType: 'json',
			success: function (data) {
				var html = '';
				var i;
				var no;
				for (i = 0; i < data.length; i++) {
					no = i + 1;
					html +=
						'<tr>' +
						'<td><input type="checkbox" name="id_cb[]" value="' + data[i].id + '" /></td>' +
						'<td class="text-center">' + no + '</td>' +
						'<td nowrap>' +
						'<a href="pembangunan/detail/' + data[i].id + '" class="btn bg-orange btn-flat btn-sm item_edit" title="Ubah" data="' + data[i].id + '"><i class="fa fa-edit"></i></a>' +
						'&nbsp' +
						'<a href="#" data-href="pembangunan/hapus/' + data[i].id + '" class="btn bg-maroon btn-flat btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>' +
						'</td>' +
						'<td>' + data[i].judul + '</td>' +
						'<td>' + data[i].gambar + '</td>' +
						'<td>' + data[i].uraian + '</td>' +
						'<td>' + data[i].tahun_anggaran + '</td>' +
						'<td>' + data[i].status + '</td>' +
						'</tr>';
				}
				$('#load_data').html(html);

				$('#tabel_data').dataTable({
					'processing': true,
					'pageLength': 10,
					'order': [],
					'columnDefs': [{
						'searchable': false,
						'orderable': false,
						'width': '20px',
						'targets': [0, 1, 2]
					}],
					'language': {
						'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
					},
					'drawCallback': function () {
						$('.dataTables_paginate > .pagination').addClass('pagination-sm no-margin');
					},
				});
			}
		});
	}

	// Hapus Data

	function simpanData() {
		$("#btn_add_data").on('click', function () {
			var noinduk = $('input[name="noinduk"]').val();
			var nama = $('input[name="nama"]').val();
			var alamat = $('input[name="alamat"]').val();
			var hobi = $('input[name="hobi"]').val();
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					noinduk: noinduk,
					nama: nama,
					alamat: alamat,
					hobi: hobi
				},
				success: function (response) {
					$('input[name="noinduk"]').val("");
					$('input[name="nama"]').val("");
					$('input[name="alamat"]').val("");
					$('input[name="hobi"]').val("");
					$("#addModal").modal('hide');
					tampil_data();
				}
			})

		});
	}

});