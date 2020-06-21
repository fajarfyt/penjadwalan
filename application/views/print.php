<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Animated Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- Row Group -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-rowgroup/css/rowGroup.bootstrap4.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootsrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <!-- Select2 -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/script/select2/css/bootsrap-select.min.css') ?>">

</head>
<body onload="window.print()">
<style>
#table2 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  padding-top: 30px;
}

#table2 td, #table2 th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 25px;
}

#table2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  font-size: 30px;
}
</style>
    <div class="row">
        <div class="col-sm-6">
            <img src="<?php echo base_url("uploads/logo.jpeg"); ?>" alt="Logo" style="width:400px;height:300px;">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <p style="font-weight:bold; font-size:40px; font-family: Trebuchet MS, Arial, Helvetica, sans-serif; text-decoration: underline; text-align: center;" >Hasil Perhitungan Penjadwalan</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p style="font-size:25px; font-family: Trebuchet MS, Arial, Helvetica, sans-serif;  text-align: left; padding-top: 30px; padding-left: 30px;" >
                Mesin Crane : <?= $schedule['id_crane'];?>
            </p>
            <p style="font-size:25px; font-family: Trebuchet MS, Arial, Helvetica, sans-serif;  text-align: left; padding-left: 30px;" >
                Deskripsi : <?= $schedule['deskripsi'];?>
            </p>
        </div>
        
        <div class="col-sm-6">
            <p style="font-size:25px; font-family: Trebuchet MS, Arial, Helvetica, sans-serif;  text-align: left; padding-top: 30px; padding-right: 30px; " >
                Nama Sparepart : <?= $schedule['sparepart_name'];?>
            </p>
        </div>
    </div>
    <div>
    <br>
    <table id="table2" class="table table-hover">
        <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jenis Keursakan</th>
            <th>Durasi Perbaikan</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $schedule['tanggal']; ?></td>
                <td><?= $schedule['label']; ?></td>
                <td><?= $schedule['durasi'].' JAM'; ?></td>
            </tr>
        </tbody>
    </table>
    </div>
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
</body>
</html>