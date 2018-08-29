<?php 
require_once 'include/condb.php';
?>

<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<script src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		
		 

		

		 
	</head>
	<body>
		<?php include 'include/header.php';?>
		<div style="width:50px;height:60px;"></div>
		<?php include 'include/sidebar.php';?>
		 
		
		<div class="col-lg-8">
			<div class="page-header"> <h1>Addmission Details</h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-patient.php" method="post">
						<div class="form-group row">
							  <label for="name" class="">Name </label>
							<div class="col-10">
							    <input class="form-control" type="text" id="text">
							</div>
						</div>
							<div class="form-group row">
							  <label for="example-search-input" class="col-2 col-form-label">Age </label>
							  <div class="col-10">
							    <input class="form-control" type="search" id="example-search-input">
							  </div>
							</div>
							<div class="form-group row">
							  <label for="example-email-input" class="col-2 col-form-label">Blood Group</label>
							  <div class="col-10">
							    <input class="form-control" type="email"  id="example-email-input">
							  </div>
							</div>
							
							<div class="form-group row">
							  <label for="example-datetime-local-input" class="col-2 col-form-label">Adress</label>
							  <div class="col-10">
							  </div>
							</div>
							
							
						 
						
					</form>
		 		</div>



				<div class="panel panel-danger panel-responsive">
						<div class="panel-heading"> <h4> List Of Patient  </h4> </div>
						<div class="panel-body">
							<table class="table table-sm table-inverse">
								  <thead>
								    <tr>
								      <th>#</th>
								      <th>First Name</th>
								      <th>Last Name</th>
								      <th>Username</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row">1</th>
								      <td>Mark</td>
								      <td>Otto</td>
								      <td>@mdo</td>
								    </tr>
								    <tr>
								      <th scope="row">2</th>
								      <td>Jacob</td>
								      <td>Thornton</td>
								      <td>@fat</td>
								    </tr>
								    <tr>
								      <th scope="row">3</th>
								      <td colspan="2">Larry the Bird</td>
								      <td>@twitter</td>
								    </tr>
								  </tbody>
							</table>
						</div>
			    </div>
		</div>
		
		

		<footer></footer>
	</body>

</html>