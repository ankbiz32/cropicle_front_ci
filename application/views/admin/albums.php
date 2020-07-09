
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="mb-2 text-dark"><i class="fa fa-image"></i>&nbsp;&nbsp;Gallery</h1>
                <h3>( Albums )</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">Albums</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div> <!-- /.Content header -->
    
    <!-- Content Main-->
    <div class="content">
      <div class="container-fluid">

        <div class="row mt-3">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header row">
                    <p class="text-lg">List of albums :</p>
                    <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#add">+ Add new album</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php $i='0'; foreach($data as $d){?>
                            <div class="col-md-4 my-2">
                                <h4 class="mb-2"><?=$d->album?></h4>
                                <a href="<?=base_url('Admin/Albumname/').urlencode($d->album);?>" class="btn btn-warning my-1"><i class="fa fa-eye"></i></a>
                                <a href="<?=base_url('Delete/Album/').urlencode($d->album);?>" onclick="confirmation(event)" class="btn btn-danger my-1"><i class="fa fa-trash-alt"></i></a>
                                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#edit<?=$i?>"><i class="fa fa-edit"></i></button>
                            </div>

                            <!-- edit modal -->
                                <div class="modal fade" id="edit<?=$i?>">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"> <i class="fa fa-edit"></i> &nbsp; Edit album:</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="post" action="<?=base_url();?>Edit/Album" enctype="multipart/form-data">
                                            <div class="form-group col-md-12">
                                                <label for="album" class="mb-2">New name for album : " <?=$d->album?> "</label>
                                                <input type="text" name="album" id="album" class="form-control" value="<?=$d->album?>" required>
                                            </div>
                                            <div class="form-group col-md-12" hidden>
                                                <label for="album" class="mb-2">Old name :</label>
                                                <input type="text" name="oldalbum" id="oldalbum" class="form-control" value="<?=$d->album?>" required >
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" id="editBtn"><i class="fa fa-recycle"></i>&nbsp; Update</button>
                                            </form>
                                        </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            <!-- /edit modal -->

                        <?php $i++; }?>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>

</div> <!-- /.Wrapper -->


 <!-- Add modal -->
  <div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">+ Add album:</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" method="post" action="<?=base_url();?>Add/Album" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="album" class="mb-2">Album name :</label>
                  <input type="text" name="album" id="album" class="form-control" required>
                </div>
                <div class="form-group col-md-12">
                  <label for="img" class="mb-2">Choose an image to add to this album:</label>
                  <p class="text-sm text-muted mt-0 mb-2">( Max image size : 1Mb )</p>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input m-0" id="img" name="img" accept=".jpg, .jpeg, .png, .bmp" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" id="addBtn" class="btn btn-primary">+ Add</button>
            </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- /Add modal -->



<script>



// Name of the file appearing on selecting image
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

function checkPhoto(target, msg, btn) {
      if(target.files[0].size > 360000) {
          document.getElementById(msg).innerHTML = "Image size cannot be more than 300kb !";
          document.getElementById(msg).style.display = "initial";
          document.getElementById(btn).setAttribute('disabled','true');
          return false;
      }
      if(target.files[0].size < 360000) {
          document.getElementById(msg).innerHTML = "";
          document.getElementById(msg).style.display = "none";
          document.getElementById(btn).removeAttribute('disabled');
          return false;
      }
      return true;
  }

</script>
