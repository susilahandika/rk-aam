$(document).ready(function () {
    getRegion('region_id');
    getDepartment('dept_id');
    getPosition('position_id');

    var table = $('#example').DataTable({
    	"ajax": base_url() + "user/select",
    	"sAjaxDataProp": "",
    	"columns": [
            { "data": "id" },
    		{ "data": "full_name" },
    		{ "data": "region_id" },
    		{ "data": "dept_id" },
    		{ "data": "position_id" },
    		{ "data": "region_name" },
    		{ "data": "dept_name" },
    		{ "data": "position_name" },
    		{
    			"data": "null",
    			"defaultContent": '<a href="" class="btn btn-warning btn-flat btn-sm" id="btn-edit">Edit</a>'
    		},
        ],
        "columnDefs": [
            {
            	"targets": [2,3,4],
            	"visible": false,
            	"searchable": false
            }
        ]
    });

    /* Change NIK */
    $('#id').change(function (e) { 
        e.preventDefault();

        _data = {
            'id' : $('#id').val()
        };
        
        /* $.post(base_url() + "user/find/" + data.nik, null,
            function (data, textStatus, jqXHR) {
                console.log(data);
            },
        ); */

        $.ajax({
            type: "POST",
            url: base_url() + "user/find",
            async :false,
            cache: false,
            data: _data,
            success: function (response) {
                if(response.length > 0){
                    $('#full_name').val(response[0].full_name);
                }else{
                    $("#modal-msg").html('<div class="alert alert-danger">NIK not found!</div>');
                    $("#modal-msg").show();

                    setTimeout(function () {
                    	$("#modal-msg").hide('slow');
                    }, 2000);
                }
            }
        });
    });
    /* ./Change NIK */

    /* Button add */
    $('#btn-add').click(function (e) {
    	e.preventDefault();

    	$('#process').val('insert');
    	$('#modal-title-user').html('Insert Data');
    	$('#modal_msg').hide();
    	clearForm();

    	$("#modal_insert").modal("toggle");
    });
    /* ./Button add */

    /* Button save */
    $('#btn-save').click(function (e) {
    	e.preventDefault();
    	var _url = '';

    	$data = {
    		'id': $('#id').val(),
    		'full_name': $('#full_name').val(),
    		'region_id': $('#region_id').val(),
    		'dept_id': $('#dept_id').val(),
    		'position_id': $('#position_id').val(),
    	};

    	if ($('#process').val() == 'insert') {
    		_url = base_url() + "user/store";
    	} else if ($('#process').val() == 'edit') {
    		_url = base_url() + "user/update/" + $data.id;
    	}

    	$.ajax({
    		type: "POST",
    		url: _url,
    		data: $data,
    		dataType: "json",
    		success: function (response) {
    			var msg = '';

    			if (response['code'] != 0) {

    				if ($.isPlainObject(response.message)) {
    					$.each(response.message, function (key, value) {
    						msg += '<p>' + value + '</p>';
    					});
    				} else {
    					msg += '<p>' + response.message + '</p>';
    				}

    				$("#modal-msg").html('<div class="alert alert-danger">' + msg + '</div>');
    			} else {
    				$("#modal_insert").modal("toggle");
    				table.ajax.reload(null, false);
    				$("#main-msg").html('<div class="alert alert-success">' + response.message + '</div>');
    				$("#main-msg").show();

    				setTimeout(function () {
    					$("#main-msg").hide('slow');
    				}, 2000);
    			}
    		}
    	});
    });
    /* ./Button save */

    /* Button edit */
    $('#example tbody').on('click', '#btn-edit', function (e) {
    	e.preventDefault();
        var data_table = table.row($(this).parents('tr')).data();

        $('#id').val(data_table.id);
        $('#full_name').val(data_table.full_name);
        $('#region_id').val(data_table.region_id);
        $('#dept_id').val(data_table.dept_id);
        $('#position_id').val(data_table.position_id);

    	$('#process').val('edit');
		$('#modal-title-user').html('Update Data');
		// $('#modal_title').append('Update Data');
    	$('#modal_msg').hide();
    	$('#id').attr('disabled', 'disabled');

    	$("#modal_insert").modal("toggle");
    });
    /* ./Button edit */

    function clearForm(){
        $('#id').val('');
        $('#full_name').val('');
        $('#region_id').val('');
        $('#dept_id').val('');
        $('#position_id').val('');
    }
});