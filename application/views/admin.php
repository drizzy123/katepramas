<?php
if ($this->session->userdata('username')) {
  $username = $this->session->userdata('username');
  
} else {
  redirect('/app/', 'refresh');
}
?>
<?php $this->load->view('layout/admin_menu'); ?>
 
  <div class="row">
    <div class="large-12 columns">
    <h6>Schools</h6>
      <div class="row">
      
  
    <!-- Content -->
 
        <div class="large-8 columns">
          <div class="panel radius">
          <a href="#" data-reveal-id="myModal" data-reveal>Create New Zone</a>
          <br>
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
                    <td><a href="<?php echo site_url()?>/admin/edit_school/<?php echo $school['sch_id'];?>">Edit</a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
 
          <div class="large-4 columns hide-for-small">
 
          <div class="callout panel">
            <h6>Add new school</h6>
            <form method="post" action="<?php echo site_url()?>/admin/create_school" data-abide>
                
                  <label>School Name:</label>
                  <input type="text" name="sch_name" placeholder="School Name" required>
               
                  <label>Vacancies: </label>
                  <input type="text" name="vacancies" placeholder="Vacancies" required>
                  
                  <label>Location: </label>
                  <select name="location">
                  <?php foreach ($locations as $location) { ?>
                    <option value="<?php echo $location['zone_id']?>"><?php echo $location['zone_name']?></option>
                  <?php } ?>
                  </select>
         
                  <input type="submit" value="Save" class="radius alert button">
                
            </form>
          </div>
 
 
        </div>
 
    <!-- End Content -->
 
      </div>
    </div>
  </div>
  <div id="myModal" class="reveal-modal tiny" data-reveal> 
    <h2>Create new zone.</h2> 
    <form action="<?php echo site_url();?>/admin/create_zone" method="post"> 
      <input type="text" name="location" placeholder="Zone Name" required>
      <input type="submit" name="create" value="Create Zone" class="button">
    </form>
    <a class="close-reveal-modal">&#215;</a> 
  </div>