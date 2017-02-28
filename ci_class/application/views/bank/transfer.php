<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Deposit</title>
		<script type="text/javascript">
        	function Submit()
        	{  
         		if( document.transfer_form.from_mob_no.value == "" )
	         	{
	            	alert( "Please enter your Mobile number!" );
		            document.transfer_form.from_mob_no.focus() ;
		            return false;
	         	}
	         	if( document.transfer_form.to_mob_no.value == "" )
	         	{
	            	alert( "Please enter your Mobile number!" );
		            document.transfer_form.to_mob_no.focus() ;
		            return false;
	         	}
	         	return( true );
        	}
        </script>
	</head>
	<body>
		<div class="container">
			<h3>Transfer your money!!</h3>
			<br>
			<form name="transfer_form" method="POST" action="<?php echo base_url()?>Bank/tr_auth" onsubmit = "return(Submit())">
				<label>Enter your Mobile Number</label>
				<br>
				<input type="text" name="from_mob_no" maxlength="10">
				<br>

				<label>Enter Mobile Number you want to transfer to</label>
				<br>
				<input type="text" name="to_mob_no" maxlength="10">
				<br>

				<label>Enter the amount to transfer</label>
				<br>
				<input type="number" name="amt">
				<br>
				<input type="submit" value="Transfer">
			</form>	
		</div>
	</body>
</html>