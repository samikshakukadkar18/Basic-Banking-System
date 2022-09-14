<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/navigation.css">

    <style>
	    button{
			transition: 1.5s;
		  }
		  
		button:hover{
			background-color:green;
			color: white;
		  }
	  
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
			<li><a href="history.php"><font color="white">Transaction History</font></a></li>
			<li><a href="about.html"><font color="white">About</font></a></li>
		  </ul>

		<?php
			include 'config.php';
			$sql = "SELECT * FROM users";
			$result = mysqli_query($conn,$sql);
		?>

		<div class="container">
				<br><br><br>
				<h2 class="text-center pt-4">Customers</h2>
				<br><br>
				
					<div class="row">
						<div class="col">
							<div class="table-responsive-sm">
							<table class="table table-hover table-sm table-condensed table-striped table-dark table-bordered">
								<thead>
									<tr>
									<th class="text-center py-3" color="white">A/C Number</th>
									<th class="text-center py-3">Name</th>
									<th class="text-center py-3">Email</th>
									<th class="text-center py-3">Branch</th>
									<th class="text-center py-3">Balance</th>
									<th class="text-center py-3">Action</th>
									</tr>
								</thead>
								<tbody>
						<?php 
							while($rows=mysqli_fetch_assoc($result)){
						?>
							<tr>
								<td class="py-3"><?php echo $rows['id'] ?></td>
								<td class="py-3"><?php echo $rows['name']?></td>
								<td class="py-3"><?php echo $rows['email']?></td>
								<td class="py-3"><?php echo $rows['branch'] ?></td>
								<td class="py-3"><?php echo $rows['balance']?></td>
								<td><a href="transfer.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn">Send Money</button></a></td> 
							</tr>
							
						<?php
							}
						?>
					
								</tbody>
							</table>
							</div>
						</div>
					</div> 
		</div>
</body>
</html>