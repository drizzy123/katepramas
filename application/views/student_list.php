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
            <li><a href="#">Students</a></li>
            <li><a href="<?php echo site_url().'/posting/';?>">Postings</a></li>
            <li><a href="<?php echo site_url().'/results/';?>">Results</a></li>
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
      <h6>Students</h6>
    <?php //print_r($students); ?>
    <!-- Content -->
        <table id="customers">
          <thead>
            <th>NO</th><th>Student Name</th><th>Gender</th><th>Phone</th>
          </thead>
          <tbody>
            <?php foreach ($students as $value) { ?>
              <tr>
                <td><?php echo $value['adm_no']?></td>
                <td><?php echo $value['fname']?> <?$value['lname']?></td>
                <td><?php echo $value['gender']?></td>
                <td><?php echo $value['phone']?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
    <!-- End Content -->
 
      
    </div>
  </div>
  