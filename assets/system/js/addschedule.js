$(document).ready(function () {
	getDepartment('dept_id');
	getRegion('region_id');

	/* Datatatables */
	var table = $('#tbl-schedule-dtl').DataTable({
		'searching': false,
		'paging': false,
		'info': false,
	});

	var counter = 1;

	/* Button add */
	$('#btn-add').click(function (e) {
		e.preventDefault();

		$('modal-msg').hide();
		getStore('store');
		$('#store').select2({
			placeholder: "Select store",
		});

		$("#myModal").modal("toggle");

	});

	/* Button save to table*/
	$('#btn-save').click(function (e) { 
		e.preventDefault();
		var dataColumn = table.column(0).data();
		var region_id = $('#region_id').val();
		var dept_id = $('#dept_id').val();
		var month = $('#month').val();
		var year = $('#year').val();
		var store = $('#store').val();

		var _data = {
			'region_id': region_id,
			'dept_id': dept_id,
			'month': month,
			'year': year,
			'store': store
		};

		/* Cek store checklist in database */
		if (cekStoreChecklist(_data).responseJSON.length > 0) {
			$("#modal-msg").html('<div class="alert alert-danger">Store already exists</div>');
			$("#modal-msg").show();
			return false;
		}

		/* Cek if store is exists in table */
		if(dataColumn.length > 0){
			if (jQuery.inArray($('#store').val(), dataColumn) !== -1) {
				$("#modal-msg").html('<div class="alert alert-danger">Store already exists</div>');
				$("#modal-msg").show();
				return false;
			} 
		}
		
		/* Add row datatable */
		table.row.add([
			$('#store').val(),
			$('#checklist_date').val(),
			"<button id='btn-edit' class='btn btn-warning btn-sm'>Edit</button>"
		]).draw(false);

		$("#myModal").modal("toggle");

	});

	/* Button approve */
	$('#btn-approve').click(function (e) { 
		e.preventDefault();
		
		var dataColumn = table.column(0).data();

		console.log(dataColumn);
	});

	/* Button OK */
	$('#btn-ok').click(function (e) { 
		e.preventDefault();
		
		var datatbls = table.columns([0,1]).data();
		var region_id = $('#region_id').val();
		var dept_id = $('#dept_id').val();
		var month = $('#month').val();
		var year = $('#year').val();
		var created_id = '219001287';
		var id = year + 
				($('#month').val() < 9 ? "0" : "") + $('#month').val() +
				region_id + 
				dept_id + 
				created_id.substring(4,9);

		
		var _data = {
			'id': id,
			'region_id': region_id,
			'dept_id': dept_id,
			'month': month,
			'year': year,
			'created_id': created_id,
			'created_date': moment().format('YYYY-M-D H:mm:ss'),
			'status': 'input',
			'detail': setDetail(datatbls,id)
		};

		// console.log(detail);
		$.ajax({
			type: "POST",
			url: base_url() + "schedule/store",
			data: _data,
			success: function (response) {
				console.log(response);
			}
		});
	});

	/* Submit upload file */
	$("#upload-file").on('submit', function (e) {
		e.preventDefault();
		var periode = $('#periode').val();

		var form = new FormData(this);
		form.append("periode", periode);

		var settings = {
			"async": true,
			"crossDomain": true,
			"url": base_url() + "schedule/show",
			"method": "POST",
			"headers": {
				"cache-control": "no-cache",
			},
			"processData": false,
			"contentType": false,
			"mimeType": "multipart/form-data",
			"data": form
		}

		$.ajax(settings).done(function (response) {
			console.log(response);
		});
	});
	
	/* Function set detail */
	function setDetail(datatbl,id)
	{
		var detail = new Array();

		for (let index = 0; index < datatbl.length-1; index++) {
			detail[index] = {
				'schedule_id': id,
				'store': datatbl[0][index],
				'checklist_date': datatbl[1][index]
			}
		}

		return detail;
	}

	/* Function cek store checklist */
	function cekStoreChecklist(_data){
		var res = $.ajax({
			type: "POST",
			url: base_url() + "schedule/cekstorechecklist",
			data: _data,
			async: false,
		});

		return res;
	}

});