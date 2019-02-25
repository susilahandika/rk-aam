$(document).ready(function () {
    /* Get region */
    getRegion('region_id');

    /* Get department */
    getDepartment('dept_id');

    $('select').select2();

    /* Button set matriks */
    $('#btn-set-matriks-app').click(function (e) { 
        e.preventDefault();

        var region_id = $('#region_id').val();
        var dept_id = $('#dept_id').val();

        var _data = {
            'region_id': region_id,
            'dept_id': dept_id
        };

        $.ajax({
            type: "POST",
            url: base_url() + "matriksapp/getMatriks",
            data: _data,
            cache: false,
            async :false,
            success: function (response) {
                $('#box-set-matriks-app').hide('slow', function () { 
                    $('#input-matriks-app').html('');
                    $.each(response, function (index, value) {
                        body_html = '<div class="input-group">' +
                            '<span style="min-width:50px; text-align:left;" class="input-group-addon" >' + index + '</span >' +
                            '<select style="width:100%; max-height:50px;" class="form-control input-xs select-multiple" id="user_app' + index + '" name="user_app' + index + '[]" multiple="multiple"></select>' +
                            '<span class="input-group-btn">' +
                                '<span class="btn btn-danger btn-flat" id="bt-del-app"><i class="fa fa-times fa-lg" aria-hidden="true"></i></span>' +
                            '</span>' +
                            '</div>';

                        $('#input-matriks-app').append(body_html);
                        getUser('user_app' + index + '');
                        $('#user_app' + index + '').val(response[index]); // Select the option with a value of '' + index + ''
                        $('#user_app' + index + '').trigger('change'); // Notify any JS components that the value changed
                        $('#user_app' + index + '').select2();
                    });
                });
            }
        });
 
        $('#box-set-matriks-app').show('slow');
    });

    $("body").on('click', '#bt-del-app', function (event) {
        event.preventDefault();
        $(this).parents(':eq(1)').remove();
    });

    /* Button tambah user approve */
    $('#btn-add-app').click(function (e) { 
        e.preventDefault();

        var inputs = $("#input-matriks-app").find($("select"));

        var index = inputs.length;

        body_html = '<div class="input-group">' +
                        '<span style="min-width:50px; text-align:left;" class="input-group-addon" >' + (index + 1) + '</span >' +
                        '<select class="form-control input-sm select-multiple" id="user_app' + (index + 1) + '" name="user_app' + (index + 1) + '[]" multiple="multiple"></select>' +
                        '<span class="input-group-btn">' +
                        '<span class="btn btn-danger btn-flat" id="bt-del-app"><i class="fa fa-times fa-lg" aria-hidden="true"></i></span>' +
                        '</span>' +
                    '</div>';

        $('#input-matriks-app').append(body_html);
        getUser('user_app' + (index + 1));
        $('.select-multiple').select2();
    });

    /* Button simpan matriks approve */
    $('#btn-save-matriks').click(function (e) { 
        e.preventDefault();

        var select_form = [];
        var inputs = $("#input-matriks-app").find($("select"));
        var index = inputs.length;

        for (let i = 0; i < index; i++) {
            select_form[i] = $('#user_app' + (i + 1)).val();            
        }
        
        _data = {
            'region_id': $('#region_id').val(),
            'dept_id': $('#dept_id').val(),
            'select_form': select_form
        }

        $.ajax({
            type: "POST",
            url: base_url() + "matriksapp/store",
            data: _data,
            cache: false,
            success: function (response) {
                $("#main-msg").html('<div class="alert alert-success">' + response.message + '</div>');
                $("#main-msg").show();

                setTimeout(function () {
                    $("#main-msg").hide('slow');
                }, 2000);
            }
        });
        
    });
});