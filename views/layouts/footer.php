  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/src/bootstrap-tagsinput-angular.js"></script>
    <script src="assets/src/bootstrap-tagsinput.js"></script>

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
    <script type="text/javascript">
      
      $(function () {
          $("#datetimepicker1").datetimepicker();
      });
    </script>
  
    <!-- date time picker script -->
    <!-- <script type="text/javascript"
    src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
       src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
      src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
      src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'MM/dd/yyyy',
        language: 'en',
        pickTime: false
      });
    </script> -->
  <!-- activity list javascript -->
  <script src="assets/js/todolist.js"></script>
  <script>
    $("tag").tagsinput('items');
  </script>
  </body>
</html>