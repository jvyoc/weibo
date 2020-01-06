
<table id="example" class="display" width="100%" top=20px></table>
    <script>
        
         


    $('#example').DataTable( {
        "ajax": "{{route('getJson')}}",
        columns:[
         {data: 'user'},
        {data: 'content'},
        {data: 'prio'},
        {data: 'status'}
       
        ]

    } );



</script>