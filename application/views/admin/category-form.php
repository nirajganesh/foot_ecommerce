
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="ml-2 text-dark"><?= isset($data) ? '<i class="fas fa-edit"></i>&nbsp;&nbsp;Edit products' : '+&nbsp;&nbsp;Add category' ?></h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=base_url('Admin/Category')?>">Category</a></li>
                <li class="breadcrumb-item active"><?= isset($data) ? 'Edit' : 'Add new' ?> Category</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div> 
    <!-- /.Content header -->
    
    <!-- Content Main-->
    <div class="content">
      <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" method="post" action="<?= isset($data) ? base_url('Edit/updateTraining/'.$data->id) : base_url('Add/saveTraining') ?>" enctype="multipart/form-data">
                        
                     <?php if(isset($data)){?>
                        <p class="text-right"><strong>Current image :</strong> <img src="<?=base_url('assets/training/').$data->img_src?>" alt="" width="90"></p>   
                     <?php }?>   
                        <div class="row mb-4">
                            <div class="form-group col-md-6">
                                <label for="name" class="text-sm mr-2 pt-2">Category Name <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->cname: '' ?>" class="form-control" name="name" id="name" required>
                            </div>
                           
                            <div class="form-group col-md-12">
                                <label for="descr" class="text-sm mr-2 pt-2">Description <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->description : '' ?>" class="form-control" name="descr" id="descr" placeholder="Small description about the training" required>
                            </div>
                           
                        </div>
                        <div class="row ml-1">
                            <a href="<?=base_url('Admin/Category')?>" class="btn btn-secondary mr-3 col-md-2"> Cancel</a>
                            <button type="submit" class="btn btn-primary col-md-2"><?= isset($data) ? '<i class="fa fa-recycle"></i> Update' : ' Save' ?></button>
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


<script>
    // Name of the file appearing on selecting image
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


