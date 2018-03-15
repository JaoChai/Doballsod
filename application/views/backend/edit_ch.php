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
                    <div class="col-lg-6">

                        <?php echo form_open();?>

                          <div class="form-group">
                              <label>ชื่อช่อง</label>
                              <input class="form-control" name="ch_name" value="<?php echo $result->ch_name;?>">
                          </div>

                          <div class="form-group">
                              <label>URL Video</label>
                              <input class="form-control" name="ch_url" value="<?php echo $result->ch_url;?>">
                          </div>
                           <button type="submit" class="btn btn-primary" style="float: right;">บันทึก</button>
                          <?php echo form_close(); ?>
                      </div>

                    </div>

            </div>

           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->
