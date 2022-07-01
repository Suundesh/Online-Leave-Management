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
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
<section class="content">
    <div class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-solid fa-calendar-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Leave Available</span>
                <span class="info-box-number">
                <?php  foreach(array_slice($empleavedetails,0,1) as $row): ?>
                  <?php echo $row->faculty_leaveleft; ?>
                <?php endforeach; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Leave Taken</span>
                <span class="info-box-number">
                <?php  foreach(array_slice($empleavedetails,0,1) as $row): ?>
                  <?php echo $row->faculty_leavetaken; ?>
                <?php endforeach; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-md-6 ">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Apply Leave</h3>
              </div>
              <!-- form start -->
              <form action="<?php echo base_url('Employee_Controller/presentleavedata'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >From</label>
                    <input type="date" class="form-control" id="" name="from_date" required>
                  </div>
                  <div class="form-group">
                    <label >To</label>
                    <input type="date" class="form-control" id="" name="to_date" required>
                  </div>
                  <div class="form-group">
                    <label>Leave Type</label>
                    <select name="leavetype" class="form-control">
                      <option value="Casual Leave">Casual Leave</option>
                      <option value="Planned Leave">Planned Leave</option>
                      <option value="Matrimonial Leave">Matrimonial Leave</option>
                      <option value="Maternity Leave">Maternity Leave</option>
                      <option value="Paternity Leave">Paternity Leave</option>
                      <option value="Medical Recovery Leave">Medical Recovery Leave</option>
                      <option value="Bereavement Leave">Bereavement Leave</option>
                      <option value="Sabbatical Leave">Sabbatical Leave</option>
                      <option value="Extraordinary Leave">Extraordinary Leave</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Supporting Document</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="" name="emp_document">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                  <label>Pending Leaves</label>
                  <input type="text" class="form-control" id="" name="pendingleavedates" required>
                  </div> -->
                  <div class="form-group">
                  <label >Reason</label>
                    <textarea class="form-control" name="leave_reason" id="" cols="40" rows="3" required>Leave a Message(Mandatory)</textarea>
                  </div>
                  <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Save</button>
                  </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
      </div>
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            Alternate Faculty
          </div>
          <div class="card-body">
            <form action="<?php echo base_url('Employee_Controller/addalternatefaculty')?>" method="POST">
              <div id="error"></div>
                <div class="form-group">
                    <label>Pending Leaves</label>
                    <select name="pendingleave" class="dates form-control" id="pendingdates">
                      <option value="">Select Date</option>
                    <?php  foreach($empdetails as $row): ?>
                      <option value="<?php echo $row->presentdataid; ?>"><?php echo $row->leavefrom; ?></option> 
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Select Date</label>
                    <div id="displaydate">
                    </div>
                  </div>
                  <div class="form-group">
                    <label >Select Hour</label>
                    <select name="alternatehour" id="alternatehour" class="dates form-control">
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Alternate Faculty</label>
                    <select name="alternatefaculty" id="alternatefaculty" class="dates form-control">
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <!-- /.card-body -->
            </form>
          </div>
        </div>
      </div>
        </div>
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content -->
  </div>
  
</section>

  
