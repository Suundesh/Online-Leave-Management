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
      <a href="<?php echo base_url(); ?>employee/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt "></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>employee/leavestatus" class="nav-link">
        <i class="nav-icon fas fa-thumbs-up"></i>
        <p>
          Leave Status
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>employee/timetable_page" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Time Table
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>employee/Profile_Page" class="nav-link">
        <i class="nav-icon fas fa-user-alt"></i>
        <p>
          Profile
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