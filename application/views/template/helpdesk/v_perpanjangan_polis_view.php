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
                            <h3 class="card-title">Perpanjangan Polis (<?php echo $perpanjangan->pemegang_polis?>) </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url() . 'c_helpdesk/aksi_ubah_status' ?>" role="form" method="POST" enctype="multipart/form-data">

                            <div class="card-body">

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class="mb-0">Form Perpanjangan Polis</h3> <br>
                                        <img src="<?php echo base_url().'gambar/'.$perpanjangan->idperpanjang.'_perpanjangan_'.$perpanjangan->pemegang_polis.'/'.$perpanjangan->perpanjangan_polis; ?>" alt="" width="250" height="250">
                                        <br/><br/>

                                        
                                        <a class=" float-left btn btn-outline-info" href="<?php echo base_url().'gambar/'.$perpanjangan->idperpanjang.'_perpanjangan_'.$perpanjangan->pemegang_polis.'/'.$perpanjangan->perpanjangan_polis;?>" download="<?php echo $perpanjangan->perpanjangan_polis; ?>"><i class="fas fa-save"></i> Save</a>

                                    </div>
                                </div>

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class="mb-0">Identitas</h3> <br>
                                        <img src="<?php echo base_url().'gambar/'.$perpanjangan->idperpanjang.'_perpanjangan_'.$perpanjangan->pemegang_polis.'/'.$perpanjangan->identitas; ?>" alt="" width="250" height="250">
                                        <br/><br/>

                                        
                                        <a class=" float-left btn btn-outline-info" href="<?php echo base_url().'gambar/'.$perpanjangan->idperpanjang.'_perpanjangan_'.$perpanjangan->pemegang_polis.'/'.$perpanjangan->identitas;?>" download="<?php echo $perpanjangan->identitas; ?>"><i class="fas fa-save"></i> Save</a>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="35" rows="5" class="form-control" required><?php echo $perpanjangan->keterangan ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status Polis</label>

                                    <div class="row">

                                        <div class="col">
                                        <?php
                                                if($perpanjangan->status == 2) {
                                            ?>
                                                <h4 style="color:MediumSeaGreen;">*Dokumen Approved</h4>
                                            <?php
                                                }else{ 
                                               ?>
                                              <h4 style="color:Tomato;">*Dokumen Rejected</h4>
                                            <?php
                                                }
                                            ?>

                                            
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
                                <?php
                                    if($perpanjangan->status > 1) {
                                ?>
                                     <a href="<?php echo site_url().'c_helpdesk/daftar_pengajuan_baru' ?>" style="float: right;"class=" btn btn-light btn-outline-dark pull-right">
                                     <i class="fa fa-arrow-left"></i>Kembali</a>
                                <?php
                                    }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>

                

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>