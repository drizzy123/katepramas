
	<!-- Footer -->
 
	  <footer class="row">
	  <div class="large-12 columns"><hr />
	      <div class="row">
	 
	        <div class="large-6 columns">
	            <p style="font-size: 10px;">Copyright &copy <?php echo date('Y');?>  Katepramas.</p>
	        </div>
	  
	      </div>
	  </div>
	  </footer>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	  <script>
	  $(function() {
	    $( "#datepicker" ).datepicker({
	    	minDate: -200, 
	    	maxDate: "+0M +0D",
	      	changeMonth: true,
	      	changeYear: true,
	    });
	    $( "#datepicker" ).datepicker("option", "dateFormat", "yy-mm-dd");
	  });
	  </script>
	<script src="<?php echo base_url().'res/js/jquerys.js';?>"></script>
    <script src="<?php echo base_url().'res/js/foundation.min.js';?>"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>