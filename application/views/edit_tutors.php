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
              <a href="<?php echo site_url().'/admin/';?>">
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
    <h6>tutors</h6>
      <div class="row">
      
  
    <!-- Content -->
 
        <div class="large-8 columns">
          <div class="panel radius">
            <table id="customers">
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
              </tr>
            <?php } ?>
          </tbody>
        </table>
          </div>
        </div>
 
          <div class="large-4 columns hide-for-small">
 
          <div class="callout panel">
            <h6>Edit Tutor</h6>
            <form method="post" action="<?php echo site_url()?>/admin/update_tutor" data-abide>
                
                  <label>First Name:</label>
                  <input type="text" name="f_name" placeholder="First Name" value="<?php echo $tutor->fname?>" required>
               
                  <label>Last Name: </label>
                  <input type="text" name="l_name" placeholder="Last Name" value="<?php echo $tutor->lname;?>" required>
                  
                  <label>Location: </label>
                  <input type="text" name="dept" placeholder="Department" value="<?php echo $tutor->dept;?>" required>
                  
                  <input type="hidden" name="staff_no" value="<?php echo $tutor->staff_no;?>">
                  <input type="submit" value="Save" class="radius alert button">
                
            </form>
          </div>
 
 
        </div>
 
    <!-- End Content -->
 
      </div>
    </div>
  </div>
  