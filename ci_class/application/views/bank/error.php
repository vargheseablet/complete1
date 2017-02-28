<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">


		<script type="text/javascript">
        	function Submit()
        	{  
         		if( document.myForm.mob_no.value == "" )
	         	{
	            	alert( "Please enter your Mobile number!" );
		            document.myForm.mob_no.focus() ;
		            return false;
	         	}
	         	if( document.myForm.psw.value == "" )
	         	{
	            	alert( "Please enter your password!" );
		            document.myForm.psw.focus() ;
		            return false;
	         	}
	         	return( true );
        	}
        </script>
	</head>
	<body>
	<script language="JavaScript">
    alert("Incorrect Mobile number or Password. Please login again!!");
    </script>
		<div class="container">
			<form name="myForm" action="<?php echo base_url()?>Bank/authenticate" method="POST" onsubmit="return(Submit());">
				<label>Mobile Number</label>
				<br />
				<input name="mob_no" type="text" placeholder="Your Mobile number" maxlength="10" />
				<br />			
				<label>Password</label>
				<br />
				<input name="psw" type="password" placeholder="Your Password" id="" />
				<br /><br />
				<input type="submit" value="Login" id=""/>
			</form>
		</div>
	</body>
</html>