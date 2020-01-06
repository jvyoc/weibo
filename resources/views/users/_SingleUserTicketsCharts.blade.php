<div class="container">
    <div class="row">
        
        <div id="main2" class="content col-12 col-lg-4 col-md-6 col-sm-6" style="position: relative; left:0%; width: 100%;height:400px; float:center; display:inline"></div>
        <div id="main3" class="content col-12 col-lg-4 col-md-6 col-sm-6" style="position: relative; left:0%; width: 100%;height:400px; float:center; display:inline"></div>
        <input type="text" id="AjaxData" hidden> 
    </div>

</div>


<script>
    
    var myChart2 = echarts.init(document.getElementById('main2'));
    var myChart3 = echarts.init(document.getElementById('main3'));
    
    var data;
    
     
    $.ajax({
        url: "{{url('queryUserTickets')}}" + "/" + {{$user->id}},
        dataType: 'json',
        async: false,
        success: function (msg){
        $("#AjaxData").data(msg);
        data = msg;
       
        }
    });
    
   
   var myData2 = genData(data.dataTicketPrio,'prio');
   console.log(myData2);
   var myData3 = genData(data.dataTicketStatus,'status');
                              
  // console.log(data);
  //console.log(data.dataTicketEmployee);
    
    
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
            radius: '70%',
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
            radius: '70%',
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



       
       
        myChart2.setOption(option2);
        window.addEventListener("resize", function(){
        myChart2.resize();
        });

        myChart3.setOption(option3);
        window.addEventListener("resize", function(){
        myChart3.resize();
        });
        
    </script>
    <br/>