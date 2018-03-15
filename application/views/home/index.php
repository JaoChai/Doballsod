<!-- 
<center>
<a href="https://line.me/R/ti/p/@madooball" target="_blank"><img src="http://www.xn--l3car8bzaq6f.online/image/ontop.gif"></a> 
</center> -->
<br class="cr" />
<div class="space30"></div>


<?php foreach($header as $rs): ?>
  <div class="space20"></div>
  <div class="fs31 fc-gold"><?php echo $rs->lea_name;?></div>

<div class="space10"></div>

<?php foreach($result as $row): ?>

  <?php if($rs->lea_name == $row->lea_name){?>
    <div class="fl label-league">
      <font color="#fff"><?php echo $row->table_time;?></font>
    </div>

    <div class="fl ml3 label-team align-tr"><?php echo $row->table_team1;?></div>

    <div class="fl ml3 label-vs align-tc">VS</div>

    <div class="fl ml3 label-team"><?php echo $row->table_team2;?></div>

    <div class="fl ml3 label-timeplay">
      <a class="fs13 fc-black " href="<?php echo site_url('welcome/viewcontent/'. $row->ch_id);?>" target="_blank"><?php echo $row->ch_name;?></a>
      &nbsp;&#124;&nbsp;<a class="fs13 fc-black"  target="_blank" href="https://www.kbet1688.com/promotion/">เล่นคู่นี้</a>
    </div>

    <?php } ?>
  <?php endforeach;?>
  <?php endforeach;?>

  <br class="cr" />
  <br class="cr" />
  <br class="cr" />

  <center>
    <a href="https://www.kbet1688.com/promotion/" target="_blank"><img width="980px" src="
        http://www.xn--l3car8bzaq6f.online/image/ดูบอลสด-ล่าง.gif" alt="ดูบอลสด.online" /></a>
  </center>
