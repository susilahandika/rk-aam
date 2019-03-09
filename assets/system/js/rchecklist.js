$(document).ready(function () {
     /* Get month */
    getMonth('filter_month');
    getYear('filter_year');

    var table = $('#example').DataTable({
        "ajax": base_url() + "report/checklist/selectbyaam",
        "sAjaxDataProp": "",
        "columns": [
            { "data": "region_id" },
            { "data": "region_name" },
            { "data": "dept_id" },
            { "data": "dept_name" },
            { "data": "month" },
            { "data": "year" },
            { "data": "store" },
            { "data": "checklist_date" },
            { "data": "full_name" }
        ],
        "columnDefs": [
            {
                "targets": [0, 2],
                "visible": false,
            },
        ]
    });

    /* Button filter */
    $('.filter').on('keyup change', function () {
        // table.column(3).search(this.value).draw();
        table.search('');
        table.column($(this).data('columnIndex')).search(this.value).draw();
    });
    /* /.Button filter */

    function clearForm()
    {
         $('#id').val('');
         $('#category_name').val('');
         $('#dept_id').val('');
    }
});