
<div class="content-wrapper">
    
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="ml-2 mb-2 text-dark"><i class="fa fa-edit"></i> &nbsp;&nbsp; Intro video</h4>
            </div><!-- /.col -->
            <div class="col-sm-6 mb-2">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div> <!-- /.Content header -->
    
    <!-- Content Main-->
    <div class="content">
      <div class="container-fluid">

            <div class="row mt-3">
            <div class=" my-2 col-lg-6 col-md-6 col-sm-8">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Add the Youtube embed link url:</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?=base_url('Edit/updateVideo/')?><?=isset($data[0]) ? $data[0]->id : ''?>" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="img_src">Enter link here:</label>
                        <div class="form-group">
                            <input type="url" id="img_src" name="src" class="form-control" value="<?=isset($data[0]) ? $data[0]->src : ''?>" required>
                        </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-recycle"></i> update</button>
                    </div>
                    </form>
                </div>
            </div>
                <?php if(isset($data)){?>
                    <div class="my-2 col-lg-6 col-md-6 col-sm-6">
                        <iframe height="230" style="width:100%" src="<?=$data[0]->src?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <p class="text-center">(current video)</p>
                    </div>
                <?php }?>
            </div>

            <div class="row ml-2 mb-1 mt-5">
            <strong class="text-sm">Instructions to find the link:</strong>
            </div>
            - Right click on the youtube video and select "copy embed code" . <br>
            - Paste the code in notepad/editor and find the link starting with "https://" <br>
            - Copy the whole link inside the inverted commas and paste it in the above input box. <br>
            - A Youtube video embed link looks like this: "https://www.youtube.com/embed/9iUJJHEIpls"
      </div><!-- /.container-fluid -->
    </div>

</div> <!-- /.Wrapper -->

<script>
    
