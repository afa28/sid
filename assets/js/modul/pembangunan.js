$(document).ready(function(){
	var url = $('.table').attr('data-url');
	
	load_data();
	
	function load_data()
	{
		$.ajax({
			url: url,
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