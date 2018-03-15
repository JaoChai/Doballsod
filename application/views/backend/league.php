<div id="wrapper">

       <div id="page-wrapper">

           <div class="container-fluid">

               <!-- Page Heading -->
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">
                           จัดการลีก
                       </h1>
                   </div>
               </div>
               <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">

                        <?php echo form_open('backend/createleague');?>
                            <div class="form-group">
                                <label>เพิ่ม ลีก</label>
                                <input class="form-control" name="league" value="">
                                <?php echo $this->session->flashdata('alert');?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="float: right;">บันทึก</button>
                            </div>

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
                        <th>Name</th>
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
                        <td><?php echo date('d-m-Y H:i:s', strtotime($row->lea_date));?></td>
                        <td>
                          <a href="<?php echo site_url('backend/updateleague/'. $row->lea_id);?>" class="btn btn-warning">Edit</a>
                          <a href="<?php echo site_url('backend/deleteleague/'. $row->lea_id);?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>

                    </div>
                </div>

           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->
