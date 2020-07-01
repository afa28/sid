$(document).ready(function () {
	var sebutan = $('.table').attr('sebutan');

	tampilData();

	function tampilData() {
		$.ajax({
			type: 'GET',
			url: 'http://manurung.desa.id/wilayah/data',
			dataType : 'json',
			success : function(data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' + data[i] + '</tr>';
				}
				$('#load_data').html(html);

				$('#tabel_data').dataTable( {
					'scrollY': 350,
					'deferRender': true,
					'scroller': true,
					'processing': true,
					'pageLength': 10,
					'order': [],
					'columnDefs': [ {
						'searchable': false,
						'orderable': false,
						'width': '1px',
						'targets': [0, 1, 2]
					}],
					'language': {
						'url': BASE_URL + '/assets/bootstrap/js/indonesian.lang'
					},
					'drawCallback': function () {
						$('.dataTables_paginate > .pagination').addClass('pagination-sm no-margin');
					},
				});
			}
		});
	}
});
