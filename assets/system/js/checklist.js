$(document).ready(function () {
    $('#alert-msg').hide();

    getRegion('region_id');
    getStore('store_id');

    $('#form-start-checklist').submit(function (e) {
        e.preventDefault();

        var region_id = $('#region_id').val();
        var store_id =$('#store_id').val();

        var _data = {
            'region_id': region_id,
            'store_id': store_id
        };

        $.ajax({
            type: "POST",
            url: base_url() + "checklist/start",
            data: _data,
            // dataType: "json",
            success: function (response) {
                var msg = '';

                if(response['error'] == 13){
                    $.each(response['message'], function (key, value) { 
                          msg += '<p>' + value + '</p>';
                    });

                    $("#alert-msg").html('<div class="alert alert-danger" style="width:50%; margin:auto;">' + msg + '</div>');
                    $("#alert-msg").show();
                    // console.log(response['message']);
                }else{
                    
                    window.location.replace(response['url']);
                    // console.log(response);
                }
            }
        });
    });
});