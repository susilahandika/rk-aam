$(document).ready(function () {
    $('#alert-msg').hide();

    getRegion('region_id');
    getStore('store_id');

    $('#region_id').val($('#hdn_region').val());

    $('#form-start-checklist').submit(function (e) {
        e.preventDefault();

        var region_id = $('#hdn_region').val();
        var dept_id = $('#hdn_dept').val();
        var store_id =$('#store_id').val();
        var user_id = $('#hdn_id').val();

        var _data = {
            'region_id': region_id,
            'dept_id': dept_id,
            'store_id': store_id,
            'user_id': user_id
        };

        $.ajax({
            type: "POST",
            url: base_url() + "checklist/start",
            data: _data,
            dataType: "json",
            success: function (response) {
                var msg = '';
                // console.log(response);
                
                if(response['error'] == 13){
                    $.each(response['message'], function (key, value) { 
                          msg += '<p>' + value + '</p>';
                    });

                    $("#alert-msg").html('<div class="alert alert-danger" style="width:50%; margin:auto;">' + msg + '</div>');
                    $("#alert-msg").show();
                    
                }else{
                    window.location.href = response['url'];
                }
            }
        });
    });
});