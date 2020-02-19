<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row">
        <div id="main" class="content col-12 col-lg-4 col-md-6 col-sm-12" style="position: relative; left:0%; width: 50%;height:400px; float:center; display:inline"></div>
        <div id="main2" class="content col-12 col-lg-4 col-md-6 col-sm-12" style="position: relative; left:0%; width: 50%;height:400px; float:center; display:inline"></div>
        <div id="main3" class="content col-12 col-lg-4 col-md-6 col-sm-12" style="position: relative; left:0%; width: 50%;height:400px; float:center; display:inline"></div>
        <input type="text" id="AjaxData" hidden>
    </div>

</div>


<script>

var data;
var startTmp;
var endTmp;

//end = 1262217600
//fetchData();
//drawGraphic(data);

function fetchData()
{
      var tmpData;
      $.ajax({
        url: "{{url('queryAllTickets')}}",
        data: { "start":startTmp, "end":endTmp},
        dataType: 'json',
        async: false,
        success: function (msg){
        $("#AjaxData").data(msg);
        data = msg;

        }
    });
     //return tmpData;
}

function drawGraphic()
  {
    var myChart = echarts.init(document.getElementById('main'));
    var myChart2 = echarts.init(document.getElementById('main2'));
    var myChart3 = echarts.init(document.getElementById('main3'));



   var myData = genData(data.dataTicketEmployee,'user');
   var myData2 = genData(data.dataTicketPrio,'prio');
   var myData3 = genData(data.dataTicketStatus,'status');

  // console.log(data);
  //console.log(data.dataTicketEmployee);

    option = {
    title : {
        padding: 15,
        text: 'Tickets/Employees\n',
        x:'center'
        },

    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'horizontal',
        x: 'center',
        y: 'bottom',
        data: myData.seriesData.name,
        formatter: function (params) {

          for (var i = 0; i < option.series[0].data.length ; i++) {
              if (option.series[0].data[i].name == params) {
                 return params +": "+ option.series[0].data[i].value;
              }
          }
        }


    },


    series: [
        {
            name:'Tickets/Employees',
            type:'pie',
            radius: '60%',
            avoidLabelOverlap: false,
            label: {
                normal: {
                            show: true,
                            position: 'inner',
                            formatter: '{d}',
                            fontSize: 10
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:myData.seriesData,
        }
    ]
};

        option2 = {
    title : {
        padding: 15,
        text: 'Tickets/Prios',
        x:'center'
        },
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'horizontal',
        x: 'center',
        y: 'bottom',
        data: myData2.seriesData.name,
        formatter: function (params) {

          for (var i = 0; i < option2.series[0].data.length; i++) {
              if (option2.series[0].data[i].name == params) {
                 return params +": "+ option2.series[0].data[i].value;
              }
          }
        }

    },
    series: [
        {
            name:'Tickets/Prios',
            type:'pie',
            radius: '60%',
            avoidLabelOverlap: false,
            label: {
                normal: {
                            show: false,
                            position: 'inner',
                            formatter: '{d}',
                            fontSize: 10
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:myData2.seriesData,
        }
    ]
};





        option3 = {
    title : {
        padding: 15,
        text: 'Tickets/Statuses',
        x:'center'
        },
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b}: {c} ({d}%)"
    },
    legend: {
        orient: 'horizontal',
        x: 'center',
        y: 'bottom',
        data: myData3.seriesData.name,
        formatter: function (params) {
        console.log(params.length);
          for (var i = 0; i < option3.series[0].data.length; i++) {

                if (option3.series[0].data[i].name == params) {
                 return params +": "+ option3.series[0].data[i].value;
                }
          }
        }

    },

    series: [
        {
            name:'Tickets/Statuses',
            type:'pie',
            radius: '60%',
            avoidLabelOverlap: false,
            label: {
                normal: {
                            show: false,
                            position: 'inner',
                            formatter: '{d}',
                            fontSize: 10
                },
                emphasis: {
                    show: true,
                    textStyle: {
                        fontSize: '30',
                        fontWeight: 'bold'
                    }
                }
            },
            labelLine: {
                normal: {
                    show: false
                }
            },
            data:myData3.seriesData,
        }
    ]
};




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
}
    function genData(arr, option) {

    var legendData = [];
    var seriesData = [];

    for (var i= 0; i< arr.length; i++ ) {

    if (option == 'user') {
        name = arr[i].name;
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

    function refreshData(startTmp, endTmp){

     console.log("call refresh");
     console.log("start:" + startTmp);
     console.log("end:" + endTmp);
     var dataUpdated;

    $.ajax({
        //type: "POST",
        //url: "{{route('queryAllTickets')}}/" + startTmp + "/" + endTmp,
        url: "{{url('queryAllTickets')}}",
        dataType: 'json',
        data: { "start": startTmp, "end":endTmp},
        beforeSend: function(jqXHR, settings) {
        console.log(settings.url);
        },
        success: function (msg){
        $("#AjaxData").data(msg);
        dataUpdated = msg;

        }

    });
    console.log(dataUpdated);

     //更新数据
      /*var option = myChart.getOption();
      option.series[0].data = data;
      myChart.setOption(option);*/
}
    </script>
    <br/>
