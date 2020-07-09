
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?=isset($d)?'<i class="fa fa-edit"></i>':'<i class="fa fa-plus"></i>'?>&nbsp;&nbsp;<?=isset($d)?"Edit ":"Add "?>patient case</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin/Cases')?>">Patient cases</a></li>
                  <li class="breadcrumb-item active"><?=isset($d)?"Edit ":"Add "?> case</li>
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
              <div class="card-body">
                <form action="<?=$submit?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="title" class="m-0">Case title: <small>(max 60 characters)</small></label>
                            <input type="text" class="form-control mt-2" minlength="1" maxlength="60" name="title" value="<?=isset($d)?$d->title:''?>" id="title" required>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="services_id" class="m-0">Treatment given:</label>
                            <select name="services_id" id="services_id" class="form-control mt-2" required>
                                <option value="">-- Choose treatment --</option>
                                <?php foreach($data as $s){?>
                                <option value="<?=$s->id?>"  <?php if(isset($d) && $d->services_id==$s->id){echo ' selected';};?> ><?=$s->heading?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="case_date" class="m-0">Case date:</label>
                            <input type="date" class="form-control mt-2" name="case_date" value="<?=isset($d)?date('Y-m-d',strtotime($d->case_date)):date('Y-m-d')?>" id="case_date" required>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="featured" class="m-0 ml-5">Featured ?</label> <br>
                            <input type="checkbox" name="featured" id="featured" value="1" <?php if(isset($d) && $d->featured=='1'){echo ' checked';};?> style="height:33px; width:33px" class="mt-2 ml-5">
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <label for="preimg" class="m-0">Choose Pre image: </label> <br><small class="mb-3">( jpg, jpeg, png & bmp allowed )</small>
                            <div class="custom-file mt-2">
                                <input type="file" class="custom-file-input" id="preimg" name="preimg" accept=".jpg, .jpeg, .png, .bmp" <?= isset($d) ? 'ss' : ' required'?>>
                                <label class="custom-file-label" for="preimg">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <label for="postimg" class="m-0">Choose Post image:</label> <br> <small class="mb-3">( jpg, jpeg, png & bmp allowed )</small>
                            <div class="custom-file mt-2">
                                <input type="file" class="custom-file-input" id="postimg" name="postimg" accept=".jpg, .jpeg, .png, .bmp" <?= isset($d) ? 'ss' : ' required'?>>
                                <label class="custom-file-label" for="postimg">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="descr" class="">Case brief: <small>(max 150 characters)</small></label>
                            <textarea name="descr" id="descr" class="form-control" maxlength="150" rows="3" required><?=isset($d)?$d->descr:null?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="longDescr" class="">Case Details:</label>
                            <textarea name="longDescr" id="descr" class="form-control" rows="10" required><?=isset($d)?$d->longDescr:null?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <?php if(isset($d)){?>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-recycle"></i> Update</button>
                            <?php } else {?>
                                <button type="submit" class="btn btn-primary">+ Add</button>
                            <?php }?>
                        </div>
                    </div>
                </form>

              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>

</div> <!-- /.Wrapper -->


<!-- DataTable assets -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>


<script>

// Init Datatable
  $(function () {
    $('#bookdt').DataTable({
      "pageLength": 10,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      // "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true
    });
  });


// Name of the file appearing on selecting image
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

</script>
