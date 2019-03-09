function getCategory(id)
{
    $.ajax({
    	type: "GET",
    	url: base_url() + 'category/select',
        dataType: "json",
		cache:false,
		// async :false,
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
		// async :false,
    	success: function (response) {
    		$('#' + id).html('');
    		$('#' + id).append('<option value="">Department</option>');
    		$.each(response, function (i, value) {
    			//  $('#dept_id').html('<option>asd</option>');
    			$('#' + id).append('<option value="' + value.id + '">' + value.dept_name + '</option>');
    		});
    	}
    });
}

function getPosition(id) {
	$.ajax({
		type: "GET",
		url: base_url() + 'user/position',
		dataType: "json",
		cache: false,
		async: false,
		success: function (response) {
			$('#' + id).html('');
			$('#' + id).append('<option value="">Position</option>');
			$.each(response, function (i, value) {
				//  $('#dept_id').html('<option>asd</option>');
				$('#' + id).append('<option value="' + value.id + '">' + value.position_name + '</option>');
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
		// async :false,
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

function getUser(id) {
	$.ajax({
		type: "GET",
		url: base_url() + 'user/user',
		dataType: "json",
		cache: false,
		async :false,
		success: function (response) {
			// $('#' + id).html('');
			// $('#' + id).append('<option value="">User</option>');
			$.each(response, function (i, value) {
				//  $('#dept_id').html('<option>asd</option>');
				$('#' + id).append('<option value="' + value.id + '">' + value.full_name + '</option>');
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
		// async :false,
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

function getMonth(id) {
	$('#' + id).append('<option value="">Month</option>');
	var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

	for (let index = 0; index < month.length; index++) {
		$('#' + id).append('<option value="' + (index + 1) + '">' + month[index] + '</option>');
	}
}

function getYear(id) {
	$('#' + id).append('<option value="">Year</option>');
	var year = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019];

	for (let index = year.length - 1; index > 0; index--) {
		$('#' + id).append('<option value="' + year[index] + '">' + year[index] + '</option>');
	}
}

function showMessageDialog(id, msg, type) {
	$("#" + id).html('<div class="alert alert-' + type + '">' + msg + '</div>');
	$("#" + id).show();

	setTimeout(function () {
		// $("#" + id).hide('slow');
		$("#" + id).hide('slow', function () {
			// location.reload();
		});
	}, 3000);
}

function lastPart(){
	var url = $(location).attr('href').replace(/\/+$/, ''), //rtrim `/`
	parts = url.split("/"),
	last_part = parts[parts.length - 1];

	return last_part;
}
