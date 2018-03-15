<div class="container">
      <?php $attr = array('class'=>'form-signin');
      echo form_open('backend/login', $attr);
      ?>

        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="email" name="username" class="form-control" placeholder="Usename">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password"  >
        <?php echo $this->session->flashdata('error_mess');?>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?php echo form_close();?>

    </div> <!-- /container -->
