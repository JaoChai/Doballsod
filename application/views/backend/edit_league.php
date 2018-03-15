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
                    <div class="col-lg-6">

                        <?php echo form_open();?>
                            <div class="form-group">
                                <label>เพิ่ม ลีก</label>
                                <input class="form-control" name="league" value="<?php echo $result->lea_name;?>">
                                
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="float: right;">บันทึก</button>
                            </div>

                      </div>
                      <?php echo form_close();?>


                    </div>

           </div>
           <!-- /.container-fluid -->

       </div>
       <!-- /#page-wrapper -->

   </div>
   <!-- /#wrapper -->
