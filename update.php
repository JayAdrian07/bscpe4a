<?php

	include("connection.php");
	if(isset($_POST['insert']))
	{
		$id = $_POST['update_id'];
		$Fname = $_POST['Fname'];
		$Lname = $_POST['Lname'];
		$Email = $_POST['Email'];
		$Contact = $_POST['Contact'];
		
		$query1 = "update members set Fname='$Fname',Lname='$Lname',Email='$Email',Contact='$Contact' where id='$id'";
		$query_run = mysqli_query($con,$query1);
		
		if($query_run)
		{
			header("Location: index1.php");
		}
		else
		{
			echo '<script>alert("error")</script>';
		}
	}
?>