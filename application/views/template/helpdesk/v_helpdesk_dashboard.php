<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard Jumlah Data Masuk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

      <div class="row">
        <div class="col d-flex justify-content-center">
          <h3>Pengajuan Baru</h3>
        </div>
      </div>

      <!-- ASURANSI BARU -->
      <form action="<?php echo base_url() . 'c_helpdesk/daftar_pengajuan_baru' ?>" method="POST">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $pengajuan_baru->Pending; ?></h3>

                <p>Asuransi Baru: Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>

              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="1">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $pengajuan_baru->Approved; ?></h3>

                <p>Asuransi Baru: Approved</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="2">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $pengajuan_baru->Rejected; ?></h3>

                <p>Asuransi Baru: Rejected</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="3">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>

        </div>
      </form>
      <!-- END OF ASURANSI BARU -->

      <div class="row">
        <div class="col d-flex justify-content-center">
          <h3>Perpanjangan</h3>
        </div>
      </div>


      <!-- PERPANJANGAN -->
      <form action="<?php echo base_url() . 'c_helpdesk/daftar_perpanjangan_polis' ?>" method="POST">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $perpanjangan->Pending; ?></h3>

                <p>Perpanjangan Polis: Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="1">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $perpanjangan->Approved; ?></h3>

                <p>Perpanjangan Polis: Approved</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="2">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $perpanjangan->Rejected; ?></h3>

                <p>Perpanjangan Polis: Rejected</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="3">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>

        </div>
      </form>
      <!-- END OF PERPANJANGAN -->

      <div class="row">
        <div class="col d-flex justify-content-center">
          <h3>Klaim</h3>
        </div>
      </div>

      <!-- KLAIM -->
      <form action="<?php echo base_url() . 'c_helpdesk/daftar_klaim_polis' ?>" method="POST">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $klaim->Pending; ?></h3>

                <p>Klaim: Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="1">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $klaim->Approved; ?></h3>

                <p>Klaim: Approved</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="2">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $klaim->Rejected; ?></h3>

                <p>Klaim: Rejected</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="#" class="small-box-footer"><button type="submit" class="btn btn-secondary" name="status" value="3">More Info <i class="fas fa-arrow-circle-right"></i></button></a>
            </div>
          </div>

        </div>
      </form>
      <!-- END OF KLAIM -->


    </div><!-- /.container-fluid -->

    <div class="jumbotron text-center">
      <div class="col-sm-8 mx-auto">
        <h1>Selamat datang!</h1>
        <p>Ini merupakan sistem management asuransi
          <b>Aplikasi ini di gunakan untuk management polis asuransi </b>.</p>
        <p>Anda telah login sebagai <b><?php echo $this->session->userdata('username'); ?></b> [admin].</p>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->