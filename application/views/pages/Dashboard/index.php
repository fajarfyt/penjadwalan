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
            <table id="table" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Crane</th>
                  <th>Deskripsi</th>
                  <th>Label</th>
                  <th>Sparepart</th>
                  <th>Durasi</th>
                </tr>
              </thead>
              <tbody>
                  <?php foreach($schedules as $k) { ?>
                    <tr>
                      <td><?= $k->tanggal; ?></td>
                      <td><?= $k->id_crane; ?></td>
                      <td><?= $k->deskripsi; ?></td>
                      <td><?= $k->label; ?></td>
                      <td><?= $k->sparepart_name; ?></td>
                      <td><?= $k->durasi.' JAM'; ?></td>
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