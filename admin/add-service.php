<?php 
include '../include/permission.php';
?>

<html>
	<head>
		<title>Admin Panel</title>
		 <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
        <script src="../include/js/jquery.js"></script>
        <script src="../include/bootstrap/js/bootstrap.js"></script>
		
	</head>
	<body>
		 <?php include '../include/header.php';?>
        <div style="width:50px;height:60px;"></div>
        <?php include '../include/sidebar.php';?>
		 
		
		<div class="col-lg-8">
			<div class="page-header"> <h1>Add Service  <a href="view-service.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-service.php" method="post">
						
						<div class="form-group">
							 <label for="service_name">Service Name</label>
							 <input  id="service_name"  type="text" name="service_name" class="form-control" required>
						</div>

						
						
						<div class="form-group">
							<label for="description"> Description </label>
							  <textarea id="description" type="text" name="description" class="form-control" rows="2" required> </textarea>
						</div>
					
						
						
						
						<div class="form-group">
							<label for="service_cost"> Cost </label>
							<input  id="service_cost"  type="text" name="service_cost" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success">
						</div>
						 
						
					</form>
		 		</div> <!--/.container-fluid-->


				<?php 
					if (isset($_POST['submit'])) {

						

						$sql= "INSERT INTO service (service_name,description,service_cost) 
								VALUES ( '$_POST[service_name]',
								         
								         '$_POST[description]',
										 
										 '$_POST[service_cost]'
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div> <!--/.col-lg-8-->
		
		

		<footer></footer>
	</body>

</html>