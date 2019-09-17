<!DOCTYPE html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>Ticket Overview</title>	
	<style>
	<!-- id commentar -->
	#divCollapse{
	  position:relative; left:0px; top 0px;
	  width: 200px;
      height: 200px;
	  color: black;
	}
</style>
<!-- 	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>	  
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="js/echarts.min.js"></script> -->
	<script src="js/jquery-1.9.1.min.js"></script>	  
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<script src="js/echarts.min.js"></script> 
	
	<script>	
	
 
  </script>
</head>
<body>
	<div id="main" style="position: relative; left:6%; width: 25%;height:300px; float:left; display:inline"></div>
	<div id="main2" style="position: relative; left:13%;width: 25%;height:300px;float:left; display:inline"></div>
	<div id="main3" style="position: relative; left:20%;width: 25%;height:300px;float:left; display:inline"></div>
	<input type="text" id="AjaxData" hidden> 
	 <div w3-include-html="echartsTest3.html"></div> 
	<table id="divCollapse" class="display" style="width:0">
					<thead>
						<tr>
							<th>keyword</th>
							<th>prio</th>
							<th>user</th>
							<th>status</th>
							<th>More</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>keyword</th>
							<th>prio</th>
							<th>user</th>
							<th>status</th>	
							<th>More</th>							
						</tr>
					</tfoot>
	</table>
	<script>
	var myChart = echarts.init(document.getElementById('main'));
	var myChart2 = echarts.init(document.getElementById('main2'));
	var myChart3 = echarts.init(document.getElementById('main3'));
    var data;
     
	$.ajax({
        url: "queryTicket.php",
        dataType: 'json',
		async:false,
        success: function (msg) {
		$("#AjaxData").data(msg);
		data = msg;
        
        }
    });
	
	var myData = genData(data.dataTicketEmployee,'user');
	var myData2 = genData(data.dataTicketPrio,'prio');
	var myData3 = genData(data.dataTicketStatus,'status');
	console.log(myData);
	console.log(myData2);
	option = {
		title : {
        text: 'Ticket Overview/Employees',
        subtext: 'Ticket Manage',
        x:'center'
		},
		tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
		},
 
		series : [
        {
            user: 'Name',
            type: 'pie',
            radius : '55%',
            center: ['40%', '50%'],
            data: myData.seriesData,
		   
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
		]
	};
	option2 = {
		title : {
        text: 'Ticket Overview/Prios',
        subtext: 'Ticket Manage',
        x:'center'
		},
		tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
		},
 
		series : [
        {
            user: 'Name',
            type: 'pie',
            radius : '55%',
            center: ['40%', '50%'],
            data: myData2.seriesData,
		   
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
		]
	};
	
	option3 = {
		title : {
        text: 'Ticket Overview/Status',
        subtext: 'Ticket Manage',
        x:'center'
		},
		tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
		},
 
		series : [
        {
            user: 'Name',
            type: 'pie',
            radius : '55%',
            center: ['40%', '50%'],
            data: myData3.seriesData,
		   
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
		]
	};




function genData(arr, option) {
 
    var legendData = [];
    var seriesData = [];
   
    for (var i= 0; i< arr.length; i++ ) {
	
	if (option == 'user') {
        name = arr[i].user;
	}
	if (option == 'prio') {
        name = arr[i].prio;
	}
	if (option == 'status') {
        name = arr[i].status;
		}
        legendData.push(name);
        seriesData.push({
            name: name,
            value: arr[i].amount
        });
  
    }

    return {
        legendData: legendData,
        seriesData: seriesData,
    };

   
}


       
        myChart.setOption(option);
		window.addEventListener("resize", function(){
		myChart.resize();
		});
		myChart2.setOption(option2);
		window.addEventListener("resize", function(){
		myChart2.resize();
		});
		myChart3.setOption(option3);
		window.addEventListener("resize", function(){
		myChart3.resize();
		});
	</script>
	<script>
	var table = $('#divCollapse').DataTable( {
        
		//"ajax": "data.json",
		"ajax": "queryTicket.php",
		"scrollY": "380px",
        "paging": false,
		"aaSorting":[[1,"asc"]],
		"searching": false,	
        
		"columns":[
			{"data": "keyword"},
            {"data": "prio" },
			{"data": "user"},
			{"data": "status"},
			{"defaultContent": "<button >Detail</button>"}			
        ],
		dom: 'Bfrtip',
       buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
        ]

    } );
	/*
		$('#divCollapse tbody').on( 'click', 'button', function () {
		//console.log(table.row( $(this).parents('tr') ).data());
       var currentData = table.row( $(this).parents('tr') ).data();
		console.log(currentData);
		
		//todo: send the seleted data to the url for graphical overview
		//window.location.href = 'echartsTest3.html';
		});
		*/
	  </script>
	  </body>