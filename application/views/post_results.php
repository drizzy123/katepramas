<div class="row">
	<div class="large-12 colums center">
		<div class="large-6 columns">
			<img src="<?php echo base_url().'res/img/kaimosilogo.png'?>">
		</div>
		<div class="large-6 columns radius panel">
			<h4>Post New Results</h4><hr>
			<form data-abide method="post" action="<?php echo site_url().'/results/create';?>">
				<label>Student</label>
				<select name="student">
					<?php foreach ($students as $std) { ?>
						<option value="<?php echo $std['adm_no']?>"><?php echo $std['adm_no'].": ".$std['fname']." ".$std['lname']?></option>
					<?php } ?>
				</select>
				
				<label>Assessment Date;</label>
				<input type="text" id="datepicker" name="a_date" placeholder="Assessment Date" required>
				<small class="error">Assessment date is required and must be date.</small>

				<label>Subject</label>
				<select name="subject">
					<?php foreach ($subjects as $subject) { ?>
						<option value="<?php echo $subject['sub_id']?>"><?php echo $subject['sub_name']?></option>
					<?php } ?>
				</select>

				<label>Marks Awarded;</label>
				<input type="number" name="marks" placeholder="Marks" maxlength="2" required>
				<small class="error">Marks is required and must be a number.</small>

				<input type="submit" value="Post Results" class="radius button">
				<a href="<?php echo site_url().'/results/'?>" class="radius alert button">Cancel</a>
			</form>

			<div style="color: red;"><?php if(isset($response)) { echo $response; } ?></div>
		</div>
	</div>
</div>