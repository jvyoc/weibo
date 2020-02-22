<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<div class="container">
  <div class="row">

  <div class="btn-group col-6 col-lg-6 col-md-6 col-sm-6" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary">Team View</button>
          <button type="button" class="btn btn-secondary">Personal View</button>
  </div>
  <div id="reportrange" class="content col-6 col-lg-6 col-md-6 col-sm-6" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
  </div>
</div>

<script>
//this is the block for datepicker

$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html('from ' + start.format('DD.MM.YYYY') + ' to ' + end.format('DD.MM.YYYY'));

       var startTmp = start.format('YYYY-MM-DD HH:mm:ss') ;
        var endTmp = end.format('YYYY-MM-DD HH:mm:ss');

        console.log(startTmp);
        console.log(endTmp);
        drawGraphic(startTmp, endTmp);



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

