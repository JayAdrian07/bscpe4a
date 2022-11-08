<?php

session_start();

	include("connection.php");
	include("function.php");
	
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
	
	  if (!empty($user_name) && !empty($password))
	  {
		$user_id = random_num(20);
		$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
	
		mysqli_query($con,$query);
		
		header("Location: login.php");
		die;
	  }
	  else
	  {
		  echo '<script>alert("Please Enter Username and Password!")</script>';
	  }
	}
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Sign Up Form</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
		rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
		crossorigin="anonymous">
		
		<style>
		.bd-placeholder-img {
		 font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
	<!-- Custom styles for this template -->
	<link href="signin.css" rel="stylesheet">
</head>
<body class="text-center" style="background-color:#DAF7A6 ;">
    
		<main class="form-signin">
		  <form method="post">
			<img class="mb-4" src="mir4.jpg" alt="" width="72" height="57">
			<h1 class="h3 mb-3 fw-normal">Please Register</h1>

			<div class="form-floating">
			  <input type="text" class="form-control" id="floatingInput" placeholder="User Name" name="user_name">
			  <label for="floatingInput">User Name</label>
			</div>
			<br>
			<div class="form-floating">
			  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
			  <label for="floatingPassword">Password</label>
			</div>
			
			<button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
			<br><br>
			<a href="login.php"> Click here to Login </a>
			<p class="mt-5 mb-3 text-bold">&copy; 2017–2022</p>
		  </form>
		</main>
		
		
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
		crossorigin="anonymous"></script>
</body>
</html>