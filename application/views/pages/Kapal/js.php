<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
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
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<!?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script> -->


<script type="text/javascript">
  var save;
  var table;
  $(document).ready(function() {

		$("#table").DataTable({
	     	"responsive": true,
	     	"autoWidth": false,
            
            "dom": '<"top"<"row"<"col-md-7 actions action-btns"B><"col-sm-12 col-md-2"l><"col-md-3"f>>><"clear">rt<"bottom"<"actions">p>',
            
            "oLanguage": {
             	"sSearch": "Cari : "
            },
            
            "aLengthMenu": [
            	[4, 10, 15, 20],
            	[4, 10, 15, 20]
          	],
          	
            bInfo: false,
          	"pageLength": 10,
          	buttons: [{
              	action: function() {
              	},
            }],

            initComplete: function(settings, json) {
              $(".dt-buttons .btn").removeClass("btn-secondary");
          	},
	    });

	    // To append actions dropdown before add new button
  		var actionButtons = $(".actions-buttons")
  		actionButtons.insertBefore($(".top .actions .dt-buttons"))
  })

  

</script>
