<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Header Content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">

                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="text-center">Edit User (<?php echo $data_user->username ?>)</h3>
                        </div>
                        <form action="">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php $data_user->username ?>">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <?php 
                                            if(!empty($roles)) { foreach ($roles as $index => $role) {
                                        ?>
                                            <option value="<?php echo $role->idrole ?>" <?php if($role->idrole == $data_user->role) echo "selected";?>><?php echo $role->rolename; ?></option>
                                        <?php
                                            } } 
                                        ?>
                                    </select>
                                </div>

                            </div>
    
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                        
                    </div>

                </div>
            </div>
            
        </div>
    </section>

</div>