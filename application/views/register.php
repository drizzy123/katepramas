<div class="row">
	<div class="large-12 colums center">
		<div class="large-6 columns">
			<img src="<?php echo base_url().'res/img/kaimosilogo.png'?>">
		</div>
		<div class="large-6 columns radius panel">
			<h4>Student Self Registration Portal</h4>
			<form data-abide method="post" action="<?php echo site_url().'/student/register';?>">
				<label>Admission No;</label>
				<input type="number" name="admno" placeholder="Admission No" required>
				<small class="error">Admission no is required and must be integer.</small>

				<label>Password;</label>
				<input type="password" name="pass" placeholder="Password" required>
				<small class="error">A pasword is required and must contain atleast one capital letter, a number and a wild characters e.g P@ssword2.</small>

				<label>Confirm;</label>
				<input type="password" name="pass1" placeholder="Repeat Password" required>
				<small class="error">Password confirmation is required.</small>

				<input type="submit" value="Create Account" class="radius button">
				<a href="<?php echo site_url().'/app'?>" class="radius alert button">Cancel</a>
			</form>

			<div style="color: red;"><?php if(isset($response)) { echo $response; } ?></div>
		</div>
	</div>
</div>