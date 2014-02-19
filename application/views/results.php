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
            <li><a href="<?php echo site_url().'/admin/tutors';?>">Tutors</a></li>
            <li><a href="<?php echo site_url().'/posting/';?>">Postings</a></li>
            <li><a href="#">Results</a></li>
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
    <h4>Student TP Results</h4>
    <?php
      $this->load->helper('app');
      if ($level == 'tutor') { ?>
        <a href="<?php echo site_url().'/results/create_results/';?>" class="small radius button">Post Results</a><br>
        <!-- Content -->
        <table id="customers">
          <thead>
            <th>NO</th><th>Student Name</th><th>Total Marks</th><th>No of Subjects</th><th>Average Marks</th>
          </thead>
          <tbody>
          <?php $i = 1; foreach ($summarised_results as $summary) { ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo get_studentname($summary['student_admno'])?></td>
              <td><?php echo $marks = $summary['total_marks']?></td>
              <td><?php echo $subs = $summary['total_subjects']?></td>
              <td><?php echo number_format($marks/$subs,1);?></td>
              <td><a href="<?php echo site_url().'/results/report_form/'.$summary['student_admno']?>">Print</a></td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
          
    <?php  } else {
    ?>
    
        <table id="customers">
          <thead>
            <th>NO</th><th>Student Name</th><th>Assessment Date</th><th>Subject</th><th>Marks</th><th>Date Posted</th><th>Posted By</th>
          </thead>
          <tbody>
            <?php foreach ($results as $value) { ?>
              <tr>
                <td><?php echo $value['result_id']?></td>
                <td><?php echo $value['fname'] ." ". $value['lname']?></td>
                <td><?php echo $value['assessment_date']?></td>
                <td><?php echo $value['sub_name']?></td>
                <td><?php echo $value['marks']?></td>
                <td><?php echo $value['post_date']?></td>
                <td><?php echo get_tutorname($value['posted_by']) ?></td>
                <?php if ($level == 'tutor') { ?>
                  <td><a href="<?php echo site_url().'/results/edit_results/'.$value['result_id'];?>">Edit</a></td>
                
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
    <!-- End Content -->
 
      
    </div>
  </div>
  