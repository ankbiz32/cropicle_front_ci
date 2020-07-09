
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fa fa-circle"></i>&nbsp;&nbsp;Album : <?=$album?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin/Album')?>">Albums</a></li>
                  <li class="breadcrumb-item active"><?=$album?></li>
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
                <h2 class="card-title col">List of images in the album: " <?=isset($album)?$album:''?> "</h2>
                <button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#add">+ Add new image</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body row">
                <?php foreach($data as $d){?>
                  <div class="col-md-3 my-4 col-xs-6 text-center">
                    <img src="<?=base_url('assets/images/').$d->galleryimgsrc?>" alt="image" height="100"> <br>
                    <a href="<?=base_url('Delete/Photo/').$d->id?>" onclick="confirmation(event)" class="btn btn-danger my-1"><i class="fa fa-trash-alt"></i></a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?=$d->id?>"><i class="fa fa-edit"></i></button>
                  </div>
                    <!-- Edit modal -->
                      <div class="modal fade" id="edit<?=$d->id?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-edit"></i >Edit Photo :</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="post" action="<?=base_url('Edit/Photo/').$d->id;?>" enctype="multipart/form-data">
                                  <div class="col">
                                    <div class="form-group">
                                      <label for="img" class="mb-2">Choose image:</label>
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input m-0" id="img" name="img" accept=".jpg, .jpeg, .png, .bmp" required>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                      </div>
                                    </div>
                                  </div>
                                  <input type="text" name="album" class="form-cintrol" value="<?=$album?>" hidden>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-recycle"></i> update</button>
                                </form>
                            </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    <!-- /Edit modal -->
                <?php }?>
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
            <h4 class="modal-title">+ Add Photo to "<?=$album?>":</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form role="form" method="post" action="<?=base_url();?>Add/Photo" enctype="multipart/form-data">
              <div class="col">
                <div class="form-group">
                  <label for="img" class="mb-2">Choose image:</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input m-0" id="img" name="img" accept=".jpg, .jpeg, .png, .bmp" required>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              <input type="text" name="album" class="form-cintrol" value="<?=$album?>" hidden>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">+ Add</button>
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
</script>
