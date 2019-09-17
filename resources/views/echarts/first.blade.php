
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
    <!-- 引入 echarts.js -->
    <script src="{{URL::asset('js/echarts.min.js')}}"></script>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width: 100%; min-height:200px;"></div>
    <script type="text/javascript">
	var myChart = echarts.init(document.getElementById('main'));

     var data;

option = {
    title : {
        text: 'Ticket des Mitarbeiters',
        subtext: 'Colen Concept GmbH',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
	/*
    legend: {
        type: 'scroll',
        orient: 'vertical',
        right: 10,
        top: 20,
        bottom: 20,
       // data: data.legendData

      //  selected: data.selected
    },
	*/
    series : [
        {
            name: 'Ticket des Mitarbeiters',
            type: 'pie',
            radius : '55%',
            center: ['40%', '50%'],
           // data: data.seriesData,
		    data:[
                {value:400, name:'tmu'},
                 
                {value:235, name:'mpa'}
             ],
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






        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
</body>
</html>