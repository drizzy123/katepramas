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
            <li><a href="<?php echo site_url().'/admin/tutors/';?>">Tutors</a></li>
            <li><a href="<?php echo site_url().'/posting/';?>">Postings</a></li>
            <li><a href="<?php echo site_url().'/results/';?>">Results</a></li>
            <li class="has-dropdown"><a href="#"><?php echo 'Staff: '.$username; ?></a>
              <ul class="dropdown">
                <li><a href="<?php echo site_url().'/admin/profile/';?>">Profile</a></li>
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
    <h6>Post Tutors</h6>
      <div class="row">
      
  
    <!-- Content -->
 
        <div class="large-8 columns">
          <div class="panel radius">
            <form method="post" action="" data-abide>
                
                  <label>Select Tutor:</label>
                  <select name="tutor">
                    <?php foreach ($tutors as $tutor) { ?>
                      <option <?php echo $tutor['staff_no']?>><?php echo $tutor['fname']." ".$tutor['lname']?></option>
                    <?php } ?>
                  </select>

                  <label>Select Day:</label>
                  <select name="day">
                    <option value="1">Monday</option>
                    <option value="2">Tuesday</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                  </select>
               
                  <label>Select Zone:</label>
                  <select name="zone">
                    <?php foreach ($locations as $location) { ?>
                      <option value="<?php echo $location['zone_id']?>"><?php echo $location['zone_name']?></option>
                    <?php } ?>
                  </select>
         
                  <input type="submit" value="Save" class="radius button">
                  <a href="<?php echo site_url()?>/admin/tutors" class="radius alert button">Cancel</a>
            </form>
          </div>
        </div>
 
          <div class="large-4 columns hide-for-small">
 
          <img src="<?php echo base_url().'res/img/kaimosilogo.png'?>">
 
 
        </div>
 
    <!-- End Content -->
 
      </div>
    </div>
  </div>
  