$(document).ready(function () {
     /* Get month */
    getMonth('filter_month');
    getYear('filter_year');

    var table = $('#example').DataTable({
        "ajax": base_url() + "report/selectdetailCountNa",
        "sAjaxDataProp": "",
        "columns": [
            { "data": "store" },
            { "data": "store_name" },
            { "data": "item_name" },
            { "data": "month" },
            { "data": "year" },
            { "data": "count_na" },
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