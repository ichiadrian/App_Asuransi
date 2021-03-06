<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark px-2">Klaim Polis</h1>
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

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row">

                <?php include __DIR__.'/../status_month_year_filter.php'; ?>

            </form>

            <!-- Small boxes (Stat box) -->
            <div class="row px-2">

                <div class="col">

                    <div class="card">

                        <div class="card-body">
                            <table id="table-pengajuan" class="table datatable table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width='1'>  
                                            <center>No</center>
                                        </th>
                                        <th>
                                            <center>Pemegang Polis</center>
                                        </th>
                                        <th>
                                            <center>Tanggal Input</center>
                                        </th>
                                        <th>
                                            <center>Tanggal Approve / Reject</center>
                                        </th>
                                        <th>
                                            <center>Agency</center>
                                        </th>
                                        <th>
                                            <center>Status</center>
                                        </th>
                                        <th>
                                            <center>View</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($param['status'] == 1){
                                    $no=1;
                                        if (!empty($klaim)) {
                                            foreach ($klaim as $index => $kl) {
                                                $datestatus = date_create($kl->tgl_perubahan_status);
                                                $datestatus = date_format($datestatus, "d M Y");
    
                                                if($param['status'] == 1) $datestatus = "---";
                                        ?>

                                                <tr>
                                                    <td>
                                                        <center><?php echo $no++; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->pemegang_polis; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->tgl_input; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $datestatus; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->penginput; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->nama_status; ?></center>
                                                    </td>
                                                    <td>
                                                        <center> <a href="<?php echo base_url() . 'c_helpdesk/klaim_polis/' . $kl->idklaim; ?>"><i class="fa fa-eye text-info"></i></a> </center>
                                                    </td>
                                                </tr>

                                    <?php
                                            }
                                        }
                                    }elseif($param['status'] == 2){
                                        $no=1;
                                        if (!empty($klaim)) {
                                            foreach ($klaim as $index => $kl) {
                                                $datestatus = date_create($kl->tgl_perubahan_status);
                                                $datestatus = date_format($datestatus, "d M Y");
    
                                                if($param['status'] == 1) $datestatus = "---";
                                        ?>

                                                <tr>
                                                    <td>
                                                        <center><?php echo $no++; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->pemegang_polis; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->tgl_input; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $datestatus; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->penginput; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->nama_status; ?></center>
                                                    </td>
                                                    <td>
                                                        <center> <a href="<?php echo base_url() . 'c_helpdesk/klaim_polis_appv/' . $kl->idklaim; ?>"><i class="fa fa-eye text-info"></i></a> </center>
                                                    </td>
                                                </tr>

                                    <?php
                                            }
                                        }
                                    }else{
                                        $no=1;
                                        if (!empty($klaim)) {
                                            foreach ($klaim as $index => $kl) {
                                                $datestatus = date_create($kl->tgl_perubahan_status);
                                                $datestatus = date_format($datestatus, "d M Y");
    
                                                if($param['status'] == 1) $datestatus = "---";
                                        ?>

                                                <tr>
                                                    <td>
                                                        <center><?php echo $no++; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->pemegang_polis; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->tgl_input; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $datestatus; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->penginput; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $kl->nama_status; ?></center>
                                                    </td>
                                                    <td>
                                                        <center> <a href="<?php echo base_url() . 'c_helpdesk/klaim_polis_rjct/' . $kl->idklaim; ?>"><i class="fa fa-eye text-info"></i></a> </center>
                                                    </td>
                                                </tr>

                                    <?php
                                            }
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
    $(document).ready(function() {
        $("#table-pengajuan").DataTable({
            dom: 'Bfrtip',
            buttons: [
               'excel'
            ]
        });
    })
</script>