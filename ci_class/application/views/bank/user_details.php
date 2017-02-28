<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Details</title>
</head>
<body>
	<?php foreach($u_d1 as $detail):?>
	<p><?php echo "Username: ".$detail['user_name']?></p>
	<p><?php echo "Mobile Number: ".$detail['mob_no']?></p>
	<p><?php echo "Email: ".$detail['email']?></p>
	<p><?php echo "Password: ".$detail['password']?></p>
	<?php endforeach;?>
	<?php foreach($u_d2 as $bal):?>
	<p><?php echo "States Bank Balance: Rs ".$bal['balance']?></p>
	<?php endforeach;?>
</body>
</html>