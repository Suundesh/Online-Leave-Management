<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
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
            <?php  foreach($admindetails as $row): ?>
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo $row->name;?></h3>
                <p class="text-muted text-center">Admin</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $row->email;?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Number</b> <a class="float-right"><?php echo $row->phone;?></a>
                  </li>
                </ul>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Update</a></li>
                  <li class="nav-item"><a class="nav-link " href="#update_password" data-toggle="tab">Change Password</a></li>
                </ul>
              </div>
              <!-- Update Profile -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" action="<?php echo base_url('Admin_Controller/updateprofile'); ?>" method="POST">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" name="updateemail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" name="updatenumber" placeholder="number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Change Password -->
                  <div class="tab-pane" id="update_password">
                    <form class="form-horizontal" action="<?php echo base_url('Admin_Controller/updatepassword'); ?>" method="post">
                    <!-- <form action="#" method="post"> -->
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" name="newpassword" placeholder="Password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" name="confirmnewpassword" placeholder="Confirm Password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary btn-block">Change password</button>
                        </div>
                        </div>
                      <!-- </form> -->
                    </form>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>