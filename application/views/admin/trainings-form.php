
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="ml-2 text-dark"><?= isset($data) ? '<i class="fas fa-edit"></i>&nbsp;&nbsp;Edit products' : '+&nbsp;&nbsp;Add products' ?></h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=base_url('Admin/Products')?>">Products</a></li>
                <li class="breadcrumb-item active"><?= isset($data) ? 'Edit' : 'Add new' ?> products</li>
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
                                <label for="name" class="text-sm mr-2 pt-2">Product Name <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->name: '' ?>" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="img" class="text-sm mr-2 pt-2">Image for products <?= isset($data) ? '' : '<span class="text-danger">*</span>' ?> :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img" <?= isset($data) ? '' : 'required' ?>>
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="duration" class="text-sm mr-2 pt-2">Category:</label>
                                <input type="text" value="<?= isset($data) ? $data->duration : '' ?>" class="form-control" name="duration" id="duration" placeholder="Example: 3 months">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price" class="text-sm mr-2 pt-2">Price (in Rs.):</label>
                                <input type="text" value="<?= isset($data) ? $data->price : '' ?>" class="form-control" name="price" id="price" placeholder="Example: 5500">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="descr" class="text-sm mr-2 pt-2">Description <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->descr : '' ?>" class="form-control" name="descr" id="descr" placeholder="Small description about the training" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="editor" class="text-sm mr-2 pt-2">What will you learn ? :</label>
                                <textarea name="content" id="editor" rows="6" class="form-control" placeholder="- Some feature of the training  &#10- Another feature of the training &#10- Continue with this type of bullet points"><?= isset($data) ? $data->content : null ?></textarea>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <a href="<?=base_url('Admin/Trainings')?>" class="btn btn-secondary mr-3 col-md-2"> Cancel</a>
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


