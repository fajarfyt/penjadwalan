<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo $header; ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Schedules</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive animated bounceInUp">
        <div class="card">
          <div class="card-body">
            <!-- <div class="centered"> -->
              <div class="actions-buttons">
                <a type="button" class="btn btn-outline-primary text-bold-600" href="<?php echo base_url("uploads/Format.csv"); ?>">
                  <i class="fas fa-download"></i> DOWNLOAD TEMPLATE .CSV
                </a>
              </div>
              <br>
              <?php echo $this->session->flashdata('notif') ?>
              <form method="POST" action="<?php echo base_url() ?>index.php/import/process" enctype="multipart/form-data">
                <div  class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>UNGGAH FILE EXCEL</label>
                      <input type="file" name="userfile" class="form-control" accept="text/csv">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success">UPLOAD</button>
              </form>
            <!-- </div> -->
            <br>
            <table id="table" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Hour Meter</th>
                  <th>Breakdown</th>
                  <th>Shutdown</th>
                  <th>Sparepart</th>
                  <th>Label</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php foreach($data_import as $k) { ?>
                    <tr>
                      <td><?= $k->tanggal; ?></td>
                      <td><?= $k->hour_meter.' JAM'; ?></td>
                      <td><?= $k->breakdown.' JAM'; ?></td>
                      <td><?= $k->shutdown.' JAM'; ?></td>
                      <td><?= $k->sparepart.' JAM'; ?></td>
                      <td><?= $k->label; ?></td>
                      </tr>
                  <?php } ?>
                
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- Animated -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

<?php $this->load->view('pages/Import/js.php'); ?>