<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>General Form</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Pengajuan Klaim Asuransi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url().'c_agency/aksi_tambah_klaim'; ?>" role="form" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                  <div class="form-group">
                    <label for="pemegang_polis">Nama Pemegang Polis</label>
                    <input type="text" class="form-control" id="pemegang_polis" name="pemegang_polis" placeholder="Masukkan Nama" required>
                  </div>

                  <div class="form-group">
                    <label for="pengajuan_klaim">Form Pengajuan klaim</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pengajuan_klaim" name="pengajuan_klaim" accept="image/*" required>
                        <label class="custom-file-label" for="pengajuan_klaim">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="identitas">Identitas (E-KTP/SIM/PASSPORT)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="identitas" name="identitas" accept="image/*" required> 
                        <label class="custom-file-label" for="identitas">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="form_polis">Form Polis</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="form_polis" name="form_polis" accept="image/*" required>
                        <label class="custom-file-label" for="form_polis">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          
<!---------------------------------------------------------------------------------++++++++-------------------------------------------------------------------->
            <!-- Horizontal Form -->
            <!-- <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Horizontal Form</h3>
              </div>
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>

              </form>
            </div> -->
<!---------------------------------------------------------------------------------++++++++-------------------------------------------------------------------->

          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>