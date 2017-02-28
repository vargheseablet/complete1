<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Deposit</title>
		<script type="text/javascript">
        	function Submit()
        	{  
         		if( document.wdraw_form.mob_no.value == "" )
	         	{
	            	alert( "Please enter your Mobile number!" );
		            document.wdraw_form.mob_no.focus() ;
		            return false;
	         	}
	         	return( true );
        	}
        </script>
	</head>
	<body>
		<div class="container">
			<h3>Withdraw your money!!</h3>
			<br>
			<form name="wdraw_form" method="POST" action="<?php echo base_url()?>Bank/wdraw_auth" onsubmit = "return(Submit())">
				<label>Enter your Mobile Number</label>
				<br>
				<input type="text" name="mob_no" maxlength="10">
				<br>
				<label>Enter the amount to withdraw</label>
				<br>
				<input type="number" name="amt">
				<br>
				<input type="submit" value="Withdraw">
			</form>	
		</div>
	</body>
</html>