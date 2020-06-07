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
            <form action="<?php echo site_url('Testing/add')?>" method="post"> 
                <div class ="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <select  name="id_crane" class="form-control" required>
                                <option value="" selected="selected">Pilih Crane : </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                          <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required/>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" name="sparepart_name" class="form-control" placeholder="Nama Sparepart" required/>
                        </div>
                    </div>

                </div>

                <div class ="row">
                  <div class="col-sm-3">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <input type="number" name="hour_meter" class="form-control" placeholder="Hour Meter" required/>
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">JAM</span>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <input type="number" name="breakdown" class="form-control" placeholder="Breakdown" required/>
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">JAM</span>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <input type="number" name="shutdown" class="form-control" placeholder="Shutdown" required/>
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2">JAM</span>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" name="bobot" class="form-control" placeholder="Bobot SP" />
                        </div>
                    </div>
                </div>

                <div class ="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Maintainence"></textarea>
                      </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <input  type="submit" name="process" id="process" class="btn btn-outline-primary" value="SUBMIT">
                </div>
            </form>
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