$(document).ready(function () {

    var table = $('#example').DataTable({
        "ajax": base_url() + "report/countperstorelimit",
        "sAjaxDataProp": "",
        "columns": [
            { "data": "store" },
            { "data": "store_name" },
            { "data": "count_ok" },
            { "data": "count_no" },
            { "data": "count_na" }
        ],
        "order":[[3, "desc"]],
        "bLengthChange": false,
        "pageLength": 5
    });

    var sum_list_item = $('#list_item_checklist').DataTable({
    	"ajax": base_url() + "report/countperitem",
    	"sAjaxDataProp": "",
    	"columns": [
            { "data": "item_id" },
            { "data": "item_name" },
            { "data": "category_id" },
            { "data": "category_name" },
            { "data": "count_ok" },
            { "data": "count_no" },
            { "data": "count_na" }
    	],
    	"order": [
    		[2, "asc"]
        ],
        "rowGroup": {
            'dataSrc': 'category_name',
            'startRender': function (rows, group) {
            	var count_ok = rows
            		.data()
            		.pluck('count_ok')
            		.reduce(function (a, b) {
            			return a + b * 1;
                    }, 0);
                    
                var count_no = rows
                	.data()
                	.pluck('count_no')
                	.reduce(function (a, b) {
                		return a + b * 1;
                    }, 0);
                    
                var count_na = rows
                	.data()
                	.pluck('count_na')
                	.reduce(function (a, b) {
                		return a + b * 1;
                	}, 0);

            	return $('<tr/>')
                    .append('<td colspan="1">Summary for ' + group + '</td>')
                    .append('<td></td>')
            		.append('<td>' + count_ok + '</td>')
                    .append('<td>' + count_no + '</td>')
                    .append('<td>' + count_na + '</td>');
            }
        },
        "columnDefs": [{
        		"targets": [0,2],
        		"visible": false,
        		"searchable": false
        	},
        ]
    });

    $.ajax({
        type: "POST",
        url: base_url() + 'report/countpermonthyear',
        async: false,
        dataType: "json",
        success: function (response) {
            donutChart(response[0]);
            sm_box(response[0]);    
        }
    });

    function sm_box(params)
    {
        console.log(params);
        
        $('#sm-box-ok').html(params.count_ok);
        $('#sm-box-no').html(params.count_no);
        $('#sm-box-na').html(params.count_na);
    }    
    
    function donutChart(params) 
    {
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieChart = new Chart(pieChartCanvas)
        var PieData = [
            {
                value: params.count_no,
                color: '#f56954',
                highlight: '#f56954',
                label: 'NO'
            },
            {
                value: params.count_na,
                color: '#f39c12',
                highlight: '#f39c12',
                label: 'N/A'
            },
            {
                value: params.count_ok,
                color: '#3c8dbc',
                highlight: '#3c8dbc',
                label: 'OK'
            },
        ]
        var pieOptions = {
            //Boolean - Whether we should show a stroke on each segment
            segmentShowStroke: true,
            //String - The colour of each segment stroke
            segmentStrokeColor: '#fff',
            //Number - The width of each segment stroke
            segmentStrokeWidth: 2,
            //Number - The percentage of the chart that we cut out of the middle
            percentageInnerCutout: 50, // This is 0 for Pie charts
            //Number - Amount of animation steps
            animationSteps: 100,
            //String - Animation easing effect
            animationEasing: 'easeOutBounce',
            //Boolean - Whether we animate the rotation of the Doughnut
            animateRotate: true,
            //Boolean - Whether we animate scaling the Doughnut from the centre
            animateScale: true,
            //Boolean - whether to make the chart responsive to window resizing
            responsive: true,
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            //String - A legend template
            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
    }

});