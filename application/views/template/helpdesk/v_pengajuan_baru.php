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
                            <h3 class="card-title">Pengajuan Asuransi Baru ( <?php echo $pengajuan_baru->pemegang_polis?> )</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url() . 'c_helpdesk/aksi_ubah_status' ?>" role="form" method="POST" enctype="multipart/form-data">

                            <div class="card-body">

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class=" mb-0">Form Permohonan</h3> <br>
                                        <img  src="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->form_permohonan; ?>" alt="" width="250" height="250">
                                        <br/><br/>

                                        <a class=" float-left btn btn-outline-info" href="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->form_permohonan;?>" download="<?php echo $pengajuan_baru->form_permohonan; ?>"><i class="fas fa-save"></i> Save</a>
        
                                    </div>
                                </div>

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class="mb-0">Identitas</h3> <br>
                                        <img src="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->identitas; ?>" alt="" width="250" height="250">
                                        <br/><br/>       
                                                                        
                                         <a class=" float-left btn btn-outline-info" href="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->identitas;?>" download="<?php echo $pengajuan_baru->identitas; ?>"><i class="fas fa-save"></i> Save</a>

                                    </div>
                                </div>

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class="mb-0">Bukti Transfer</h3> <br>
                                        <img src="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->bukti_transfer; ?>" alt="" width="250" height="250">
                                        <br/><br/>       
                                                                        
                                         <a class=" float-left btn btn-outline-info" href="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->bukti_transfer;?>" download="<?php echo $pengajuan_baru->bukti_transfer; ?>"><i class="fas fa-save"></i> Save</a>

                                    </div>
                                </div>

                                <div class="row my-1">
                                    <div class="col">
                                        <h3 class="mb-0">Buku Tabungan</h3> <br>
                                        <img src="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->buku_tabungan; ?>" alt="" width="250" height="250">
                                        <br/><br/>       
                                                                        
                                         <a class=" float-left btn btn-outline-info" href="<?php echo base_url().'gambar/'.$pengajuan_baru->idasuransi.'_pengajuan_baru_'.$pengajuan_baru->pemegang_polis.'/'.$pengajuan_baru->buku_tabungan;?>" download="<?php echo $pengajuan_baru->buku_tabungan; ?>"><i class="fas fa-save"></i> Save</a>
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
                                                <input class="form-check-input" type="radio" name="status" id="approve" value="2" <?php if($pengajuan_baru->status == 2) echo "selected"; ?> required>
                                                <label class="form-check-label" for="approve">
                                                    Approve
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-check">
                                                <input cl`ass="form-check-input" type="radio" name="status" id="reject" value="3" <?php if($pengajuan_baru->status == 3) echo "selected"; ?> required>
                                                <label class="form-check-label" for="reject">
                                                    Reject
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>

                                <input type="hidden" name="id" value="<?php echo $pengajuan_baru->idasuransi; ?>">
                                <input type="hidden" name="idname" value="idasuransi">
                                <input type="hidden" name="table_flag" value="pengajuan_baru">
                                <input type="hidden" name="redirect" value="daftar_pengajuan_baru">


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