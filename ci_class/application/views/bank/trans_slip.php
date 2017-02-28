<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mini Statement</title>
	</head>
	<body>
		<div class="container">
			<table style="width:100%">
				<tr>
					<th>Sr No.</th>
					<th>Sender Mobile Number</th>
					<th>Receiver Mobile Number</th> 
					<th>Transaction Amount</th>
					<th>Transaction Type</th>
				</tr>
				
				<?php $i = 1; ?>
				<?php foreach ($trs as $trs1):?>
				<tr>
					<td align="center"><?php echo $i++?></td>
					<td align="center"><?php echo $trs1['from_mob']?></td>
					<td align="center"><?php echo $trs1['to_mob']?></td>
					<td align="center"><?php echo $trs1['txn_amt']?></td>
					<td align="center"><?php echo $trs1['txn_type']?></td>					
				</tr>
				<?php endforeach;?>
			</table>
		</div>
	</body>
</html>