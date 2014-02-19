<?php
if ($this->session->userdata('username')) {
  $username = $this->session->userdata('username');
  
} else {
  redirect('/app/', 'refresh');
}
?>

<div class="row">
  <div class="large-12 columns">
 
    <!-- Navigation -->
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <!-- Title Area -->
          <li class="name">
            <h1>
              <a href="#">
                Home
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>
 
        <section class="top-bar-section">
          <ul class="right">
            <li><a href="#">Postings</a></li>
            <li><a href="<?php echo site_url().'/student/results/';?>">Results</a></li>
            <li class="has-dropdown"><a href="#"><?php echo 'Adm: '.$username; ?></a>
              <ul class="dropdown">
                <li><a href="<?php echo site_url().'/student/profile/';?>">Profile</a></li>
                <li><a href="<?php echo site_url().'/user/logout';?>">Logout</a></li>
              </ul>
            </li>
            
          </ul>
        </section>
      </nav>
 
    <!-- End Navigation -->
  
    </div>
  </div>
  
  <div class="row">
    <div class="large-12 columns">
      <div class="row">
        <?php if (empty($posting)) { if (isset($eeror)) { ?>
          <div style="color: red;"><?php echo $error; ?></div>
        <?php } ?>
          <h3>Apply for TP</h3>
          <p style="color: red; font-size: 10px;">Ensure that your profile is updated before applying for TP</p>
          
    <!-- Thumbnails -->
    <form method="post" action="<?php echo site_url().'/student/post';?>">
        <div class="large-3 small-6 columns">
          <label>Select School:</label>
          <select name="school">
          <?php foreach ($schools as $sch) { ?>
            <option value="<?=$sch->sch_id?>"><?=$sch->sch_name?></option>
          <?php } ?>
          </select>
        </div>
 
        <div class="large-3 small-6 columns">
          <label>Select Class</label>
          <select name="class">
          <?php foreach ($classes as $cls) { ?>
            <option value="<?=$cls->class_id?>"><?=$cls->class_name?></option>
          <?php } ?>
          </select>
        </div>
 
        <div class="large-3 small-6 columns">
          <label>Select Subject Option</label>
          <select name="opt">
            <?php foreach ($options as $opts) { ?>
              <option value="<?=$opts->opt_id?>"><?=$opts->opt_name?></option>
            <?php } ?>
          </select>
        </div>
 
        <div class="large-3 small-6 columns">
          <input type="submit" value="Apply" class="radius alert button">
        </div>
    </form>
    <!-- End Thumbnails -->
      
      </div>
    </div>
  </div>
 
  <?php } else {?>
          
 
  <div class="row">
    <div class="large-12 columns">
      <h6>You have applied for TP</h6>
      <div class="row">
  
    <!-- Content -->
 
        <div class="large-8 columns">
          <div class="panel radius">
          <label>Student Name</label>
          <input type="text" name="name" value="<?=$student?>" disabled>
          <label>School Posted:</label>
          <input type="text" name="sch" value="<?=$school_name?>" disabled>
          <label>Class: </label>
          <input type="text" name="class" value="<?=$class_name?>" disabled>
          <label>Subject Option:</label>
          <input type="text" name="opti" value="<?=$opts?>" disabled>
          <label>Date Posted:</label>
          <input type="text" name="date" value="<?=$posting->postedon?>" disabled>
        </div>
        </div>
 
          <div class="large-4 columns hide-for-small">
 
          <img src="<?php echo base_url().'res/img/kaimosilogo.png'?>">
 
 
        </div>
 
    <!-- End Content -->
 
      </div>
    </div>
  </div>
  <?php } ?>