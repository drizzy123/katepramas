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
            <li><a href="<?php echo site_url().'/tutor/students/';?>">Students</a></li>
            <li><a href="<?php echo site_url().'/posting/';?>">Postings</a></li>
            <li><a href="<?php echo site_url().'/results';?>">Results</a></li>
            <li class="has-dropdown"><a href="#"><?php echo 'Staff: '.$username; ?></a>
              <ul class="dropdown">
                <li><a href="#">Profile</a></li>
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
      
  
    <!-- Content -->
 
        <div class="large-8 columns">
          <div class="panel radius">
            <img src="<?php echo base_url().'res/img/kaimosi.jpg';?>">
          </div>
        </div>
 
          <div class="large-4 columns hide-for-small">
 
          <img src="<?php echo base_url().'res/img/kaimosilogo.png'?>">
 
 
        </div>
 
    <!-- End Content -->
 
      </div>
    </div>
  </div>
  