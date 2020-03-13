<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark px-2">Pengajuan Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="row px-2">

                <div class="col">

                    <div class="card">
                        
                        <div class="card-body">
                            <table id="table-pengajuan" class="table datatable table-striped table-bordered" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th> <center>Id</center></th>
                                        <th> <center>Pemegang Polis</center></th>
                                        <th> <center>Tanggal Input</center></th>
                                        <th> <center>Agency</center></th>
                                        <th> <center>View</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(!empty($perpanjangan)){
                                            foreach ($perpanjangan as $index => $perpanjangan) {
                                    ?>

                                        <tr>
                                            <td><center><?php echo $perpanjangan->idperpanjang; ?></center></td>
                                            <td><center><?php echo $perpanjangan->pemegang_polis; ?></center></td>
                                            <td><center><?php echo $perpanjangan->tgl_input; ?></center></td>
                                            <td><center><?php echo $perpanjangan->penginput; ?></center></td>
                                            <td><center> <a href="<?php echo base_url().'c_helpdesk/perpanjangan_polis/'.$perpanjangan->idperpanjang;?>"><i class="fa fa-eye text-info"></i></a> </center></td>
                                        </tr>

                                    <?php
                                            }
                                        } 
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>

    $(document).ready(function(){
        $("#table-pengajuan").DataTable();
    })
</script>
