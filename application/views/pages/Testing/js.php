<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-rowgroup/js/dataTables.rowGroup.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-rowgroup/js/rowGroup.bootstrap4.min.js') ?>"></script>
<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo base_url('assets/script/sweet-alerts.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<!-- Bootsrap Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>

<script type="text/javascript">

    var table;
    
    $(document).ready(function() {
    
        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            // todayBtn: true,
            todayHighlight: true,  
        });
    
    });

    function get() {
        $.ajax({
            url: "<?php echo site_url('testing/add')?>",
            type: 'GET',
            success: function(data) {
                console.log(data);
                window.location.href = "<?php echo site_url('testing/print/')?>" + data;
            }
        });
    }
</script>