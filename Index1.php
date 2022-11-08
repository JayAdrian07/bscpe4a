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
		<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" href="">
		
		
</head>
<body style="background-color:#DAF7A6;">

<!-- ++++++++++++++++ EDIT MODAL ++++++++++++++++ -->
						<!-- The Modal -->
				<div class="modal fade" id="editmodal">
				  <div class="modal-dialog">
					<div class="modal-content">

					  <!-- Modal Header -->
					  <div class="modal-header">
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  </div>

					  <!-- Modal body -->
					  <div class="modal-body">
							<div class="container mt-3">
							<h2>Please Fill Up</h2>
							<form action="update.php" method = "post">
							<input type="hidden" name="update_id" id="update_id">
							<div class="mb-3 mt-3">
							<label>First Name:</label>
							<input type="text" class="form-control" id="Fname" placeholder="EnterFirst Name" name="Fname">
							</div>
							<div class="mb-3 mt-3">
							<label>Last Name:</label>
							<input type="text" class="form-control" id="Lname" placeholder="Enter Last Name" name="Lname">
							</div>
							<div class="mb-3 mt-3">
							<label>Email:</label>
							<input type="text" class="form-control" id="Email" placeholder="Enter email" name="Email">
							</div>
							<div class="mb-3 mt-3">
							<label>Contact #:</label>
							<input type="text" class="form-control" id="Contact" placeholder="Enter Contact #" name="Contact">
							</div>
							<button type="submit" class="btn btn-primary" name="insert">Update</button>
							</form>
							</div>
					  </div>

					  <!-- Modal footer -->
					  <div class="modal-footer">
						<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
					  </div>

					</div>
				  </div>
				</div>

<!-- ++++++++++++++++ EDIT MODAL END ++++++++++++++++ -->

<!-- ++++++++++++++++ ADD MODAL ++++++++++++++++ -->
				<!-- The Modal -->
				<div class="modal fade" id="myModal1">
				  <div class="modal-dialog">
					<div class="modal-content">

					  <!-- Modal Header -->
					  <div class="modal-header">
						<h4 class="modal-title">Add New Employee</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  </div>

					  <!-- Modal body -->
					  <div class="modal-body">
							<div class="container mt-3">
							<h2>Please Fill Up</h2>
							<form action="insert.php" method = "post">
							<div class="mb-3 mt-3">
							<label>First Name:</label>
							<input type="text" class="form-control" id="Fname" placeholder="EnterFirst Name" name="Fname">
							</div>
							<div class="mb-3 mt-3">
							<label>Last Name:</label>
							<input type="text" class="form-control" id="Lname" placeholder="Enter Last Name" name="Lname">
							</div>
							<div class="mb-3 mt-3">
							<label>Email:</label>
							<input type="text" class="form-control" id="Email" placeholder="Enter email" name="Email">
							</div>
							<div class="mb-3 mt-3">
							<label>Contact #:</label>
							<input type="text" class="form-control" id="Contact" placeholder="Enter Contact #" name="Contact">
							</div>
							<button type="submit" class="btn btn-primary" name="insert">Submit</button>
							</form>
							</div>
					  </div>

					  <!-- Modal footer -->
					  <div class="modal-footer">
						<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
					  </div>

					</div>
				  </div>
				</div>

<!-- ++++++++++++++++ ADD MODAL END ++++++++++++++++ -->

<div class="container mt-3">
  <h2>Employee Data</h2>
		<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal1">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
		<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
		<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
		</svg>
        Add New Employee 
        </button>        
  
  <!-- Start of the table-->
  <table class="table table-hover" id="datatableid">
    <thead>
      <tr>
		<th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
		<th>Contact Number</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
		<?php
		
			$query = "select * from members";
			$result = mysqli_query($con,$query);
			while ($row=mysqli_fetch_array($result))
			{
		?>
      <tr>
        <td><?php echo $row["id"];?></td>
        <td><?php echo $row["Fname"];?></td>
		<td><?php echo $row["Lname"];?></td>
        <td><?php echo $row["Email"];?></td>
		<td><?php echo $row["Contact"];?></td>
		<td> 
			<div class="btn-group">
				<button type="button" class="btn btn-primary editbtn">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
				</svg>
				</button>
				
				<a href="delete.php?id=<?php echo $row['id'];?>" type="button" class="btn btn-danger">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
				<path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"></path>
				</svg>
				</a>
			<?php
			}
			?>
			</div>	
		</td>
      </tr>
    </tbody>
  </table>
  <! -- End of the table-->
		<a href="Logout.php" type="button" class="btn btn-dark mt-3 float-end">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
		<path d="M7.5 1v7h1V1h-1z"></path>
		<path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"></path>
		</svg>
		Logout
		</a>
</div>
	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

		<script>
			$(document).ready(function () {
				
			$('#datatableid').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
			[10, 25, 50, -1],
			[10, 25, 50, "All"]
			],
			responsive: true,
			language: {
			search: "_INPUT_",
			searchPlaceholder: "Search Your Data",
			}
			});
			
			});
		</script>
<script>
	$(document).ready(function () {
	
	$('.editbtn').on('click', function (){
		
	$('#editmodal').modal('show');
	
	$tr = $(this).closest('tr');
	
	var data = $tr.children("td").map(function (){
	return $(this).text();
	}).get();
	
	console.log(data);
	
	$('#update_id').val(data[0]);
	$('#Fname').val(data[1]);
	$('#Lname').val(data[2]);
	$('#Email').val(data[3]);
	$('#Contact').val(data[4]);
	});
	});

</script>
</body>
</html>