
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="ml-2 text-dark"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Products</h4>
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
                <h2 class="card-title">List of products:</h2> <br>
                <a href="<?=base_url('Add/Products')?>" class="btn btn-primary btn-sm ml-auto">+ Add Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="bookdt" class="table table-bordered table-hover" style="width:100%;">
                  <thead>
                    <tr>
                      <th style="width:50px">S. No</th>
                      <th style="width:50px">Category name</th>
                      <th style="width:110px">Image</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $z=1; foreach ($data as $d){?>
                      <tr>
                        <td class="text-center"><?=$z?> .</td>
                        <td class="text-center"><?=$d->cname?></td>
                        <td>
                        <?php if($d->img){?>
                          <img src="<?=base_url()?><?=$d->img?>" alt="img" height="80">
                        <?php } else{?>
                          <em class="text-muted">No image</em>
                        <?php }?>
                        </td>
                        <td><?=$d->pname?></td>
                        <td class="text-center"><?=$d->price?></td>
                        <td class="text-center"><?=$d->description?></td>
                        <td>
                          <a href="<?=base_url('Delete/products/'.$d->id)?>" onclick="confirmation(event)" class="btn del-btn btn-sm btn-danger mb-1" title="Delete training"><i class="fa fa-trash-alt"></i></a>
                          <a href="<?=base_url('Edit/products/'.$d->id)?>" class="btn btn-primary btn-sm mb-1" title="Edit products"><i class="fa fa-edit"></i></a>
                        </td>
                      </tr>
                    <?php $z++; }?>
                    <!-- display data-->
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
