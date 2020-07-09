
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin/rootUploadOff')?>">Leave</a></li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div> <!-- /.Content header -->
    
    <!-- Content Main-->
    <div class="content">
      <div class="container-fluid">
      <?php if(isset($this->session->root)){?>
            <div class="row">
                <div class="card col-md-5 px-0 mx-auto">
                    <div class="card-header bg-black">
                        <h5 class="mb-0">↑ Upload single file</h5>
                    </div>
                    <form method="post" action="<?=base_url('Admin/processRootUpload')?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file" required>
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                </div>
                                <input type="text" name="path" class="form-control" placeholder="Path ( put dot ' . ' for root upload )" required>
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button type="submit" class=" btn bg-black btn-sm">Upload ↑</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card col-md-5 px-0 mx-auto">
                    <div class="card-header bg-black">
                        <h5 class="mb-0">+ Make new folder</h5>
                    </div>
                    <form method="post" action="<?=base_url('Admin/processRootNewFolder')?>">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="path" class="form-control mb-3" placeholder="Path" required>
                                <input type="text" name="folder" class="form-control" placeholder="New folder name" required>
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button type="submit" class=" btn bg-black btn-sm">Create +</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="card col-md-5 px-0 mx-auto">
                    <div class="card-header bg-black">
                        <h5 class="mb-0">↑ Upload & extract .zip file</h5>
                    </div>
                    <form method="post" action="<?=base_url('Admin/Extract')?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" accept=".zip" name="file" required>
                                        <label class="custom-file-label" for="file">Choose .zip file</label>
                                    </div>
                                </div>
                                <input type="text" name="path" class="form-control" placeholder="Extraction Path ( put dot ' . ' to extract in root )" required>
                            </div>
                            <div class="form-group mb-0 text-right">
                                <button type="submit" class="btn bg-black btn-sm">Upload ↑</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card col-md-5 px-0 mx-auto" style="opacity:1">
                    <div class="card-header bg-black">
                        <h5 class="mb-0">↓ Download file or folder</h5>
                    </div>
                    <form method="post" action="<?=base_url('Admin/rootDownload')?>" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="path" class="form-control" placeholder="Path with file name & extension" >
                            </div>
                            <div class="form-group">
                                <input type="text" name="dirPath" class="form-control" placeholder="Directory path ( put dot '.' for full backup )" >
                            </div>
                            <div class="form-group mb-0">
                                <a href="<?=base_url('Admin/delBackupz')?>" onclick="return confirm('Are you sure?')" class="mr-auto btn text-danger pl-0" title="Delete backupz.zip"><span class="text-xs">❌ Delete .zip</span></a>
                                <button type="submit" class="btn bg-black btn-sm float-right">Download ↓</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <a href="<?=base_url('Admin/dbDownload')?>" class="ml-5 btn btn-sm btn-outline-dark mb-3" title="Download DB"> 🛢  Backup DB</a>
            </div>
        <?php }else{?>
            <div class="row">
                <div class="card col-md-4 px-0 mx-auto">
                    <div class="card-header bg-black">
                        <h5 class="mb-0">Login</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?=base_url('Admin/rootLogin')?>">
                            <div class="form-group">
                                <input type="password" name="p" class="form-control" placeholder="Last 3 of Mob + First 3 of name">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn bg-black">Submit →</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php }?>

       
      </div><!-- /.container-fluid -->
    </div>

</div> <!-- /.Wrapper -->


<!-- DataTable assets -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>

<!-- Init Datatable -->
<script>
  $(function () {
    $('#bookdt').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true,
      "order": [[ 0, "desc" ]]
    });
  });

   // Name of the file appearing on selecting image
   $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
