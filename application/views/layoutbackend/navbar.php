<?php $session_data = $this->session->userdata('logged_in');?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Madoball</a>
    </div>
    <ul class="nav navbar-right top-nav">

      <li class="dropdown">
          <a target="_blank" href="<?php echo base_url();?>" > Go To Web </a>
      </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $session_data['username'];?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo site_url('backend/logout');?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="<?php echo site_url('backend/viewleague');?>"></i>จักการลีก</a>
            </li>
            <li>
                <a href="<?php echo site_url('backend/viewtablefootball');?>"></i>จัดการตารางบอล</a>
            </li>
             <li>
                <a href="<?php echo site_url('backend/viewch');?>"></i>จัดการช่องทีวี</a>
            </li>
            <li><a href="<?php echo site_url('backend/viewimg');?>"></i>จัดการรูปภาพ</a></li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
