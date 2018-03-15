<div id="wrapper">

       <div id="page-wrapper">

           <div class="container-fluid">

               <!-- Page Heading -->
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">
                           จัดการตารางบอล
                       </h1>
                   </div>
               </div>
               <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">

                        <?php echo form_open('backend/createfootball');?>

                          <div class="form-group">
                            <label>เลือกลีก</label>
                            <select class="form-control" name="league">
                              <option value="">Select League</option>
                              <?php foreach($league as $row): ?>
                                <option value="<?php echo $row->lea_id;?>"><?php echo $row->lea_name;?></option>
                              <?php endforeach;?>
                            </select>
                          </div>

                          <div class="form-group">
                          <label>เลือกช่อง</label>
                            <select class="form-control" name="ch">
                              <option value="">Select Channel</option>
                              <?php foreach($ch as $row): ?>
                                <option value="<?php echo $row->ch_id;?>"><?php echo $row->ch_name;?></option>
                              <?php endforeach;?>
                            </select>
                          </div>

                          <div class="form-group">
                              <label>เวลา</label>
                              <input class="form-control" name="time">
                          </div>

                            <div class="form-group">
                                <label>ทีม 1</label>
                                <input class="form-control" name="team1">
                            </div>

                            <div class="form-group">
                                <label>ทีม 2</label>
                                <input class="form-control" name="team2">
                            </div>
                            <?php echo $this->session->userdata('alert');?>
                             <button type="submit" class="btn btn-primary" style="float: right;">บันทึก</button>

                            </div>
                            <?php echo form_close();?>

                      </div>

                      <br/>

                      <div class="row">

                        <div class="col-lg-12">

                          <table class="table table-bordered">
                            <thead>
                            <tr>
                              <th>NO.</th>
                              <th>League</th>
                              <th>Channel</th>
                              <th>Time</th>
                              <th>Team1</th>
                              <th>Team2</th>
                              <th style="text-align:center">Date</th>
                              <th style="text-align:center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php $num = 1;
                              foreach($result  as $row): ?>
                            <tr>
                              <td><?php echo $num++;?></td>
                              <td><?php echo $row->lea_name;?></td>
                              <td><?php echo $row->ch_name;?></td>
                              <td><?php echo $row->table_time;?></td>
                              <td><?php echo $row->table_team1;?></td>
                              <td><?php echo $row->table_team2;?></td>
                              <td><?php echo date('d-m-Y H:i:s', strtotime($row->table_date));?></td>
                              <td>
                                <a href="<?php echo site_url('backend/updatefootball/'. $row->table_id);?>" class="btn btn-warning">Edit</a>
                                <a href="<?php echo site_url('backend/deletefootball/'. $row->table_id);?>" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>

                        </div>
                      </div>

                    </div>

           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->
