$(document).ready(function () {
    var table = $('#example').DataTable({
        "ajax": "http://localhost/rk-aam/category/select",
        "sAjaxDataProp": "",
        "columns": [
            { "data": "id" },
            { "data": "category_name" },
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
        $('#process').val('edit');
        $('#modal-title').html('Update Data');

        $("#myModal").modal("toggle");
    });
    /* ./Button edit */

    /* Button add */
    $('#btn-add').click(function (e) {
        e.preventDefault();

        $('#process').val('insert');
        $('#modal-title').html('Insert Data');

        $("#myModal").modal("toggle");
    });
    /* ./Button add */

    /* Button save */
    $('#btn-save').click(function (e) {
        e.preventDefault();
        var _url = '';

        $data = {
            'id': $('#id').val(),
            'category_name': $('#category_name').val(),
        };

        if ($('#process').val() == 'insert') {
            _url = "http://localhost/rk-aam/category/store";
        } else if ($('#process').val() == 'edit') {
            _url = "http://localhost/rk-aam/category/update/" + $data.id;
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
});