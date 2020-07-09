
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><i class="fa fa-users"></i>&nbsp;&nbsp;Patient cases</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?=base_url('Admin')?>">Dashboard</a></li>
                  <li class="breadcrumb-item active">cases</li>
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
                <h2 class="card-title col">List of Banner images:</h2>
                <a href="<?=base_url('Add/Cases')?>" class="btn btn-primary ml-auto" title="Add Case">+ Add new case</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="bookdt" class="table table-bordered table-hover" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th>Slide Heading</th>
                      <th>Description</th> -->
                      <th>Case Title</th>
                      <th>Treatment</th>
                      <th>Pre & Post image</th>
                      <th>Case date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- display Data-->
                    <?php foreach ($data as $d){?>
                      <tr>
                        <td><?=$d->title?> <br> <?php if($d->featured=='1'){echo '<span class="badge badge-danger">Featured</span>';}?></td>
                        <td><?=$d->heading?></td>
                        <td>
                            <img src="<?=base_url()."assets/images/$d->beforeimgsrc"?>" alt="Pre Image" width="150" style="object-fit:contain;" class="my-1"> &nbsp;
                            <img src="<?=base_url()."assets/images/$d->afterimgsrc"?>" alt="Post Image" width="150" style="object-fit:contain;" class="my-1">
                        </td>
                        <td><?=date('d-m-Y',strtotime($d->case_date))?></td>
                        <td>
                          <a href="<?=base_url('Delete/Cases/'.$d->pid)?>" onclick="confirmation(event)" class="btn del-btn btn-danger mb-1" title="Delete Case"><i class="fa fa-trash-alt"></i></a>
                          <a href="<?=base_url('Edit/Cases/'.$d->pid)?>" class="btn btn-primary mb-1" title="Edit Case"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>

                    <?php }?>

                  </tbody>
                </table>
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
