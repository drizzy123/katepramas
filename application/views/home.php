  <?php
  if ($this->session->userdata('username')) {
    $username = $this->session->userdata('user_level');
    redirect($username.'/', 'refresh');
  } 
  ?>   

  <div class="row">
  	
    <div class="large-9 columns">
      <img src="<?php echo base_url().'res/img/kaimosi.jpg';?>"><br><br>
    </div>
    <div class="large-3 columns radius callout panel">
    	<h4>Login Here</h4>
    	<form method="post" data-abide action="<?php echo site_url().'/user/login';?>" >
    		<label>Username:</label>
    		<input type="number" name="username" id="username" placeholder="Adm No./Staff No" required>
    		<small class="error">Username must be a number.</small>

    		<label>Password:</label>
    		<input type="password" name="pass" id="pass" placeholder="Password" required>
    		<small class="error">Password is required.</small>

    		<input type="submit" value="Login" id="login" class="radius success button"><a href="<?php echo site_url().'/student/'?>">Register Here</a>
    	</form>
    	<div style="color: red;"><?php if(isset($error)) { echo $error; }?></div>
    </div>
  </div>

  <script type="text/javascript">
	  function login () {
	  	alert('cool');
	  }
  </script>
 
 
    