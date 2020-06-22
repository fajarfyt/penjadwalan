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
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script src="<?php echo base_url('assets/chartjs/dist/chart.min.js') ?>"></script>
<script type="text/javascript">

    var table;
    
    $(document).ready(function() {
    
        //datatables
        $('#table').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'print'
            // ]
        });
    
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

</script>
<script>
var ctx = document.getElementById('mychart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= $tanggal; ?>,
        datasets: [{
            label: '4 Jam',
            data: <?= $berat; ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                // 'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }, {
            label: '2 Jam',
            data: <?= $ringan; ?>,
            backgroundColor: [
                // 'rgba(255, 99, 132, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(255, 206, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                // 'rgba(255, 99, 132, 1)',
                // 'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
                // 'rgba(75, 192, 192, 1)',
                // 'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }

});
</script>



