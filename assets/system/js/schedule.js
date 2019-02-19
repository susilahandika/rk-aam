$(document).ready(function () {
    var table = $('#example').DataTable({
        "ajax": base_url() + "schedule/select",
        "sAjaxDataProp": "",
        "columns": [
            { "data": "id" },
            { "data": "region_id" },
            { "data": "region_name" },
            { "data": "created_date" },
            { "data": "full_name" },
            { "data": "status" },
            {
                "data": "null",
                // "defaultContent": '<a href="#" class="btn btn-warning btn-flat btn-sm" id="btn-edit">Edit</a>'
            },
        ],
        "columnDefs": [{
        	"targets": [0],
        	"visible": false,
        	"searchable": false,
        }, {
        	// puts a button in the last column
        	targets: [-1],
        	render: function (a, b, data, d) {
        		if (data.status == 'input') {
        			return '<a href="#" class="btn btn-warning btn-flat btn-sm" id="btn-edit">Edit</a>';
        		}
        		return '<a href="#" class="btn btn-warning btn-flat btn-sm disabled" id="btn-edit" disabled="disabled">Edit</a>';
        	}
        }],
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) { 
        	if (aData.status == "approve") {
        		$('td', nRow).css('background-color', '#fff5b2');
        	} 
        }
    });

    /* Button edit */
    $('#example tbody').on('click', '#btn-edit', function (e) {
    	e.preventDefault();
        var data_table = table.row($(this).parents('tr')).data();
        
        window.location.href = base_url() + 'schedule/edit/' + data_table.id;

    });
    /* ./Button edit */
});