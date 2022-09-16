
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('Admin')?>" class="brand-link ml-1">
      <span class="brand-text text-lg d-flex  align-items-center"><img src="<?=base_url('assets/img/logo.png')?>" alt="Logo" height="40px" class=""> <strong class="ml-3">Admin </strong>Panel</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <!-- <div class="info">
          <a href="<?//=base_url('Admin/adminProfile')?>" class="d-block"> <?php // echo $this->session->user->fname .'&nbsp;' . $this->session->user->lname ?> </a>
        </div> -->
          <div class="info">
          <a href="<?//=base_url('Admin/adminProfile')?>" class="d-block"> NirajGanesh Dewangan </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?=base_url('Admin')?>" class="nav-link <?php if($this->uri->segment(2)==""){echo ' CustomActive';}?>">
              <i class="fa fa-list nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Category')?>" class="nav-link <?php if($this->uri->segment(2)=="Category"){echo ' CustomActive';}?>">
              <i class="fa fa-briefcase nav-icon"></i>
              <p>Category</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Products')?>" class="nav-link <?php if($this->uri->segment(2)=="Products"){echo ' CustomActive';}?>">
              <i class="fa fa-briefcase nav-icon"></i>
              <p>Products</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Portfolio')?>" class="nav-link <?php if($this->uri->segment(2)=="Portfolio"){echo ' CustomActive';}?>">
              <i class="far fa-cubes nav-icon"></i>
              <p>Orders</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Banner')?>" class="nav-link <?php if($this->uri->segment(2)=="Banner"){echo ' CustomActive';}?>">
              <i class="far fa-comment-dots nav-icon"></i>
              <p>Banner</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Clients')?>" class="nav-link <?php if($this->uri->segment(2)=="Clients"){echo ' CustomActive';}?>">
              <i class="fa fa-users nav-icon"></i>
              <p>Clients</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Video')?>" class="nav-link <?php if($this->uri->segment(2)=="Video"){echo ' CustomActive';}?>">
              <i class="fa fa-video nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="<?=base_url('Admin/editableImages')?>" class="nav-link <?php if($this->uri->segment(2)=="editableImages"){echo ' CustomActive';}?>">
              <i class="fa fa-image nav-icon"></i>
              <p>Editable images</p>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a href="<?=base_url('Admin/webProfile')?>" class="nav-link <?php if($this->uri->segment(2)=="webProfile"){echo ' CustomActive';}?>">
              <i class="fa fa-globe nav-icon"> </i>
              <p> <?//=APP_NAME?> Web profile</p>
            </a>
          </li> -->

          <li class="nav-item mt-4" id="website-link">
            <a href="<?=base_url()?>" target=_blank class="nav-link">
              <i class="fas fa-external-link-alt nav-icon"></i>
              <p>Open Website</p>
            </a>
          </li>

          <!-- <li class="nav-item has-treeview <?php /* if($this->uri->segment(2)=="adminMainGall" OR $this->uri->segment(2)=="adminCaterGall"){echo ' menu-open';} */?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Gallery
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ml-3">
              <li class="nav-item">
                <a href="<?/* echo base_url('welcome/adminMainGall') */?>" class="nav-link <?php /* if($this->uri->segment(2)=="adminMainGall"){echo ' CustomActive';} */?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Main Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php /* echo base_url('welcome/adminCaterGall') */?>" class="nav-link <?php /* if($this->uri->segment(2)=="adminCaterGall"){echo ' CustomActive';} */?>">
                  <i class="fas fa-circle nav-icon"></i>
                  <p class='text-muted'>Catering Gallery</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>