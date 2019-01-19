$(document).ready(function () {
    
    /* Get category */
    getCategory('category_id');

    /* Get department */
    getDepartment('dept_id');
    getDepartment('filter_dept');

    /* Get region */
    getRegion('filter_region');
    getRegion('region_id');

    var table = $('#example').DataTable({
        "ajax": base_url() + "item/select",
        "sAjaxDataProp": "",
        "columns": [
            { "data": "id" },
            { "data": "category_id" },
            { "data": "category_name" },
            { "data": "dept_id" },
            { "data": "region_id" },
            { "data": "item_name" },
            { "data": "order" },
            { "data": "status" },
            {
                "data": "null",
                "defaultContent": '<a href="" class="btn btn-warning btn-flat btn-sm" id="btn-edit">Edit</a>'
            },
        ],
        "columnDefs": [
            {
                "targets": [1,6],
                "visible": false,
                "searchable": false
            },
        ],
        "createdRow": function (row, data, dataIndex) { //add class status(css) jika status == I
            if (data.status == "I") {
                $(row).addClass('status');
            }
        }
    });

    /* Button edit */
    $('#example tbody').on('click', '#btn-edit', function (e) {
        e.preventDefault();
        var data_table = table.row($(this).parents('tr')).data();

        $('#id').val(data_table.id);
        $('#category_id').val(data_table.category_id);
        $('#item_name').val(data_table.item_name);
        $('#dept_id').val(data_table.dept_id);
        $('#region_id').val(data_table.region_id);
        $('#status').val(data_table.status);
        $('#order').val(data_table.order);

        $('#process').val('edit');
        $('#modal-title').html('Update Data');
        $('#modal_msg').hide();
        $('#id').attr('disabled', 'disabled');

        $("#myModal").modal("toggle");
    });
    /* ./Button edit */

    /* Button add */
    $('#btn-add').click(function (e) {
        e.preventDefault();

        $('#process').val('insert');
        $('#modal-title').html('Insert Data');

        /* Clear form insert data */
        clearForm(); 

        $("#myModal").modal("toggle");
    });
    /* ./Button add */

    /* Button save */
    $('#btn-save').click(function (e) {
        e.preventDefault();
        var _url = '';

        $data = {
            'id': $('#id').val(),
            'item_name': $('#item_name').val(),
            'dept_id': $('#dept_id').val(),
            'category_id': $('#category_id').val(),
            'region_id': $('#region_id').val(),
            'order': $('#order').val(),
            'status': $('#status').val(),
        };

        if ($('#process').val() == 'insert') {
            _url = base_url() + "item/store ";
        } else if ($('#process').val() == 'edit') {
            _url = base_url() + "item/update/" + $data.id;
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
                    $("#modal-msg").show();
                }
                else {
                    $("#myModal").modal("toggle");
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

    /* Button filter */
    $('.filter').on('keyup change', function () {
        // table.column(3).search(this.value).draw();
        table.search('');
        table.column($(this).data('columnIndex')).search(this.value).draw();
    });
    /* /.Button filter */

    /* Clear Form */
    function clearForm() {
    	$('#id').val('');
    	$('#category_id').val('');
    	$('#item_name').val('');
    	$('#status').val('');
    	$('#order').val('');
    }
});