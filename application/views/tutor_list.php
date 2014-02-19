<?php
if ($this->session->userdata('username')) {
  $username = $this->session->userdata('username');
  $level = $this->session->userdata('user_level');
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
              <?php if ($level=='admin') { ?>
              <a href="<?php echo site_url().'/admin/';?>">
                Home
              </a>
            <?php } ?>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>
 
        <section class="top-bar-section">
          <ul class="right">
            <li><a href="#">Tutors</a></li>
            <li><a href="<?php echo site_url().'/posting/';?>">Postings</a></li>
            <li><a href="<?php echo site_url().'/results/';?>">Results</a></li>
            <li class="has-dropdown"><a href="#"><?php echo 'Staff: '.$username; ?></a>
              <ul class="dropdown">
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
      <h6>All Tutors</h6>
      <?php if ($level == 'admin') { ?>
        <a href="<?php echo site_url().'/admin/create_tutor';?>">Add new tutor</a>
        <a href="<?php echo site_url().'/admin/post_tutors';?>">Post Tutors</a>
      <?php } ?>
      
    <?php //print_r($tutors); ?>
    <!-- Content -->
        <table id="customers">
          <thead>
            <th>NO</th><th>Tutor Name</th><th>Department</th>
          </thead>
          <tbody>
            <?php foreach ($tutors as $value) { ?>
              <tr>
                <td><?php echo $value['staff_no']?></td>
                <td><?php echo $value['fname'] ." ". $value['lname']?></td>
                <td><?php echo $value['dept']?></td>
                <td><a href="<?php echo site_url().'/admin/edit_tutors/'.$value['staff_no']?>">Edit</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
    <!-- End Content -->
 
      
    </div>
  </div>
  