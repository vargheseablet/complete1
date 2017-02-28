<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<script type="text/javascript">
        	function Submit()
        	{  
        		if( document.create_form.uname.value == "" )
	         	{
	            	alert( "Please enter your Username!" );
		            document.create_form.uname.focus() ;
		            return false;
	         	}
         		var emailID = document.create_form.email.value;
         		atpos = emailID.indexOf("@");
         		dotpos = emailID.lastIndexOf(".");
         
         		if (atpos < 1 || ( dotpos - atpos < 2 )) 
         		{
            		alert("Please enter correct Email ID")
            		document.create_form.email.focus() ;
            		return false;
         		}
         		if( document.create_form.mob_no.value == "" )
	         	{
	            	alert( "Please enter your Mobile number!" );
		            document.create_form.mob_no.focus() ;
		            return false;
	         	}
	         	if( document.create_form.psw.value == "" )
	         	{
	            	alert( "Please enter your Password!" );
		            document.create_form.psw.focus() ;
		            return false;
	         	}
	         	return( true );
        	}
        </script>

	</head> 	
	<body>
		<div class="container">
			<h3>Create your Network Banking Account</h3>

			<!-- Form Starts here -->

			<form name="create_form" method="POST" action="<?php echo base_url()?>Bank/insert_db" onsubmit="return(Submit())">		<!-- Form Description -->
				
				<label>Username</label>
				<br />
				<input type="text" name="uname">
				<br />

				<label>Email</label>
				<br />
				<input type="email" name="email">
				<br />

				<label>Mobile Number(Enter a mobile number that is linked to atleast one of the banks)</label>
				<br />
				<input type="text" name="mob_no" maxlength="10">
				<br />

				<label>Password</label>
				<br />
				<input type="password" name="psw">
				<br /><br />

				<input type="submit" value="Sign Up">
			</form>

			<!-- Form ends here -->
		</div>
	</body>
</html>