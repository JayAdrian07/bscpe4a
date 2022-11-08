<?php

	include("connection.php");
	
	$id = $_GET['id'];
	$query3 = "delete from members where id=$id" ;
	$query_run = mysqli_query($con,$query3);
	
	if($query_run)
		{
			header("Location: Index1.php");
		}
		else
		{
			echo '<script>alert("error")</script>';
		}
?>