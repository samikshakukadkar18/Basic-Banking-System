<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn,$sql);
    $sqlfrom = mysqli_fetch_array($query); 

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn,$sql);
    $sqlto = mysqli_fetch_array($query);
	
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Kindly Enter an amount greater than zero.")';
        echo '</script>';
    }

    else if($amount > $sqlfrom['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance!")'; 
        echo '</script>';
    }
    
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Kindly Enter an amount greater than zero.')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sqlfrom['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             
                $newbalance = $sqlto['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sqlfrom['name'];
                $receiver = $sqlto['name'];
                $sql = "INSERT INTO transactions(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successfully Completed');
                                     window.location='customers.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/navigation.css">

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#066079;
			transform: scale(1.1);
			color:white;
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
			<li><a href="customers.php"><font color="white">Customers</font></a></li>
			<li><a href="history.php"><font color="white">History</font></a></li> 
			<li><a href="about.html"><font color="white">About</font></a></li>
		  </ul>
		  <br><br><br>

			<div class="container">
				<h2 class="text-center pt-5">Transfer Money</h2>
					<?php
						include 'config.php';
						$sid=$_GET['id'];
						$sql = "SELECT * FROM  users where id=$sid";
						$result=mysqli_query($conn,$sql);
						if(!$result)
						{
							echo "Error : ".$sql."<br>".mysqli_error($conn);
						}
						$rows=mysqli_fetch_assoc($result);
					?>
					
				<form method="post" name="tcredit" class="tabletext" ><br>
					<div>
						<table class="table table-striped table-condensed table-bordered">
							<tr>
								<th class="text-center">ID</th>
								<th class="text-center">Name</th>
								<th class="text-center">Branch</th>
								<th class="text-center">Balance</th>
							</tr>
							<tr>
								<td class="py-2"><?php echo $rows['id'] ?></td>
								<td class="py-2"><?php echo $rows['name'] ?></td>
								<td class="py-2"><?php echo $rows['branch'] ?></td>
								<td class="py-2"><?php echo $rows['balance'] ?></td>
							</tr>
						</table>
					</div>
					<br><br><br>
					
					
					<label>Transfer To:</label>
					<select name="to" class="form-control" required>
						<option value="" disabled selected>Please Select an Account</option>
							<?php
								include 'config.php';
								$sid=$_GET['id'];
								$sql = "SELECT * FROM users where id!=$sid";
								$result=mysqli_query($conn,$sql);
								if(!$result)
								{
									echo "Error ".$sql."<br>".mysqli_error($conn);
								}
								while($rows = mysqli_fetch_assoc($result)) {
							?>
								<option class="table" value="<?php echo $rows['id'];?>" >
								
									<?php echo $rows['name'] ;?>
						   
								</option>
							<?php 
							
								} 
								
							?>
						<div>
					</select>
					<br><br>
					<label>Enter Amount To Transfer:</label>
						
					<input type="number" class="form-control" name="amount" required>   
					<br><br>
					<div class="text-center" >
						<button class="btn" name="submit" type="submit" id="btn1">Transfer</button>
					</div>
				</form>
			</div>
</body>
</html>