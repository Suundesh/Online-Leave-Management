<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rejected Leave</h1>
          </div><!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">DataTable with default features</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Department</th>
                    <th>Leave Type</th>
                    <th>View Details</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  foreach($empleavedetails as $row): ?>
                  <tr>
                    <td><?php echo $row->faculty_name;?></td>
                    <td><?php echo $row->leavefrom;?></td>
                    <td><?php echo $row->leaveto;?></td>
                    <td><?php echo $row->faculty_department;?></td>
                    <td><?php echo $row->leavereason;?></td>
                    <td><a href="<?php echo base_url('Admin_Controller/leavedetails_page/'.$row->presentdataid) ?>" 
                          class="btn-primary btn btn-sm">View</a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      <!-- Remove till here -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
