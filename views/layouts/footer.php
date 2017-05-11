  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/chart.js"></script>
  <script src="assets/js/toolkit.js"></script>
  <script src="assets/js/application.js"></script>
  <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.14/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/src/bootstrap-tagsinput-angular.js"></script>
  <script src="assets/src/bootstrap-tagsinput.js"></script>
  <!-- drp req. prerequisites -->
  <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <!-- date range picker -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


  <!-- EVENT VOTING PERIOD -->
  <script type="text/javascript">
    $(function() {

      $('input[name="datefilter"]').daterangepicker({
       autoUpdateInput: true,
       locale: {
        cancelLabel: 'Clear'
      }
    });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        $('input[name="startDate"]').val(picker.startDate.format('YYYY-MM-DD'));
        $('input[name="endDate"]').val(picker.endDate.format('YYYY-MM-DD'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $('input[name="startDate"]').val('');
        $('input[name="endDate"]').val('');
      });

    });

  </script>
  <!-- date range picker -->
  <script type="text/javascript">
    $(function() {

      $('input[name="eventDate"]').daterangepicker({
       autoUpdateInput: true,
       locale: {
        cancelLabel: 'Clear'
      }
    });

      $('input[name="eventDate"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        $('input[name="startEventDate"]').val(picker.startDate.format('YYYY-MM-DD'));
        $('input[name="endEventDate"]').val(picker.endDate.format('YYYY-MM-DD'));
      });

      $('input[name="eventDate"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        $('input[name="startEventDate"]').val('');
        $('input[name="endEventDate"]').val('');
      });

    });
  </script>
  <!-- END OF EVP -->

  <script>
       // execute/clear BS loaders for docs
       $(function(){
         if (window.BS&&window.BS.loader&&window.BS.loader.length) {
           while(BS.loader.length){(BS.loader.pop())()}
         }
     })
       $(document).ready(function() {
        $('#user-data').DataTable();
      } );                   
    </script>
<!-- voting period datatable -->
    <script>
     $(document).ready(function() {
       $('#votingPeriod').DataTable();
     } );
   </script>
<!-- events datable -->
   <script>
     $(document).ready(function() {
       $('#event-data').DataTable();
     } );
   </script>
<!-- activity datatable -->
<script>
  $(document).ready(function() {
    $('#act').DataTable({
      "sPaginationType": "full_numbers",
      "bSort": true,
      "bFilter": true
    });
  });
  
</script>


   <script type="text/javascript">
    $(function () {
      $("#datetimepicker1").datetimepicker();
    });
  </script>
  <!-- activity list javascript -->
  <script src="assets/js/todolist.js"></script>
  <script>
    $("tag").tagsinput('items');
  </script>
  
</body>
</html>