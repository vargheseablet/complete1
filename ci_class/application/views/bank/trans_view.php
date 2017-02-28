<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mini Statement</title>
		<script type="text/javascript">
        	function Submit()
        	{  
         		if( document.trans_form.mob_no.value == "" )
	         	{
	            	alert( "Please enter your Mobile number!" );
		            document.trans_form.mob_no.focus() ;
		            return false;
	         	}
	         	return( true );
        	}
        </script>
	</head>
	<body>
		<div class="container">
			<h3>View Your Transaction details</h3>
			<br>
			<form name="trans_form" method="POST" action="<?php echo base_url()?>Bank/trans_slip" onsubmit = "return(Submit())">
				<label>Enter your Mobile Number</label>
				<br>
				<input type="text" name="mob_no" maxlength="10">
				<br>
				<input type="submit" value="View">
			</form>	
		</div>
	</body>
</html>