
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
                    <form role="form" method="post" action="<?=isset($data) ? base_url('Edit/updateProducts/'.$data->id) : base_url('Add/saveProducts') ?>" enctype="multipart/form-data">
                     <?php if(isset($data))
                     {?>
                        <p class="text-right"><strong>Current image :</strong> <img src="<?=base_url('assets/img/product').$data->img?>" alt="" width="90"></p>   
                     <?php }?>   
                        <div class="row mb-4">
                            <div class="form-group col-md-6">
                                <label for="name" class="text-sm mr-2 pt-2">Product Name <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->pname: '' ?>" class="form-control" name="pname" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="img" class="text-sm mr-2 pt-2">Image for products <?= isset($data) ? '' : '<span class="text-danger">*</span>' ?> :</label>
                                <div class="custom-file">
                                    <!-- <input type="file" name="img"> -->
                                    <input type="file" class="custom-file-input" id="img" name="img" <?= isset($data) ? '' : 'required' ?>> 
                                    <label class="custom-file-label" for="customFile">Choose image</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="duration" class="text-sm mr-2 pt-2">Category:</label>
                                     <select name="cname" class="form-control mt-2" required>
                                         <?php foreach($cat as $d){ ?>
                                           <option value="<?=$d->cname?>"><?=$d->cname?></option>
                                         <?php }?>
                                     </select>
                                <!-- <input type="text" value="<?//= isset($data) ? $data->duration : '' ?>" class="form-control" name="duration" id="duration" placeholder="Example: 3 months"> -->
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price" class="text-sm mr-2 pt-2">Price (in Rs.):</label>
                                <input type="text" value="<?= isset($data) ? $data->price : '' ?>" class="form-control" name="price" id="price" placeholder="Example: 5500">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description" class="text-sm mr-2 pt-2">Description <span class="text-danger">*</span> :</label>
                                <input type="text" value="<?= isset($data) ? $data->description : '' ?>" class="form-control" name="description" id="descr" placeholder="Small description about the training" required>
                            </div>
                        </div>
                        <div class="row ml-1">
                            <a href="<?=base_url('Admin/Products')?>" class="btn btn-secondary mr-3 col-md-2"> Cancel</a>
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

<!-- DataTable assets -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Init Datatable -->
<script>
  $(function () {
    $('#bookdt').DataTable({
      "aaSorting": [],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "scrollX": true
    });
  });
</script>
<script>
    // Name of the file appearing on selecting image
    $(".custom-file-input").on("change", function() 
    {
        var fileName = $(this).val().split("\\").pop();
        console.log(fileName);
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>


