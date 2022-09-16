

<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="ml-2 text-dark"><?= isset($data) ? '<i class="fas fa-edit"></i>&nbsp;&nbsp;Edit project from portfolio' : '+&nbsp;&nbsp;Add project to portfolio' ?></h4>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=base_url('Admin/Portfolio')?>">Portfolio</a></li>
                <li class="breadcrumb-item active"><?= isset($data) ? 'Edit' : 'Add new' ?> project</li>
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
                    <form role="form" method="post" action="<?= isset($data) ? base_url('Edit/updatePortfolio/'.$data->id) : base_url('Add/savePortfolio') ?>" enctype="multipart/form-data">
                     
                        <div class="row mb-4">
                            <div class="form-group col-md-12">
                                <label for="name" class="text-sm mr-2 pt-2">Project title <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->title: '' ?>" class="form-control" name="title" id="title" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="img1" class="text-sm mr-2 pt-2">Image 1 <?= isset($data) ? '' : '<span class="text-danger">*</span>' ?> :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img1" accept=".png, .jpg, .jpeg, .gif, .bmp, .svg" name="img1" <?= isset($data) ? '' : 'required' ?>>
                                    <label class="custom-file-label" for="img1">Choose image</label>
                                </div>
                                <?php if(isset($data)){?>
                                    <p class="mt-3">Current image 1: <img src="<?=base_url('assets/portfolio/').$data->img_src1?>" alt="" height="90"></p>   
                                <?php }?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label for="img2" class="text-sm mr-2 pt-2">Image 2 <?= isset($data) ? '' : '<span class="text-danger">*</span>' ?> :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img2" accept=".png, .jpg, .jpeg, .gif, .bmp, .svg" name="img2" <?= isset($data) ? '' : 'required' ?>>
                                    <label class="custom-file-label" for="img2">Choose image</label>
                                </div>
                                <?php if(isset($data)){?>
                                    <p class="mt-3">Current image 2: <img src="<?=base_url('assets/portfolio/').$data->img_src2?>" alt="" height="90"></p>   
                                <?php }?> 
                            </div>
                            <div class="form-group col-md-4">
                                <label for="img3" class="text-sm mr-2 pt-2">Image 3 <?= isset($data) ? '' : '<span class="text-danger">*</span>' ?> :</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img3" accept=".png, .jpg, .jpeg, .gif, .bmp, .svg" name="img3" <?= isset($data) ? '' : 'required' ?>>
                                    <label class="custom-file-label" for="img3">Choose image</label>
                                </div>
                                <?php if(isset($data)){?>
                                    <p class="mt-3">Current image 3: <img src="<?=base_url('assets/portfolio/').$data->img_src3?>" alt="" height="90"></p>   
                                <?php }?> 
                            </div>
                            <div class="form-group col-md-12">
                                <label for="short_descr" class="text-sm mr-2 pt-2">Short Description <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->short_descr : '' ?>" class="form-control" name="short_descr" id="short_descr" placeholder="Small description about the project" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="full_descr" class="text-sm mr-2 pt-2">Full Description <span class="text-danger">*</span> :</label>
                                <textarea class="form-control summernote" name="full_descr" id="summernote"><?= isset($data) ? $data->full_descr : null ?></textarea>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <a href="<?=base_url('Admin/Portfolio')?>" class="btn btn-secondary mr-3 col-md-2"><strong>x</strong> Cancel</a>
                            <button type="submit" class="btn btn-primary col-md-2"><?= isset($data) ? '<i class="fa fa-recycle"></i> Update' : '<strong>+ </strong> Submit' ?></button>
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

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

    $('#summernote').summernote({
        height: 300
    });

    // Name of the file appearing on selecting image
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>


