
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('Admin')?>" class="brand-link ml-1">
      <span class="brand-text text-lg d-flex ml-3"><img src="<?=base_url('assets/images/logo_adm.png')?>" alt="Logo" height="50px" class=""></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/images/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?=base_url('Admin/adminProfile')?>" class="d-block"> <?php echo $this->session->user->fname .'&nbsp;' . $this->session->user->lname ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview <?php if($this->uri->segment(2)=="" OR $this->uri->segment(2)=="Callback"){echo ' menu-open';}?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>

            <ul class="nav nav-treeview ml-3">
              <li class="nav-item">
                <a href="<?=base_url('Admin')?>" class="nav-link <?php if($this->uri->segment(1)=="Admin" AND $this->uri->segment(2)=="" AND $this->uri->segment(3)==""){echo ' CustomActive';}?>">
                  <i class="fas fa-bookmark nav-icon"></i>
                  <p>Appointments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Admin/Callback')?>" class="nav-link <?php if($this->uri->segment(2)=="Callback"){echo ' CustomActive';}?>">
                  <i class="fas fa-phone nav-icon"></i>
                  <p>Callback requests</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Banner_images')?>" class="nav-link <?php if($this->uri->segment(2)=="Banner_images"){echo ' CustomActive';}?>">
              <i class="fa fa-images nav-icon"></i>
              <p>Banners</p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="<?=base_url('Admin/Header_images')?>" class="nav-link <?php if($this->uri->segment(2)=="Banner_images"){echo ' CustomActive';}?>">
              <i class="fa fa-square nav-icon"></i>
              <p>Header images</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="<?=base_url('Admin/Cases')?>" class="nav-link <?php if($this->uri->segment(2)=="Cases"){echo ' CustomActive';}?>">
              <i class="fa fa-users nav-icon"></i>
              <p>Patient cases</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Album')?>" class="nav-link <?php if($this->uri->segment(2)=="Album"){echo ' CustomActive';}?>">
              <i class="far fa-image nav-icon"></i>
              <p>Gallery</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/Feedbacks')?>" class="nav-link <?php if($this->uri->segment(2)=="Feedbacks"){echo ' CustomActive';}?>">
              <i class="far fa-comment-dots nav-icon"></i>
              <p>Feedbacks</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('Admin/webProfile')?>" class="nav-link <?php if($this->uri->segment(2)=="webProfile"){echo ' CustomActive';}?>">
              <i class="fa fa-globe nav-icon"></i>
              <p>NDC Web profile</p>
            </a>
          </li>

          <li class="nav-item mt-4 mb-5" id="website-link">
            <a href="<?=base_url()?>" target=_blank class="nav-link">
              <i class="fas fa-external-link-alt nav-icon"></i>
              <p>Open Website</p>
            </a>
          </li>
          
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>