<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Leave Details Page -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details</h1>
          </div>
        </div>
      </div>
    </section>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <?php  foreach($empleavedetails as $row): ?>
              <div class="card-body box-profile">

                <h3 class="profile-username text-center"><?php echo $row->faculty_name;?></h3>

                <p class="text-muted text-center"><?php echo $row->faculty_department;?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $row->faculty_email;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Number</b> <a class="float-right"><?php echo $row->faculty_phone;?></a>
                  </li>
                </ul>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- Details Container Starts Here -->
          <div class="col-md-9">
          <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo base_url('Admin_Controller/approveleave/'.$row->presentdataid); ?>" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="" value="<?php echo $row->faculty_name;?>" placeholder="" disabled>
                  </div>
                  <div class="form-group">
                    <label>Leave From</label>
                    <input type="text" class="form-control" id="" value="<?php echo $row->leavefrom;?>" placeholder="" disabled>
                  </div>
                  <div class="form-group">
                    <label>Leave Upto</label>
                    <input type="text" class="form-control" id="" value="<?php echo $row->leaveto;?>" placeholder="" disabled>
                  </div>
                  <div class="form-group">
                    <label>Number Of Days</label>
                    <input type="text" class="form-control" id="" placeholder="" value="<?php echo $row->numofdays;?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Leave Type</label>
                    <input type="text" class="form-control" id="" value="<?php echo $row->leavetype;?>" placeholder="" disabled>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Alternate Faculty</h3>
                      <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                        </ul>
                      </div>
                    </div>
                        <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Number</th>
                              <th>Hour</th>
                              <th>Date</th>
                              <th>Status</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php  foreach($alternatefaculty as $row1): ?>
                            <tr>
                              <td><?php echo $row1->faculty_name;?></td>
                              <td><?php echo $row1->faculty_phone;?></td>
                              <td><?php echo $row1->hour;?></td>
                              <td><?php echo $row1->date;?></td>
                              <td><?php echo $row1->alternate_status;?></td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                  <!-- /.card-body -->
                  </div>
                  <div class="form-group">
                    <label >Supporting Document</label>
                    <?php if($row->documents!=''): ?>
                    <div class="input-group">
                      <div class="custom-file">
                      <a href="<?php echo base_url();?>assets/uploads/<?php echo $row->documents; ?> "download class="btn btn-primary">Download</a>
                      </div>
                    </div>
                    <?php else: ?>
                      <p>No Documents</p>
                    <?php endif; ?>
                  </div>
                  <div class="form-group">
                  <label>Admin Remarks</label>
                    <textarea class="form-control" name="adminremarks" id="" cols="40" rows="3" required>Leave a Message(Mandatory)</textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                <button type="submit" class="btn btn-primary">Approve</button>
                <button type="submit" class="btn btn-danger float-right" formaction="<?php echo base_url('Admin_Controller/rejectleave/'.$row->presentdataid); ?>">Reject</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>