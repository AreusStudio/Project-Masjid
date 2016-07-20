
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/frontend/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/frontend/bower_components/metisMenu/dist/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/frontend/dist/js/sb-admin-2.js')?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url('assets/frontend/bower_components/datatables/media/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/frontend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')?>"></script>
      <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <!--Datepicker-->
    <!-- jQuery Version 1.11.0 -->
 <script src="<?php echo base_url() ?>assets/js/jquery-1.11.0.js"></script>


<!--file include Bootstrap js dan datepickerbootstrap.js-->

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/frontend/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

<!-- Fungsi datepickier yang digunakan -->
<script type="text/javascript">
 $('.datepicker').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
    });
</script>

</body>

</html>
