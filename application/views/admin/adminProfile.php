
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-4">
                <div class="col-md-6">
                    <h4 class="m-0 text-dark">Welcome <?php echo $admProfile->fname .'&nbsp;' . $admProfile->lname ?> !</h4>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a >Admin Profile</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row adm-pro-row">
                <div class="col-md-12">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h4 class="card-title">Admin panel profile :</h4>
                        </div>

                        <?php 
                            $username1=$admProfile->username;
                            $email1=$admProfile->email;
                            $pwd=$admProfile->pwd;
                            $fname=$admProfile->fname;
                            $lname=$admProfile->lname;
                        ?>

                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="Uname">Username:</label>
                                        <input type="text" class="form-control" id="Uname" value="<?=$username1?>" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Email">Email address:</label>
                                        <input type="email" class="form-control" id="Email" value="<?=$email1?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="fname">First Name:</label>
                                        <input type="text" class="form-control" id="fname" value="<?=$fname?>" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lname">Last Name:</label>
                                        <input type="text" class="form-control" id="lname" value="<?=$lname?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" class="btn btn-primary mt-1 mb-" data-toggle="modal" data-target="#edit-prof-modal"><i class="fa fa-edit"></i>&nbsp; Edit profile</button>
                                <button type="button" class="btn btn-secondary mt-1 mb-1" data-toggle="modal" data-target="#pwd-modal"><i class="fa fa-lock"></i>&nbsp; Change password</button>
                            </div>
                        </form>

                        <?php 
                        if(isset($errors)){
                           echo '<span class="alert alert-danger">'.$errors.'</span>';
                            }
                        ?>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
</div>

<!-- Profile-modal -->
    <div class="modal fade" id="edit-prof-modal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?=base_url('Edit/adminProfile/').$admProfile->user_id;?>">
                    <div class="form-group">
                        <label for="Uname2">Username:</label>
                        <input type="text" class="form-control" name="username" id="Uname2" value="<?=$username1?>" required>
                    </div>
                    <div class="form-group">
                        <label for="Email2">Email address:</label>
                        <input type="email" class="form-control" name="email" id="Email2" value="<?=$email1; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fname">First name:</label>
                        <input type="text" class="form-control" name="fname" id="fname" value="<?=$fname?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last name:</label>
                        <input type="text" class="form-control" name="lname" id="lname" value="<?=$lname?>" required>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-recycle"></i>&nbsp; Update</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /Profile modal -->

<!-- Password modal -->
    <div class="modal fade" id="pwd-modal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <i class="fa fa-lock"></i> Change password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?=base_url('Login/changePwd/').$admProfile->user_id;?>">
                    <div class="form-group">
                        <label for="oldp">Old password:</label>
                        <input type="password" class="form-control" name="oldp" id="oldp" required>
                    </div>
                    <div class="form-group">
                        <label for="newp">New Password:</label>
                        <input type="password" class="form-control" name="newp" id="newp" required>
                    </div>
                    <div class="form-group">
                        <label for="cnfp">Confirm new Password:</label>
                        <input type="password" class="form-control" name="cnfp" id="cnfp" required>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-recycle"></i>&nbsp; Update</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /password modal -->
