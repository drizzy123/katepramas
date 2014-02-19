   <?php $this->load->helper('app'); ?>
<div class="row">
	<div class="large-12 colums center">
		<div class="large-6 columns">
			<img src="<?php echo base_url().'res/img/kaimosilogo.png'?>">
		</div>
		<div class="large-6 columns radius panel">
			<h4>Edit Results</h4><hr>
			<form data-abide method="post" action="<?php echo site_url().'/results/update';?>">
				<label>Student</label>
				<input type="text" name="student" value="<?php echo get_studentname($results->student_admno); ?>" disabled>
				
				<label>Assessment Date;</label>
				<input type="text" id="datepicker" name="a_date" placeholder="Assessment Date" value="<?php echo $results->assessment_date;?>" required>
				<small class="error">Assessment date is required and must be date.</small>

				<label>Subject</label>
				<input type="text" value="<?php echo get_subjectname($results->subject);?>" disabled>
				<label>Marks Awarded;</label>
				<input type="number" name="marks" placeholder="Marks" value="<?php echo $results->marks; ?>" required>
				<small class="error">Marks is required and must be a number.</small>

				<input type="hidden" name="result_id" value="<?php echo $results->result_id;?>">

				<input type="submit" value="Update Results" class="radius button">
				<a href="<?php echo site_url().'/results/'?>" class="radius alert button">Cancel</a>
			</form>

			<div style="color: red;"><?php if(isset($response)) { echo $response; } ?></div>
		</div>
	</div>
</div>