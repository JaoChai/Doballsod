<div id="wrapper">

       <div id="page-wrapper">

           <div class="container-fluid">

               <!-- Page Heading -->
               <div class="row">
                   <div class="col-lg-12">
                       <h1 class="page-header">
                           จัดการช่องทีวี
                       </h1>
                   </div>
               </div>
               <!-- /.row -->
               <div class="row">
                    <div class="col-lg-12">

                        <?php echo form_open('backend/createch');?>

                          <div class="form-group">
                              <label>ชื่อช่อง</label>
                              <input class="form-control" name="ch_name">
                          </div>

                          <div class="form-group">
                              <label>URL Video</label>
                              <input class="form-control" name="ch_url">
                          </div>
                          <?php echo $this->session->flashdata('alert');?>
                           <button type="submit" class="btn btn-primary" style="float: right;">บันทึก</button>
                          <?php echo form_close(); ?>
                      </div>
                    </div>

                    <br/>

                    <div class="col-lg-12">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th>NO.</th>
                          <th>Name</th>
                          <th>URL</th>
                          <th style="text-align:center">Date</th>
                          <th style="text-align:center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $num = 1;
                          foreach($result  as $row): ?>
                        <tr>
                          <td><?php echo $num++;?></td>
                          <td><?php echo $row->ch_name;?></td>
                          <td><?php echo $row->ch_url;?></td>
                          <td><?php echo date('d-m-Y H:i:s', strtotime($row->ch_date));?></td>
                          <td>
                            <a href="<?php echo site_url('backend/updatech/'. $row->ch_id);?>" class="btn btn-warning">Edit</a>
                            <a href="<?php echo site_url('backend/deletech/'. $row->ch_id);?>" class="btn btn-danger">Delete</a>
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
