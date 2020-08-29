<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="logo" width="60" class="shadow-light rounded-circle">
            <a href="<?php echo base_url('admin'); ?>">SiParkir.com</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url('admin'); ?>">SP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="<?php echo base_url('admin'); ?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Administrator</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'components_article' || $this->uri->segment(2) == 'components_avatar' || $this->uri->segment(2) == 'components_chat_box' || $this->uri->segment(2) == 'components_table' || $this->uri->segment(2) == 'components_user' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Menu</span></a>
              <ul class="dropdown-menu">
                <li class="<?php echo $this->uri->segment(2) == 'components_article' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('admin/jenis_kendaraan'); ?>">Jenis Kendaran</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'components_avatar' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url('admin/jenis_parkir'); ?>">Jenis Parkir</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'components_chat_box' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('admin/peralatan'); ?>">Tempat / Peralatan</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'components_table' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('admin/lokasi'); ?>">Lokasi</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'components_user' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url('admin/user'); ?>">User</a></li>
              </ul>
            </li>
            <li class="menu-header">Parkir</li>
            <li class="dropdown">
              <a href="<?php echo base_url('admin/parkir'); ?>"><i class="fas fa-bicycle"></i> <span>Parkir</span></a>
            </li>
            <li class="menu-header">Pelaporan</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'forms_advanced_form' || $this->uri->segment(2) == 'forms_editor' || $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>">
              <a href="<?php echo base_url('admin/laporan'); ?>"><i class="far fa-file-alt"></i> <span>Forms Laporan</span></a>
            </li>
            <li class="menu-header">User</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'forms_advanced_form' || $this->uri->segment(2) == 'forms_editor' || $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>">
              <a data-confirm="Realy?|Do you want to continue logout?" data-confirm-yes="location.href='<?php echo base_url('auth/logout'); ?>';"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>   
            </li>
          </ul>
        </aside>
      </div>
