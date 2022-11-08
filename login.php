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
			
		
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con,$query);
			
			if ($result)
			{
				if ($result && mysqli_num_rows($result) > 0 )
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if ($user_data['password'] === $password)
					{
						$_SESSION['user_id'] = $user_data ['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			echo '<script>alert("Wrong Username or Password")</script>';
		}	else {
				echo '<script>alert("Please Enter Username and Password!")</script>';
		}
	}	
	
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		
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

<body class="text-center" style="background-color:#13E3F2;" >


		<main class="form-signin">
		  <form method="post">
			<img class="mb-4" src="mir4.jpg" alt="" width="75" height="60">
			<h1 class="h3 mb-3 fw-normal">Please sign in</h1>

			<div class="form-floating">
			  <input type="text" class="form-control" id="floatingInput" placeholder="User Name" name="user_name">
			  <label for="floatingInput">User Name</label>
			</div>
			<br>
			<div class="form-floating">
			  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
			  <label for="floatingPassword">Password</label>
			</div>
			
			<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
			<br><br>
			<p class="mt-6 mb-3 text-bold">Don't have an account? <br> <a href="signup.php"> Click here to Register </a></p>
			<p class="mt-5 mb-3 text-bold">&copy; 2017–2022</p>
		  </form>
		</main>
		
		
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
		crossorigin="anonymous"></script>
		
</body>
</html>