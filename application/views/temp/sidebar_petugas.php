<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img src="<?php echo base_url(); ?>assets/img/logo/logo.png" alt="logo" width="60" class="shadow-light rounded-circle">
            <a href="<?php echo base_url('petugas'); ?>">SiParkir.com</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url('petugas'); ?>">SP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="<?php echo base_url('petugas'); ?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data Parkir</li>
            <li class="dropdown">
              <a href="<?php echo base_url('petugas/parkir'); ?>"><i class="fas fa-bicycle"></i> <span>Parkir</span></a>
            </li>
            <li class="menu-header"> </li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'forms_advanced_form' || $this->uri->segment(2) == 'forms_editor' || $this->uri->segment(2) == 'forms_validation' ? 'active' : ''; ?>">
              <a data-confirm="Realy?|Do you want to continue logout?" data-confirm-yes="location.href='<?php echo base_url('auth/logout'); ?>';"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a>    
            </li>
          </ul>
        </aside>
      </div>
