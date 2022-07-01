<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Main Footer -->
<!-- <footer class="main-footer">
  </footer> -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/js/adminlte.min.js"></script>

<!-- JS scripts for table -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Alternate faculty -->

<script>
  $(document).ready(function() {
$('#pendingdates').on('change', function() {
    $('#displaydate').empty();
    $('select[name="alternatehour"]').empty();
    var leavedates = $(this).val();
    if(leavedates) {
      $.ajax({
        url:"<?php echo base_url('Employee_Controller/retrivedates')?>",
        type:"POST",
        dataType:'json',
        data:{
          presentdataid:leavedates
        },
        success:function(response)
        {
          $('#displaydate').empty();
          $('select[name="alternatehour"]').empty();
          var len = response.length;
          for( var i = 0; i<len; i++){
            var from = response[i]['from'];
            var to = response[i]['to'];
            $("#displaydate").append('<input type="date" class="form-control" name="alternatedate" id="alternatedate" min="'+from+'" max="'+to+'">');
            $('select[name="alternatehour"]').append('<option value="">Select the hour</option><option value="s1subject">S1</option><option value="s2subject">S2</option><option value="s3subject">S3</option><option value="s4subject">S4</option><option value="s5subject">S5</option><option value="s6subject">S6</option><option value="s7subject">S7</option><option value="s8subject">S8</option>');
          }
        }
      });
    }
});
});
</script>
<script>
$(document).ready(function() {
  $('#displaydate').on('change', function() {
    $('select[name="alternatehour"]').empty();
    $('select[name="alternatefaculty"]').empty();
    $('select[name="alternatehour"]').append('<option value="">Select the hour</option><option value="s1subject">S1</option><option value="s2subject">S2</option><option value="s3subject">S3</option><option value="s4subject">S4</option><option value="s5subject">S5</option><option value="s6subject">S6</option><option value="s7subject">S7</option><option value="s8subject">S8</option>');
  });
});
</script>
<!-- ALternate Faculty List -->
<script>
$(document).ready(function() {

$('select[name="alternatehour"]').on('change', function() {
  $('select[name="alternatefaculty"]').empty();
  var presentdataid = $('#pendingdates').val();
  var alternatedate = $('#alternatedate').val();
  var alternatehour = $('#alternatehour').val();
  $.ajax({
    url:"<?php echo base_url('Employee_Controller/retrievealternatefaculty')?>",
    type:"POST",
    dataType:'json',
    data:{
      presentdata_id:presentdataid,
      alternate_date:alternatedate,
      alternate_hour:alternatehour
    },
        success:function(response)
        {
          $('select[name="alternatefaculty"]').empty();
          var len = response.length;
            $('select[name="alternatefaculty"]').append('<option value="">Select the faculty</option>');
          for( var i = 0; i<len; i++){
            var faculty_id = response[i]['faculty_id'];
            var faculty_name = response[i]['faculty_name'];
            $('select[name="alternatefaculty"]').append('<option value="'+faculty_id+'">'+faculty_name+'</option>');
          }
        }
  });
});

});
</script> 
<script>
</script>
</body>
</html>