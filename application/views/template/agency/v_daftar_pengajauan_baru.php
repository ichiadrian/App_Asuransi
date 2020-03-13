<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark px-2">Daftar User</h1>
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
                                        <th> <center>User Id</center></th>
                                        <th> <center>Username</center></th>
                                        <th> <center>Role</center></th>
                                        <th> <center>Edit</center></th>
                                        <th> <center>Delete</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php 
                                        if(!empty($users)){
                                            foreach ($users as $index => $user) {
                                    ?>

                                        <tr>
                                            <td><center><?php echo $user->iduser; ?></center></td>
                                            <td><center><?php echo $user->username; ?></center></td>
                                            <td><center><?php echo $user->rolename; ?></center></td>
                                            <td><center> <a href="<?php echo base_url().'c_admin/edit_user/'.$user->iduser; ?>"><i class="fas fa-edit text-success"></i></a> </center></td>
                                            <td><center> <a href="<?php echo base_url().'c_admin/delete_user/'.$user->iduser;?>"><i class="fa fa-trash text-danger"></i></a> </center></td>
                                        </tr>

                                    <?php
                                            }
                                        } 
                                    ?> -->
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
// BELAKANGAN AJAAA
</script>
