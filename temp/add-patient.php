<?php 
require_once 'include/condb.php';
?>

<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<script src="js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>

	<script src="bootstrap/js/bootstrap-datepicker.js"></script>
	<script>
		$(function(){
			$('.datepicker').datepicker();
		});

	</script>
		
		 
		 
	</head>

	<body>
		<?php include 'include/header.php';?>
		<div style="width:50px;height:60px;"></div>
		<?php include 'include/sidebar.php';?>
		 
		
		<div class="col-lg-8">
			<div class="page-header"> <h1>Patient Addmission <a href="view-patient.php" class="btn btn-info">View </a></h1>  </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-patient.php" method="post">
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
							 <label for = "gender">Gender</label>
							 <div>
								<label class = "radio-inline">
									  <input type = "radio" name = "gender" id = "male" value = "male"> Male
								</label>
									   
								<label class = "radio-inline">
									  <input type = "radio" name = "gender" id = "female" value = "female"> Female
								</label>
								<label class = "radio-inline">
									  <input type = "radio" name = "gender" id = "other" value = "other"> Other
								</label>
							 </div>
	 						 
						</div>
						<div class="form-group">
							<label for="age"> Age </label>
							  <input  id="age" type="text" name="age" class="form-control" required>
						</div>
						<div class="form-group">
						<label for="admission_date"> Date Of Admission </label>
						<div class='input-group date' id='datetimepicker1'>
							<input type="text" name="admission_date" id="date" class="datepicker form-control">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>



						<div class="form-group">
							<label for="room_no"> Room no </label>
							  <input  id="room_no" type="text" name="room_no" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="occupation"> Occupation </label>
							  <input  id="occupation" type="text" name="occupation" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="refference"> Refference </label>
							  <input  id="refference" type="text" name="refference" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="patient_type"> Patient Type  </label>
							  <input  id="patient_type" type="text" name="patient_type" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="status"> Patient Status </label>
							  <input  id="status" type="text" name="status" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="blood_group"> Blood group </label>
							  <input  id="blood_group" type="text" name="blood_group" class="form-control" required>
						</div>
	
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">

						</div>

						 
						
					</form>
		 		</div>


				<?php 
					if (isset($_POST['submit'])) {

						$sql= "INSERT INTO patient (patient_name,phone,age,admission_date,room_no,occupation,refference,patient_type,address,
										                gender,status,blood_group) 
								VALUES ( '$_POST[name]',
								         '$_POST[phone]',
								         '$_POST[age]',
								         '$_POST[admission_date]',
								         '$_POST[room_no]',
								         '$_POST[occupation]',
								         '$_POST[refference]',
								         '$_POST[patient_type]',
										 '$_POST[address]',
										 '$_POST[gender]',
										 '$_POST[status]',
										 '$_POST[blood_group]'
										
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div>
		
		

		<footer></footer>
	</body>

</html>