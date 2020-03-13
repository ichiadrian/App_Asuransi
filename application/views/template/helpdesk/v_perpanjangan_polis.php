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
                            <h3 class="card-title">Perpanjangan Polis</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url() . 'c_helpdesk/aksi_ubah_status' ?>" role="form" method="POST" enctype="multipart/form-data">

                            <div class="card-body">

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class="mb-0">Form Perpanjangan Polis</h3> <br>
                                        <img src="<?php echo base_url().'gambar/'.$perpanjangan->idperpanjang.'_perpanjangan_'.$perpanjangan->pemegang_polis.'/'.$perpanjangan->perpanjangan_polis; ?>" alt="" width="200" height="200">
                                    </div>
                                </div>

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class="mb-0">Identitas</h3> <br>
                                        <img src="<?php echo base_url().'gambar/'.$perpanjangan->idperpanjang.'_perpanjangan_'.$perpanjangan->pemegang_polis.'/'.$perpanjangan->identitas; ?>" alt="" width="200" height="200">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="35" rows="5" class="form-control" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status Polis</label>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="approve" value="2" required>
                                                <label class="form-check-label" for="approve">
                                                    Approve
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-check">
                                                <input cl`ass="form-check-input" type="radio" name="status" id="reject" value="3" required>
                                                <label class="form-check-label" for="reject">
                                                    Reject
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>

                                <input type="hidden" name="id" value="<?php echo $perpanjangan->idperpanjang; ?>">
                                <input type="hidden" name="idname" value="idperpanjang">
                                <input type="hidden" name="table_flag" value="perpanjangan_polis">
                                <input type="hidden" name="redirect" value="daftar_perpanjangan_polis">

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>