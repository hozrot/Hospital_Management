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
			<div class="page-header"> <h1>Add Doctor  <a href="view-doctor.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-doctor.php" method="post">
						<div class="form-group">
							<label for="name"> Name </label>
							<input  id="name" type="text" name="name" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="photo"> Photo </label>
							<input  id="photo" type="file" name="photo" class="btn btn-success">
						</div>
						<div class="form-group">
							 <label for="designation">Designation</label>
							 <select class="form-control" id="designation" name="designation" value="select Designation">
							 		<option>Select from below  </option>
							        <option>Proffesor</option>
								    <option>Intern</option>
								    <option>Associate Proffesor</option>
								    <option>Lecturer</option>
							 </select>
						</div>

						<div class="form-group">
							<label for="depertment"> Depertment </label>
							<select class="form-control" id="depertment" name="depertment" value="Select Depertment ">
							         <option>Select from below  </option>
							        <option>Arthopedic</option>
								    <option>Gainocology</option>
								    <option>Eye </option>
								    <option>Skin</option>
							 </select>
						</div>
						<div class="form-group">
							<label for="category"> Category </label>
							<select class="form-control" id="category" name="category" value="Select category ">
							         <option>Select from below  </option>
							        <option>Sergon</option>
								    <option>Anesthitic</option>
								    <option>Assistant </option>
								    <option>other</option>
							 </select>
						</div>
						
						<div class="form-group">
							<label for="address"> Address </label>
							  <textarea id="address" type="text" name="address" class="form-control" rows="2" required> </textarea>
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
						
						
						<div class="form-group">
							 <label for = "gender">Gender</label>
							 <div>
								<label class = "radio-inline">
									  <input type = "radio" name = "gender" id = "male" value = "male"> Male
								</label>
									   
								<label class = "radio-inline">
									  <input type = "radio" name = "gender" id = "female" value = "female"> Female
								</label>
								
							 </div>
	 						 
						</div>
						<div class="form-group">
							<label for="phone"> Phone </label>
							<input  id="phone" value="+8801" type="text" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="visit_salary"> Visit Salary </label>
							<input  id="visit_salary" type="text" name="visit_salary" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="oncall_salary"> On-Call Salary </label>
							<input  id="oncall_salary" type="text" name="oncall_salary" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="operation_salary"> Operation Salary </label>
							<input  id="operation_salary" type="text" name="operation_salary" class="form-control" required>
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
										                gender,blood_group,address,photo,visit_salary,oncall_salary,operation_salary,category) 
								VALUES ( '$_POST[name]',
								         '$_POST[phone]',
										 '$_POST[designation]',
										 '$_POST[depertment]',
										
										 '$_POST[gender]',
										 '$_POST[blood_group]',
										 '$_POST[address]',
										 '$_POST[visit_salary]',
										 '$_POST[oncall_salary]',
										 '$_POST[operation_salary]',
										  '{$photo}',
										   '$_POST[category]'
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div> <!--/.col-lg-8-->
		
		

		<footer></footer>
	</body>

</html>