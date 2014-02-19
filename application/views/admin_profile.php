<?php
if ($this->session->userdata('username')) {
  $username = $this->session->userdata('username');
  
} else {
  redirect('/app/', 'refresh');
}
?>

<div class="row">
	<div class="large-12 colums center">
		<div class="large-6 columns">
			<img src="<?php echo base_url().'res/img/kaimosilogo.png'?>">
		</div>
		<div class="large-6 columns">
			<h4>Edit Profile</h4>
			<?php //print_r($details); ?>
			<form data-abide method="post" action="<?php echo site_url().'/student/update_profile';?>">
				<label>Admission No;</label>
				<input type="number" name="admno" placeholder="Admission No" required value="<?php echo $username; ?>">
				<small class="error">Admission no is required and must be integer.</small>

				<label>First Name;</label>
				<input type="text" name="fname" placeholder="First Name" value="<?php if(empty($details)) { echo  ''; } else { echo  $details->fname; }?>" required>
				<small class="error">First Name is required and must be text only.</small>

				<label>Last Name;</label>
				<input type="text" name="lname" placeholder="Last Name" value="<?php if(empty($details)) { echo  ''; } else { echo  $details->lname; }?>" required>
				<small class="error">First Name is required and must be text only.</small>

				<label>Phone Number;</label>
				<input type="number" name="phone" placeholder="Phone Number" value="<?php if(empty($details)) { echo  ''; } else { echo  $details->phone; }?>" required>
				<small class="error">Phone number is required and must be numbers only.</small>

				<label>Confirm;</label>
				<select name="gender">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>

				<input type="submit" value="Update Profile" class="radius button">
				<a href="<?php echo site_url().'/student/postings'?>" class="radius alert button">Exit</a>
			</form>

			<div style="color: red;"><?php if(isset($response)) { echo $response; } ?></div>
		</div>
	</div>
</div>