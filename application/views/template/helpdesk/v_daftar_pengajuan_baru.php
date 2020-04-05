<?php 
    $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : date('n');
    $tahunparam = isset($_POST['tahun']) ? $_POST['tahun'] : date('Y');
?>

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
                        <li class="breadcrumb-item"><a href="#">Home <?php echo $bulan; ?></a></li>
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

                <div class="col-3 px-3">

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" <?php if ($param['status'] == 1) echo "selected"; ?>>Pending</option>
                            <option value="2" <?php if ($param['status'] == 2) echo "selected"; ?>>Approved</option>
                            <option value="3" <?php if ($param['status'] == 3) echo "selected"; ?>>Rejected</option>
                        </select>
                    </div>
                </div>

                <div class="col-3 px-3">
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <option value="1" <?php if($bulan == 1) echo "selected"; ?>>Januari</option>
                            <option value="2" <?php if($bulan == 2) echo "selected"; ?>>Febuari</option>
                            <option value="3" <?php if($bulan == 3) echo "selected"; ?>>Maret</option>
                            <option value="4" <?php if($bulan == 4) echo "selected"; ?>>April</option>
                            <option value="5" <?php if($bulan == 5) echo "selected"; ?>>Mei</option>
                            <option value="6" <?php if($bulan == 6) echo "selected"; ?>>Juni</option>
                            <option value="7" <?php if($bulan == 7) echo "selected"; ?>>Juli</option>
                            <option value="8" <?php if($bulan == 8) echo "selected"; ?>>Agustus</option>
                            <option value="9" <?php if($bulan == 9) echo "selected"; ?>>September</option>
                            <option value="10" <?php if($bulan == 10) echo "selected"; ?>>Oktober</option>
                            <option value="11" <?php if($bulan == 11) echo "selected"; ?>>November</option>
                            <option value="12" <?php if($bulan == 12) echo "selected"; ?>>Desember</option>
                        </select>
                    </div>
                </div>

                <div class="col-3 px-3 float-right">
                    <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" id="tahun" class="form-control">
                            <?php 
                                for ($tahun=date('Y'); $tahun > 2018 ; $tahun--) { 
                                    $selected = $tahunparam == $tahun ? "selected" : "";
                                    echo "<option value='$tahun' $selected>$tahun</option>";
                                }    
                            ?>
                            </select>
                        </div>
                </div>

                <div class="col-3 px-3 float-right">
                    <div class="form-group text-right">
                        <br>
                        <button type="submit" class="btn btn-primary mt-2">Filter</button>
                    </div>
                </div>

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

                                    if (!empty($pengajuan_baru)) {
                                        foreach ($pengajuan_baru as $index => $pengajuan) {
                                            $link = "";

                                            // ubah format
                                            $dateinput = date_create($pengajuan->tgl_input);
                                            $dateinput = date_format($dateinput, "d M Y");

                                            // ubah format
                                            $datestatus = date_create($pengajuan->tgl_perubahan_status);
                                            $datestatus = date_format($datestatus, "d M Y");

                                            if($param['status'] == 1) $datestatus = "---";

                                            if ($param['status'] == 1) $link = 'pengajuan_baru/';
                                            if ($param['status'] == 2) $link = 'pengajuan_baru_appv/';
                                            if ($param['status'] == 3) $link = 'pengajuan_baru_rjct/';

                                    ?>

                                            <tr>
                                                <td>
                                                    <center><?php echo $index += 1; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $pengajuan->pemegang_polis; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $dateinput; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $datestatus; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $pengajuan->penginput; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $pengajuan->nama_status; ?></center>
                                                </td>
                                                <td>
                                                    <center> <a href="<?php echo base_url() . 'c_helpdesk/' . $link . $pengajuan->idasuransi; ?>"><i class="fa fa-eye text-info"></i></a> </center>
                                                </td>
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
    $(document).ready(function() {
        $("#table-pengajuan").DataTable({
            dom: 'Bfrtip',
            buttons: [
               'excel', 'pdf'
            ]
        });
    })
</script>