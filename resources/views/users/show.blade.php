@extends('layouts.default')
@section('title', 'Tickets Overview')

@section('content')
   <script src="{{URL::asset('js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery-1.12.4.js')}}"></script>    
    <script src="{{URL::asset('js/jquery-ui.js')}}"></script>   
    <script src="{{URL::asset('js/jquery.dataTables.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/jquery-ui.css')}}"> 
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">  
    <link rel="stylesheet" href="{{URL::asset('css/jquery.dataTables.min.css')}}">
    <script src="{{URL::asset('js/echarts.min.js')}}"></script>

<div id="main" style="width: 100%; min-height:200px;"></div>
    <script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main'));

     var data;

option = {
    title : {
        text: 'Overview of your tickets',
        subtext: 'Smart Heads GmbH',
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
       // data: data.legendDataHeads 

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


    
    
 <table id="example" class="display" width="100%"></table>
    <script>
        
         
//example 1
// var dataSet = [
//     [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "2011/04/25", "$320,800" ],
//     [ "Garrett Winters", "Accountant", "Tokyo", "8422", "2011/07/25", "$170,750" ],
//     [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "2009/01/12", "$86,000" ],
//     [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "2012/03/29", "$433,060" ],   
//     [ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "2009/12/09", "$85,675" ]
// ];
 

//     $('#example').DataTable( {
//         data: dataSet,   
    
//         columns: [
//             { title: "Name" },
//             { title: "Position" },
//             { title: "Office" },
//             { title: "Extn." },
//             { title: "Start date" },
//             { title: "Salary" }
//         ]
    
//     } );

    $('#example').DataTable( {
        "ajax": "{{url('getJson')}}",
        columns:[
        {data: 'content'},
        {data: 'prio'},
        {data: 'status'},
        {data: 'user_id'}
        ]

    } );



</script>

@stop