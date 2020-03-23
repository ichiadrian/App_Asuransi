<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark px-2">Perpanjangan Polis</h1>
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

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row">

                <div class="col-3 px-3">

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" <?php if($param['status'] == 1) echo "selected"; ?>>Pending</option>
                            <option value="2" <?php if($param['status'] == 2) echo "selected"; ?>>Approved</option>
                            <option value="3" <?php if($param['status'] == 3) echo "selected"; ?>>Rejected</option>
                        </select>
                    </div>
                </div>

                <div class="col-3 px-3">
                    
                </div>

                <div class="col-3 px-3 float-right">
                    
                </div>
                
                <div class="col-3 px-3 float-right">
                    <div class="form-group text-right">
                        <br>
                        <button type="submit" class="btn btn-primary mt-2">Filter</button>
                    </div>
                </div>

            </form>

            <div class="row px-2">

                <div class="col">

                    <div class="card">
                        
                        <div class="card-body">
                            <table id="table-pengajuan" class="table datatable table-striped table-bordered" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th width='1'> <center>No</center></th>
                                        <th> <center>Pemegang Polis</center></th>
                                        <th> <center>Tanggal Input</center></th>
                                        <th> <center>Agency</center></th>
                                        <th> <center>Status</center></th>
                                        <th> <center>View</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no=1;
                                        if(!empty($perpanjangan)){
                                            foreach ($perpanjangan as $index => $perpanjangan) {
                                    ?>

                                        <tr>
                                            <td><center><?php echo $no++; ?></center></td>
                                            <td><center><?php echo $perpanjangan->pemegang_polis; ?></center></td>
                                            <td><center><?php echo $perpanjangan->tgl_input; ?></center></td>
                                            <td><center><?php echo $perpanjangan->penginput; ?></center></td>
                                            <td><center><?php echo $perpanjangan->nama_status; ?></center></td>
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
