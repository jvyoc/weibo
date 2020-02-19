<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="container">
  <div class="row">

  <div class="btn-group col-6 col-lg-6 col-md-6 col-sm-6" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary">Graphic</button>
          <button type="button" class="btn btn-secondary">Table</button>
  </div>
  <div id="reportrange" class="content col-6 col-lg-6 col-md-6 col-sm-6" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
  </div>
</div>
</div>

<script type="text/javascript">

$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html('from ' + start.format('DD.MM.YYYY') + ' to ' + end.format('DD.MM.YYYY'));
        startTmp = start.unix();
        endTmp = end.unix();
        fetchData();
        console.log(data.dataTicketEmployee.length);
        if (data.dataTicketEmployee.length > 0)
        {
           drawGraphic(data);
        };



        // refreshData(start.unix(), end.unix());
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
   // startTmp = 946684800;
    //endTmp = 1262217600;





});
</script>

