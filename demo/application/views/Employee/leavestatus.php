<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Status</h1>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Leave Type</th>
                    <th>Reason</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  foreach($empleavedetails as $row): ?>
                  <tr>
                    <td><?php echo $row->leavefrom;?></td>
                    <td><?php echo $row->leaveto;?></td>
                    <td><?php echo $row->leavetype;?></td>
                    <td><?php echo $row->leavereason;?></td>
                    <td><a href="<?php echo base_url('Employee_Controller/statusdetails/'.$row->presentdataid) ?>" 
                          class="btn-primary btn btn-sm">View</a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
  </div>


  
