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
                    <div class="col-lg-6">

                        <?php echo form_open();?>

                          <div class="form-group">
                            <label>เลือกลีก</label>
                            <select class="form-control" name="league">
                              <option value="">Select League</option>
                              <?php foreach($league as $row): ?>
                                <?php if($result->lea_id == $row->lea_id){ ?>
                                  <option value="<?php echo $row->lea_id;?>" selected><?php echo $row->lea_name;?></option>
                                  <?php }else{ ?>
                                    <option value="<?php echo $row->lea_id;?>"><?php echo $row->lea_name;?></option>
                                <?php } ?>
                              <?php endforeach;?>
                            </select>
                          </div>

                          <div class="form-group">
                          <label>เลือกช่อง</label>
                            <select class="form-control" name="ch">
                              <option value="">Select Channel</option>
                              <?php foreach($ch as $row): ?>
                                <?php if($result->ch_id == $row->ch_id){ ?>
                                  <option value="<?php echo $row->ch_id;?>" selected><?php echo $row->ch_name;?></option>
                                  <?php }else{ ?>
                                    <option value="<?php echo $row->ch_id;?>"><?php echo $row->ch_name;?></option>
                                <?php }?>
                              <?php endforeach;?>
                            </select>
                          </div>

                          <div class="form-group">
                              <label>เวลา</label>
                              <input class="form-control" name="time" value="<?php echo $result->table_time;?>">
                          </div>

                            <div class="form-group">
                                <label>ทีม 1</label>
                                <input class="form-control" name="team1" value="<?php echo $result->table_team1;?>">
                            </div>

                            <div class="form-group">
                                <label>ทีม 2</label>
                                <input class="form-control" name="team2" value="<?php echo $result->table_team2;?>">
                            </div>
                            <?php echo $this->session->userdata('alert');?>
                             <button type="submit" class="btn btn-primary" style="float: right;">บันทึก</button>

                            </div>
                            <?php echo form_close();?>

                      </div>

                    </div>

           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->
