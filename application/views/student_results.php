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
              <a href="#">
                Home
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>
 
        <section class="top-bar-section">
          <ul class="right">
            <li><a href="<?php echo site_url().'/student/postings/';?>">Postings</a></li>
            <li><a href="#">Results</a></li>
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
    <h4>Student TP Results</h4>
    <?php
      $this->load->helper('app');
      if ($level == 'tutor') { ?>
        <a href="<?php echo site_url().'/results/create_results/';?>">Post Results</a>
    <?php  }
    ?>
    <!-- Content -->
    <div align="right">
      <a href="<?php echo site_url().'/results/report_form/'.$username?>">Print Report</a>
    </div>
        <table id="customers">
          <thead>
            <th>NO</th><th>Student Name</th><th>Assessment Date</th><th>Suject</th><th>Marks</th><th>Date Posted</th>
          </thead>
          <tbody>
            <?php if (empty($results)) {
              echo "Your results have not been posted yet";
            } else {
            $total = 0; $count = 0; foreach ($results as $value) { 
              $total += $value['marks'];
              $count += count($value['result_id']);?>
              <tr>
                <td><?php echo $value['result_id']?></td>
                <td><?php echo $value['fname'] ." ". $value['lname']?></td>
                <td><?php echo $value['assessment_date']?></td>
                <td><?php echo $value['sub_name']?></td>
                <td><?php echo $value['marks']?></td>
                <td><?php echo $value['post_date']?></td>
             
              </tr>
            <?php } ?>
              <tfoot>
                <tr>  
                  <td>Total Marks</td>
                  <td><?php //echo $total;?></td>
                  <td></td>
                  <td></td>
                  <td><?php echo $total; ?></td>
                </tr>
                <tr>
                  <td>Average</td>
                  <td><?php //echo $total;?></td>
                  <td></td>
                  <td></td>
                  <td><?php $av = $total/$count; echo number_format($av, 2) ; ?></td>
                </tr>
              </tfoot>
              <?php } ?>
          </tbody>
        </table>
    <!-- End Content -->
 
      
    </div>
  </div>
  