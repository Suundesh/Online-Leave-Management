<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Time Table</h1>
          </div>
          <div class="col-sm-6 ">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">Add Data</button>
          </div>
        </div><!-- /.row -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Time Table</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url('Employee_Controller/storetimetable'); ?>" method="POST" id="">
              <div class="form-group">
                    <label>Select Day</label>
                    <select name="timetabledays" class="form-control">
                      <option value="Mon">Monday</option>
                      <option value="Tue">Tuesday</option>
                      <option value="Wed">Wednesday</option>
                      <option value="Thu">Thursday</option>
                      <option value="Fri">Friday</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="pills-S1-tab" data-toggle="pill" href="#pills-S1" role="tab" aria-controls="pills-S1" aria-selected="true">S1</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-S2-tab" data-toggle="pill" href="#pills-S2" role="tab" aria-controls="pills-S2" aria-selected="false">S2</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-S3-tab" data-toggle="pill" href="#pills-S3" role="tab" aria-controls="pills-S3" aria-selected="false">S3</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-S4-tab" data-toggle="pill" href="#pills-S4" role="tab" aria-controls="pills-S4" aria-selected="false">S4</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-S5-tab" data-toggle="pill" href="#pills-S5" role="tab" aria-controls="pills-S5" aria-selected="false">S5</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-S6-tab" data-toggle="pill" href="#pills-S6" role="tab" aria-controls="pills-S6" aria-selected="false">S6</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-S7-tab" data-toggle="pill" href="#pills-S7" role="tab" aria-controls="pills-S7" aria-selected="false">S7</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pills-S8-tab" data-toggle="pill" href="#pills-S8" role="tab" aria-controls="pills-S8" aria-selected="false">S8</a>
                      </li>
                    </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-S1" role="tabpanel" aria-labelledby="pills-S1-tab">
                        <div class="form-group">
                          <label>Enter Subject Code</label>
                          <input type="text" name="subject_s1" id="" class="form-control" placeholder="Enter the Hour 1 subject code" required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s1" id="" class="form-control" placeholder="Enter the Hour 1 section" required>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-S2" role="tabpanel" aria-labelledby="pills-S2-tab">
                        <div class="form-group">
                        <label>Enter Subject Code</label>
                          <input type="text" name="subject_s2" id="" class="form-control" placeholder="Enter the Hour 2 subject code " required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s2" id="" class="form-control" placeholder="Enter the Hour 2 section" required>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-S3" role="tabpanel" aria-labelledby="pills-S3-tab">
                        <div class="form-group">
                        <label>Enter Subject Code</label>
                          <input type="text" name="subject_s3" id="" class="form-control" placeholder="Enter the Hour 3 subject code" required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s3" id="" class="form-control" placeholder="Enter the Hour 3 section" required>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-S4" role="tabpanel" aria-labelledby="pills-S4-tab">
                        <div class="form-group">
                        <label>Enter Subject Code</label>
                          <input type="text" name="subject_s4" id="" class="form-control" placeholder="Enter the Hour 4 subject code" required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s4" id="" class="form-control" placeholder="Enter the Hour 4 section" required>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-S5" role="tabpanel" aria-labelledby="pills-S5-tab">
                        <div class="form-group">
                        <label>Enter Subject Code</label>
                          <input type="text" name="subject_s5" id="" class="form-control" placeholder="Enter the Hour 5 subject code " required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s5" id="" class="form-control" placeholder="Enter the Hour 5 section" required>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-S6" role="tabpanel" aria-labelledby="pills-S6-tab">
                        <div class="form-group">
                        <label>Enter Subject Code</label>
                          <input type="text" name="subject_s6" id="" class="form-control" placeholder="Enter the Hour 6 subject code" required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s6" id="" class="form-control" placeholder="Enter the Hour 6 section" required>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-S7" role="tabpanel" aria-labelledby="pills-S7-tab">
                        <div class="form-group">
                        <label>Enter Subject Code</label>
                          <input type="text" name="subject_s7" id="" class="form-control" placeholder="Enter the Hour 7 subject code" required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s7" id="" class="form-control" placeholder="Enter the Hour 7 section" required>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="pills-S8" role="tabpanel" aria-labelledby="pills-S8-tab">
                        <div class="form-group">
                        <label>Enter Subject Code</label>
                          <input type="text" name="subject_s8" id="" class="form-control" placeholder="Enter the Hour 8 subject code" required>
                        </div>
                        <div class="form-group">
                          <label>Enter Section</label>
                          <input type="text" name="section_s8" id="" class="form-control" placeholder="Enter the Hour 8 section" required>
                        </div>
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
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Day</th>
                    <!-- <th>Name</th> -->
                    <th>S1</th>
                    <th>S2</th>
                    <th>S3</th>
                    <th>S4</th>
                    <th>S5</th>
                    <th>S6</th>
                    <th>S7</th>
                    <th>S8</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  foreach($employeetimetable as $row): ?>
                  <tr>
                    <td><?php echo $row->day;?></td>
                    <td><?php echo "$row->s1subject,$row->s1section";?></td>
                    <td><?php echo "$row->s2subject,$row->s2section";?></td>
                    <td><?php echo "$row->s3subject,$row->s3section";?></td>
                    <td><?php echo "$row->s4subject,$row->s4section";?></td>
                    <td><?php echo "$row->s5subject,$row->s5section";?></td>
                    <td><?php echo "$row->s6subject,$row->s6section";?></td>
                    <td><?php echo "$row->s7subject,$row->s7section";?></td>
                    <td><?php echo "$row->s8subject,$row->s8section";?></td>
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


  
