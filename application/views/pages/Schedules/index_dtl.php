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
          <li class="breadcrumb-item"><a href="#">Schedules</a></li>
          <li class="breadcrumb-item active">Detail</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">

      <div class="table-responsive animated bounceInUp">
        <div class="card">
          <!-- <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
          </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <div class="actions-buttons">
              <button type="button" class="btn btn-outline-primary text-bold-600" onclick="add()">
                  <i class="fas fa-plus"></i> ADD
              </button>
              <!-- <button type="button" class="btn btn-outline-danger text-bold-600">
                  <i class="fas fa-minus"></i> BULK DELETE
              </button> -->
            </div>
            <table id="table" class="table table-striped">
              <thead>
                <tr style="display: none;">
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
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

<?php $this->load->view('pages/Schedules/modal_dtl.php'); ?>  
<?php $this->load->view('pages/Schedules/js_dtl.php'); ?>