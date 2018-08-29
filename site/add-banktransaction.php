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
			<div class="page-header"> <h1>Add Bank Transaction  <a href="view-banktraction.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-banktransaction.php" method="post">
						<div class="form-group">
							<label for="bank_name"> Bank Name </label>
							<input  id="bank_name" type="text" name="bank_name" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="banktransaction_id"> Bank Transaction ID </label>
							<input  id="banktransaction_id" type="number" name="banktranaction_id">
						</div>
						<div class="form-group">
							 <label for="banktransaction_type">Bank Transaction Type</label>
							 <select class="form-control" id="banktransaction_type" name="banktransaction_type" value="selectDesignation">
							 		<option>Select  </option>
							        <option></option>
								    <option></option>
								    <option></option>
								    <option></option>
							 </select>
						</div>

						
						
						<div class="form-group">
							<label for="amount"> Amount </label>
							  <input id="amount" type="number" name="amount" class="form-control" required> 
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