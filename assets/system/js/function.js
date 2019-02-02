function getCategory(id)
{
    $.ajax({
    	type: "GET",
    	url: base_url() + 'category/select',
        dataType: "json",
        cache:false,
    	success: function (response) {
            $('#' + id).html('');
            $('#' + id).append('<option value="">Category</option>');
    		$.each(response, function (i, value) { 
                //  $('#category_id').html('<option>asd</option>');
                $('#' + id).append('<option value="' + value.id + '">' + value.category_name + '</option>');
            });
    	}
    });
}

function getDepartment(id)
{
    $.ajax({
    	type: "GET",
    	url: base_url() + 'user/dept',
    	dataType: "json",
    	cache: false,
    	success: function (response) {
    		$('#' + id).html('');
    		$('#' + id).append('<option value="">Department</option>');
    		$.each(response, function (i, value) {
    			//  $('#dept_id').html('<option>asd</option>');
    			$('#' + id).append('<option value="' + value.department_id + '">' + value.department + '</option>');
    		});
    	}
    });
}

function getRegion(id) {
	$.ajax({
		type: "GET",
		url: base_url() + 'user/region',
		dataType: "json",
		cache: false,
		success: function (response) {
			$('#' + id).html('');
			$('#' + id).append('<option value="">Region</option>');
			$.each(response, function (i, value) {
				//  $('#dept_id').html('<option>asd</option>');
				$('#' + id).append('<option value="' + value.id + '">' + value.region_name + '</option>');
			});
		}
	});
}

function getStore(id) {
	$.ajax({
		type: "GET",
		url: base_url() + 'user/store',
		dataType: "json",
		cache: false,
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
