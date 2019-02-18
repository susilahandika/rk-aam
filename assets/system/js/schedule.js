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
                "defaultContent": '<a href="#" class="btn btn-warning btn-flat btn-sm" id="btn-edit">Edit</a>'
            },
        ],
        "columnDefs": [{
        	"targets": [0],
        	"visible": false,
        	"searchable": false
        }]
    });

    /* Button edit */
    $('#example tbody').on('click', '#btn-edit', function (e) {
    	e.preventDefault();
        var data_table = table.row($(this).parents('tr')).data();
        
        window.location.href = base_url() + 'schedule/edit/' + data_table.id;

    });
    /* ./Button edit */
});