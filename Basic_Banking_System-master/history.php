<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
	
	<style>
		body {
		  background-image: url('img/banking.jpg');
		  background-repeat: no-repeat;
		  background-attachment: fixed;
		  background-size: cover;
		}
		
	</style>
</head>

<body>
		<ul>
			<li><a href="index.php"><font color="white">Home</font></a></li>
			<li><a href="customers.php"><font color="white">Customers</font></a></li>
			<li><a href="about.html"><font color="white">About</font></a></li>
		</ul>
			<br><br><br><br><br><br>
			<div class="container">
					<h2 class="text-center pt-1">Transaction History</h2><br>
					
				   <div class="table-responsive-sm">
					<table class="table table-hover table-striped table-dark table-condensed table-bordered">
						<thead>
							<tr>
								<th class="text-center">Transaction ID</th>
								<th class="text-center">From</th>
								<th class="text-center">To</th>
								<th class="text-center">Amount Transferred</th>
								<th class="text-center">Date of Transaction</th>
							</tr>
						</thead>
						<tbody>
							<?php

								include 'config.php';

								$sql ="select * from transactions";

								$query =mysqli_query($conn, $sql);

								while($rows = mysqli_fetch_assoc($query))
								{
							?>
							
								<tr>
								<td class="py-2"><?php echo $rows['Transaction ID']; ?></td>
								<td class="py-2"><?php echo $rows['sender']; ?></td>
								<td class="py-2"><?php echo $rows['receiver']; ?></td>
								<td class="py-2"><?php echo $rows['balance']; ?> </td>
								<td class="py-2"><?php echo $rows['datetime']; ?> </td>
									
							<?php
								}

							?>
						</tbody>
					</table>

				</div>
			</div>
</body>
</html>