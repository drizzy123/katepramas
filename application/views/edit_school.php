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
    <h6>Schools</h6>
      <div class="row">
      
  
    <!-- Content -->
 
        <div class="large-8 columns">
          <div class="panel radius">
            <table id="customers">
              <thead>
                <th>ID</th><th>School Name</th><th>Vacancies</th><th>Location</th>
              </thead>
              <tbody>
                <?php foreach ($schools as $school) { ?>
                  <tr>
                    <td><?php echo $school['sch_id'];?></td>
                    <td><?php echo $school['sch_name'];?></td>
                    <td><?php echo $school['vacancies'];?></td>
                    <td><?php echo get_zonename($school['location']);?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
 
          <div class="large-4 columns hide-for-small">
 
          <div class="callout panel">
            <h6>Edit school</h6>
            <form method="post" action="<?php echo site_url()?>/admin/update_school" data-abide>
                
                  <label>School Name:</label>
                  <input type="text" name="sch_name" placeholder="School Name" value="<?php echo $e_school->sch_name?>" required>
               
                  <label>Vacancies: </label>
                  <input type="text" name="vacancies" placeholder="Vacancies" value="<?php echo $e_school->vacancies;?>" required>
                  
                  <label>Location: </label>
                  <select name="location">
                  <?php foreach ($locations as $location) { ?>
                    <option value="<?php echo $location['zone_id']?>"><?php echo $location['zone_name']?></option>
                  <?php } ?>
                  </select>
                  
                  <input type="hidden" name="sch_id" value="<?php echo $e_school->sch_id;?>">
                  <input type="submit" value="Save" class="radius alert button">
                
            </form>
          </div>
 
 
        </div>
 
    <!-- End Content -->
 
      </div>
    </div>
  </div>
  