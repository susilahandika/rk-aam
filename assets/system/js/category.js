$(document).ready(function () {
     /* Get department */
     getDepartment('dept_id');

    var table = $('#example').DataTable({
        "ajax": base_url() + "category/select",
        "sAjaxDataProp": "",
        "columns": [
            { "data": "id" },
            { "data": "category_name" },
            { "data": "dept_id" },
            {
                "data": "null",
                "defaultContent": '<a href="" class="btn btn-warning btn-flat btn-sm" id="btn-edit">Edit</a>'
            },
        ]
    });

    /* Button edit */
    $('#example tbody').on('click', '#btn-edit', function (e) {
        e.preventDefault();
        var data_table = table.row($(this).parents('tr')).data();

        $('#id').val(data_table.id);
        $('#category_name').val(data_table.category_name);
        $('#dept_id').val(data_table.dept_id);
        
        $('#process').val('edit');
        $('#modal-category-title').html('Update Data');
        $('#modal-category-msg').hide();
        $('#id').attr('disabled', 'disabled');

        $("#modal-category").modal("toggle");
    });
    /* ./Button edit */

    /* Button add */
    $('#btn-add').click(function (e) {
        e.preventDefault();

        $('#process').val('insert');
        $('#modal-category-title').html('Insert Data');
        $('#modal-category-msg').hide();
        clearForm();

        $("#modal-category").modal("toggle");
    });
    /* ./Button add */

    /* Button save */
    $('#btn-save').click(function (e) {
        e.preventDefault();
        var _url = '';

        $data = {
            'id': $('#id').val(),
            'category_name': $('#category_name').val(),
            'dept_id': $('#dept_id').val(),
        };

        if ($('#process').val() == 'insert') {
            _url = base_url() + "category/store";
        } else if ($('#process').val() == 'edit') {
            _url = base_url() + "category/update/" + $data.id;
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

                    $("#modal-category-msg").html('<div class="alert alert-danger">' + msg + '</div>');
                }
                else {
                    $("#modal-category").modal("toggle");
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

    function clearForm()
    {
         $('#id').val('');
         $('#category_name').val('');
         $('#dept_id').val('');
    }
});