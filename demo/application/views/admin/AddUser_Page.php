<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add User</h1>
          </div>
          <div class="col-sm-6 ">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">Add User</button>
          </div>
        </div><!-- /.row -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Backend Code -->
            <form action="<?php echo base_url('Admin_Controller/store'); ?>" method="POST" id="add_user">
            <div class="modal-body">
            <div class="form-group ">
                    <label>Name</label>
                    <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter Name" required>
                    
            </div>
            <div class="form-group">
                    <label>Email ID</label>
                    <input type="email" class="form-control" id="emp_email" name="emp_email" placeholder="Enter email" required>
                    
            </div>
            <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="emp_password" name="emp_password" placeholder="Enter Password" required>
                    
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
            </div>
        </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email ID</th>
                    <th>Password</th>
                    <th>Reset Timetable</th>
                    <th>Delete User</th>
                    <!-- <th>CSS grade</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php  foreach($employeedetails as $row): ?>
                  <tr>
                    <td><?php echo $row->faculty_name;?></td>
                    <td><?php echo $row->faculty_email;?></td>
                    <td><?php echo $row->faculty_password;?></td>
                    <td><a href="<?php echo base_url('Admin_Controller/deletetimetable/'.$row->faculty_id) ?>" class="btn btn-danger btn-sm">Reset</a></td>
                    <td><a href="<?php echo base_url('Admin_Controller/deleteemp/'.$row->faculty_id) ?>" class="btn btn-danger btn-sm">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
              <div>
                  <a href="<?php echo base_url('Admin_Controller/resettimetable') ?>" class="btn btn-danger">Reset Time Table </a>
              </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
