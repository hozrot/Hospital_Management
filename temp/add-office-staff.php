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
			<div class="page-header"> <h1>Add Office Stuff  <a href="view-office-staff.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-office-staff.php" method="post">
						<div class="form-group">
							<label for="name"> Name </label>
							<input  id="name" type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="address"> address </label>
							  <input  id="address" type="text" name="address" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="phone"> phone </label>
							<input  id="phone" type="text" name="phone" class="form-control" required>
						</div>
						
						
						
						<div class="form-group">
							 <label for="designation">Designation</label>
							  <select class="form-control" id="designation" name="designation" value="select Designation">
							 		<option>Select from below  </option>
							        <option>Nurse</option>
								    <option>Sister</option>
								    <option>Clark</option>
								    <option>Accountant</option>
								    <option>Manager</option>
								    <option>Watchman</option>
								    <option>Cabin Boy</option>
							 </select>
						</div>
						<div class="form-group">
							<label for="image"> Photo </label>
							<input  id="image" type="file" name="image" class="btn btn-success">
							</div>
						<div class="form-group">
							 <label for = "sex">Gender</label>
							 <div>
								<label class = "radio-inline">
									  <input type = "radio" name = "sex" id = "male" value = "male"> Male
								</label>
									   
								<label class = "radio-inline">
									  <input type = "radio" name = "sex" id = "female" value = "female"> Female
								</label>
								
							 </div>
	 						 
						</div>
						
						<div class="form-group">
							<label for="blood_group"> Blood group </label>
							  
							  <select class="form-control" id="blood_group" name="blood_group">
							         <option>Select from below  </option>
							        <option>A+</option>
								    <option>B+</option>
								    <option>AB+ </option>
								    <option>O+</option>
								     <option>A-</option>
								    <option>B-</option>
								    <option>AB- </option>
								    <option>O-</option>
							 </select>
						</div>
						</div>
						
						
						
						
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
						</div>
						 
						
					</form>
		 		</div>


				<?php 
					if (isset($_POST['submit'])) {

						$image= $_FILES['image']['name'];
						$image_temp = $_FILES['image']['tmp_name'];
						move_uploaded_file($image_temp, "images/$image");

						$sql= "INSERT INTO office_staff (staff_name,address,phone,designation,image,
										                sex,blood_group) 
								VALUES ( '$_POST[name]',
								          '$_POST[address]',
								         '$_POST[phone]',
										 '$_POST[designation]',
										 '{$image}',
										 '$_POST[sex]',
										 '$_POST[blood_group]'
										
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
			    </div>
		</div>
		
		

		<footer></footer>
	</body>

</html>