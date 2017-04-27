  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/dataTables.bootstrap.min.js"></script>
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
  </body>
</html>