<div id="wrapper">

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            จัดการรูปภาพ
          </h1>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-12">

          <?php echo form_open('backend/create_img');?>
          <div class="form-group">
            <label>เพิ่ม Banner บน</label>
            <textarea name="banner1"><?php echo $img->ban_on;?></textarea>
            <?php echo $this->session->flashdata('alert');?>
          </div>

          <div class="form-group">
            <label>เพิ่ม Banner ซ้าย</label>
            <textarea name="banner2"><?php echo $img->ban_left;?></textarea>
            <?php echo $this->session->flashdata('alert');?>
          </div>

          <div class="form-group">
            <label>เพิ่ม Banner ขวา</label>
            <textarea name="banner3"><?php echo $img->ban_right; ?></textarea>
            <?php echo $this->session->flashdata('alert');?>
          </div>

          <div class="form-group">
            <label>เพิ่ม Banner ในวีดีโอ</label>
            <textarea name="banner4"><?php echo $img->ban_video; ?></textarea>
            <?php echo $this->session->flashdata('alert');?>
          </div>

          <div class="form-group">
            <label>เพิ่ม Banner ล่าง</label>
            <textarea name="banner5"><?php echo $img->ban_bottom; ?></textarea>
            <?php echo $this->session->flashdata('alert');?>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary" style="float: right;">บันทึก</button>
          </div>

        </div>
        <?php echo form_close();?>
      </div>

      <br/>
      <!-- <div class="row">

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
</div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script type="text/javascript">
CKEDITOR.replace('banner1');
CKEDITOR.replace('banner2');
CKEDITOR.replace('banner3');
CKEDITOR.replace('banner4');
CKEDITOR.replace('banner5');
</script>
