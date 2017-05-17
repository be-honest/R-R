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

  <footer class="footer">
    <div class="container">
      <div class="row">
        <!-- first column -->
          <div class="col-md-6">
            <a href="#" style="text-decoration: none;"><h5 class="title">About</h5></a>
            <a href="#" style="text-decoration: none;"><h5 class="title">Contact</h5></a>
            <a href=""><span class="icon icon-twitter"></span></a> &nbsp;
            <a href=""><span class="icon icon-facebook"></span></a> &nbsp;
            <a href=""><span class="icon icon-linkedin"></span></a> &nbsp;
            <a href=""><span class="icon icon-dribbble"></span></a> &nbsp;
            <a href=""><span class="icon icon-google-plus"></span></a>
            <p></p>
          </div>
        <!-- /first columnn -->


        <!-- second column -->
          <div class="col-md-6">
            <h5 class="title">the team</h5>
              <div class="row">
                <div class="col-md-3">
                  <a href="https://github.com/kemezike">
                    <img src="assets/img/team1.png" style="width: 30%;">
                  </a>
                  <p style="margin:0;">Kryce Earl Martus</p>
                  <p style="color:silver; font-size:smaller;">
                    <i>Back-End Developer</i>
                  </p>
                </div>
                <div class="col-md-3">
                  <a href="https://be-honest.github.io/portfolio/">
                    <img src="assets/img/cat.png" style="width: 25%;">
                  </a>
                  <p style="margin:0;">Honest R. Aguanta</p>
                  <p style="color:silver; font-size:smaller;">
                    <i>Front-End Developer</i>
                  </p>
                </div>
              </div>
           </div>
          <!-- /second column -->

          <!-- 3rd column:map -->
          <div class="col-md-6">
            <h5 class="title"></h5>
             
          </div>
          <!-- <hr style="border-color: #333; width: 100%; margin-top: 1rem;" > -->
     
    </div>
  </footer>
  

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

<!-- timer -->
  <script type="text/javascript">

// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use.

//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
//Default is that SSI method is uncommented, and PHP is commented:

var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
//var currenttime = '<? print date("F d, Y H:i:s", time())?>' //PHP method of getting server date

///////////Stop editting here/////////////////////////////////

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
  var output=(what.toString().length==1)? "0"+what : what
  return output
}

function displaytime(){
  serverdate.setSeconds(serverdate.getSeconds()+1)
  var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
  var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
  document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
  setInterval("displaytime()", 1000)
}

</script>
  <!-- Timer -->

<!-- img upload -->
<script type="text/javascript">
$(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });
</script>
</body>
</html>