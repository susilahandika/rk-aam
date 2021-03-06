$(document).ready(function () {
	// getDepartment('dept_id');
	// getRegion('region_id');

	var region_id = $('#hdn_region').val();
	var dept_id = $('#hdn_dept').val();

	$('#region_id').val(region_id);
	$('#dept_id').val(dept_id);

	getAppBy(lastPart());
	
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
		var region_id = $('#region_id').val();

		$('modal-addschedule-msg').hide();
		getStoreByRegion(region_id, 'store');

		$('#store').select2({
			placeholder: "Select store",
		});

		$("#modal-addschedule").modal("toggle");

	});

	/* Button save to table */
	$('#btn-save').click(function (e) { 
		e.preventDefault();

		// table.cell(0, 0).data(45).draw();
		var process = $('#process').val();
		var indexRow = $('#indexRow').val();
		var store = $('#store').val();
		var checklist_date = $('#checklist_date').val();
		var dataColumn = table.column(0).data();
		var region_id = $('#region_id').val();
		var dept_id = $('#dept_id').val();
		var month = $('#month').val();
		var year = $('#year').val();
		var store = $('#store').val();
		var date = new Date(checklist_date);

		var _data = {
			'region_id': region_id,
			'dept_id': dept_id,
			'month': month,
			'year': year,
			'store': store
		};

		/* Cek if month input > month periode */
		if ((date.getMonth() + 1) != month) {
			showMessageDialog('modal-addschedule-msg', 'Pleace cek your checklist date', 'danger');
			return false;
		}

		/* Cek store checklist in database */
		if (cekStoreChecklist(_data).responseJSON.length > 0) {
			showMessageDialog('modal-addschedule-msg', 'Store already exists', 'danger');
			return false;
		}

		/* Cek if store is exists in table */
		if(dataColumn.length > 0){
			if (jQuery.inArray($('#store').val(), dataColumn) !== -1) {
				showMessageDialog('modal-addschedule-msg', 'Store already exists', 'danger');
				return false;
			} 
		}

		if (process == 'edit') {
			/* Edit */
			table.cell(indexRow, 0).data(store).draw();
			table.cell(indexRow, 1).data(checklist_date).draw();
		} else{
			/* Add row datatable */
			table.row.add([
				store,
				checklist_date,
				"<button id='btn-edit' class='btn btn-warning btn-sm'>Edit</button>"
			]).draw(false);
		}
		
		$("#modal-addschedule").modal("toggle");

	});

	/* Button edit schedule detail */
	$('#tbl-schedule-dtl tbody').on('click', '#btn-edit', function (e) {
		e.preventDefault();

		var dtl_table = table.row($(this).parents('tr')).data();
		var indexRow = table.row($(this).parents('tr')).index();

		// dtl_table[0] = 44;

		// table.row($(this).parents('tr')).data(dtl_table).draw();

		var region_id = $('#region_id').val();

		$('modal-addschedule-msg').hide();
		getStoreByRegion(region_id, 'store');

		$('#store').val(dtl_table[0]);
		$('#checklist_date').val(dtl_table[1]);
		$('#modal-addschedule-title').val('Edit Store');
		$('#process').val('edit');
		$('#indexRow').val(indexRow);

		$('#store').select2({
			placeholder: "Select store",
		});

		$("#modal-addschedule").modal("toggle");

	});

	/* Button approve */
	$('#btn-approve').click(function (e) { 
		e.preventDefault();

		// $('#btn-approve').attr('disabled', 'disabled');
		// $('#btn-ok').attr('disabled', 'disabled');

		var _data = {
			'id': $('#id-schedule-app').val(),
			'user_id': $('#user_id').val()
		};

		$.ajax({
			type: "POST",
			url: base_url() + "schedule/approve",
			data: _data,
			success: function (response) {
				if (response.code == 0) {
					showMessageDialog('addschedule-main-msg', response.message, 'success');
					$('#btn-approve').attr('disabled', 'disabled');
					$('#btn-ok').attr('disabled', 'disabled');
					getAppBy(_data['id']);
				} else {
					showMessageDialog('addschedule-main-msg', response.message, 'danger');
				}
			}
		});
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
				($('#month').val() < 10 ? "0" : "") + $('#month').val() +
				region_id + 
				(dept_id < 10 ? "0" : "") + dept_id +
				created_id.substring(4,9);
		var process_schedule = $('#process-schedule').val();
		var url = '';
		
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

		if (process_schedule == 'edit') {
			url = base_url() + "schedule/update";
		}else{
			url = base_url() + "schedule/store";
		}

		$.ajax({
			type: "POST",
			url: url,
			data: _data,
			success: function (response) {
				if (response.code == 0) {
					showMessageDialog('addschedule-main-msg', response.message, 'success');
					$('#id-schedule-app').val(response.id);
					$('#btn-ok').attr('disabled', 'disabled');
				}else{
					showMessageDialog('addschedule-main-msg', response.message, 'danger');
				}
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

	function getStoreByRegion(region, id){
		$.ajax({
			type: "POST",
			url: base_url() + 'user/storebyregion',
			dataType: "json",
			cache: false,
			async: false,
			data: {
				'region_id': region
			},
			success: function (response) {
				
				$('#' + id).html('');
				$('#' + id).append('<option value="">Store</option>');
				$.each(response, function (i, value) {
					//  $('#dept_id').html('<option>asd</option>');
					$('#' + id).append('<option value="' + value.id + '">' + value.store_name + '</option>');
				});
			}
		});
	}

	function getAppBy(schedule_id){
		$.ajax({
			type: "POST",
			url: base_url() + "schedule/getAppBy/" + schedule_id,
			dataType: "JSON",
			cache: false,
			async :false,
			success: function (response) {
				var html = "";
				$.each(response, function (i, value) { 
					html += (i+1) + ". " + value.full_name + " - " + value.position_name + " - " + value.appdate + "<br>";			 
				});

				$('#app_by').html(html);
			}
		});
	}


});