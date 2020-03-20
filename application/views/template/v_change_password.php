<?php

  switch ($this->session->userdata['role']) {
    case 1:
      $ctrl = "c_admin";
      $title = "Admin";
      break;
    case 2:
      $ctrl = "c_helpdesk";
      $title = "Helpdesk";
      break;
    case 3:
      $ctrl = "c_agency";
      $title = "Agency";
      break;
      
    default:
      # code...
      break;
  }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Change Password</h1>
        </div>
        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
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
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Merubah Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
  <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <?php if($this->session->userdata['role'] == 1) {?>
              <div class="card-body">
                    <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="sukses"){
                            echo "<div class='alert alert-success font-weight-bold text-center'>Password berhasil diganti.</div>";
                            }
                        }
                    ?>

                <?php echo validation_errors(); ?>
                <form method="post" action="<?php echo base_url().'c_admin/ganti_password_aksi'; ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru</label>
                  <input type="password" class="form-control" name="password_baru"  id="exampleInputEmail1" placeholder="Password Baru">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Ulangi Password</label>
                  <input type="password" class="form-control" name="password_ulang" id="exampleInputEmail1" placeholder="Ulangi Password">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            <?php }?>

<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <?php if($this->session->userdata['role'] == 2) {?>
              <div class="card-body">
                    <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="sukses"){
                            echo "<div class='alert alert-success font-weight-bold text-center'>Password berhasil diganti.</div>";
                            }
                        }
                    ?>

                <?php echo validation_errors(); ?>
                
                <form method="post" action="<?php echo base_url().'c_helpdesk/ganti_password_aksi'; ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru</label>
                  <input type="password" class="form-control" name="password_baru"  id="exampleInputEmail1" placeholder="Password Baru">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Ulangi Password</label>
                  <input type="password" class="form-control" name="password_ulang" id="exampleInputEmail1" placeholder="Ulangi Password">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            <?php }?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

            <?php if($this->session->userdata['role'] == 3) {?>
            
              <div class="card-body">
                    <?php
                        if(isset($_GET['alert'])){
                            if($_GET['alert']=="sukses"){
                            echo "<div class='alert alert-success font-weight-bold text-center'>Password berhasil diganti.</div>";
                            }
                        }
                    ?>

                <?php echo validation_errors(); ?>
                
                <form method="post" action="<?php echo base_url().'c_agency/ganti_password_aksi'; ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Baru</label>
                  <input type="password" class="form-control" name="password_baru"  id="exampleInputEmail1" placeholder="Password Baru">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Ulangi Password</label>
                  <input type="password" class="form-control" name="password_ulang" id="exampleInputEmail1" placeholder="Ulangi Password">
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            
            <?php }?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

          </div>
        </div>


      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>