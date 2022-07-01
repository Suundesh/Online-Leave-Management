<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
      <?php  foreach($empleavedetails as $row): ?>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body text-center shadow">
            <h5 class="card-text mb-3"><?php echo $row->faculty_name;?></h5>
              <p class="card-text "><?php echo $row->faculty_phone;?></p>
              <p class="card-text"><?php echo $row->faculty_email;?></p>
              <a href="<?php echo base_url('Admin_Controller/Details_Page/'.$row->presentdataid)?>" 
                  class="btn btn-primary btn-block">View Details</a> 
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
