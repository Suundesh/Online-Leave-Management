<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Sidebar -->
<div class="sidebar">

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt "></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>admin/approved_leave" class="nav-link">
        <i class="nav-icon fas fa-thumbs-up"></i>
        <p>
          Approved Leave
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>admin/rejected_page" class="nav-link">
        <i class="nav-icon fas fa-thumbs-down"></i>
        <p>
          Rejected Leave
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>admin/Profile_Page" class="nav-link">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>
          Profile
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>admin/AddUser_Page" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Add Employee
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>auth_controller/logout" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>