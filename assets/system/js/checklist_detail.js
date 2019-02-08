$(document).ready(function () {
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
    });

    $('#form-store-checklist').submit(function (e) { 
        e.preventDefault();
        
        var totaldata = [];
        var datachecked = [];
        var status_img = true;
        
        $.each($("input[name^='choice']"), function(){            
            totaldata.push($(this).attr('name'));
        });

        $.each($("input[name^='choice']:checked"), function(){            
            datachecked.push($(this).attr('name'));
        });

        $.each($("input[name^='img_checklist']"), function () {
            if($("#" + $(this).attr('name')).val() == ''){
                status_img = false;
            }
        });

        if(status_img == false){
            var msg = 'Please upload your image';
            $("#alert-msg").html('<div class="alert alert-danger">' + msg + '</div>');
            $("#alert-msg").show();

            setTimeout(function () {
            	$("#alert-msg").hide('slow');
            }, 2000);

            return false;
        }

        if(datachecked.length !== totaldata.length/3){
            var msg = 'Please complete your checklist!'

            $("#alert-msg").html('<div class="alert alert-danger">' + msg + '</div>');
            $("#alert-msg").show();

             setTimeout(function () {
             	$("#alert-msg").hide('slow');
             }, 2000);

            return false;
        }

        // Get form
        var form = $('#form-store-checklist')[0];

        // Create an FormData object 
        var _data = new FormData(form);

        $.ajax({
            type: "POST",
            async :false,
            cache: false,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            url: base_url() + "checklist/store",
            data: _data,
            dataType: "json",
            success: function (response) {
                var msg = '';

                if(response['code'] != 0){
                    if(response['code'] == 1062){
                        msg = 'Checklist already exists!';
                    } else{
                        msg = response['message'];
                    }

                    $("#alert-msg").html('<div class="alert alert-danger">' + msg + '</div>');
                    $("#alert-msg").show();

                    setTimeout(function () {
                    	$("#alert-msg").hide('slow');
                    }, 5000);
                }
            }
        });
      
    });

  });