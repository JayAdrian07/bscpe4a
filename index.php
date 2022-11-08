<?php
session_start();

	include("connection.php");
	include("function.php");
	
	$user_data = check_login($con);
?>


<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Index Page</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
		rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
		crossorigin="anonymous">
		
		
</head>
<body style="background-color:#00307A;">

	
<center>
		<h1> Welcome in Mir4</h1>
		<br><br><br>
		<div class="Hello"
		</div>
		Hello, <?php echo $user_data['user_name'];?>
		
		<br><br><br><br><br><br><br><br>
		<a href="logout.php"> Click here to Logout </a>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
		crossorigin="anonymous"></script>
		<style>
		.Hello{
			font-family:"bold";
			font-size:40px;
			color: #fff;
			position:center;
			
		}
		</style>	
		
</center>		
</body>
</html>
