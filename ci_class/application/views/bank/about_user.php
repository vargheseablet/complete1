<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Detail</title>
		<script type="text/javascript">
        	function Submit()
        	{  
         		if( document.about_form.mob_no.value == "" )
	         	{
	            	alert( "Please enter your Mobile number!" );
		            document.about_form.mob_no.focus() ;
		            return false;
	         	}
	         	return( true );
        	}
        </script>
	</head>
	<body>
		<div class="container">
			<h3>View your details</h3>
			<br>
			<form name="about_form" method="POST" action="<?php echo base_url()?>Bank/user_details" onsubmit = "return(Submit())">
				<label>Enter your Mobile Number</label>
				<br>
				<input type="text" name="mob_no" maxlength="10">
				<br>
				<input type="submit" value="View">
			</form>	
		</div>
	</body>
</html>