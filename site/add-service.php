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
			<div class="page-header"> <h1>Add Service  <a href="view-service.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-service.php" method="post">
						<div class="form-group">
							<label for="service_id"> Service ID </label>
							<input  id="service_id" type="text" name="service_id" class="form-control" required>
						</div>
						
						
						<div class="form-group">
							 <label for="service_name">Service Name</label>
							 <select class="form-control" id="service_name" name="service_name" value="Select Service">
							 		<option>Select from below  </option>
							        <option>Medicine</option>
								    <option>Food</option>
								    <option>Medical-test</option>
								    <option>CheckUp</option>
							 </select>
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

						$photo= $_FILES['photo']['name'];
						$image_temp = $_FILES['photo']['tmp_name'];
						move_uploaded_file($image_temp, "images/$photo");

						$sql= "INSERT INTO doctor (doctor_name,phone,designation,depertment,
										                gender,blood_group,address,photo) 
								VALUES ( '$_POST[name]',
								         
								         '$_POST[phone]',
										 
										 '$_POST[designation]',
										'$_POST[depertment]',

										 '$_POST[gender]',
										 '$_POST[blood_group]',
										  '$_POST[address]',
										 
										 
										 '{$photo}'
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div> <!--/.col-lg-8-->
		
		

		<footer></footer>
	</body>

</html>