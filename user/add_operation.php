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
		 <?php include 'include/header.php';?>
        <div style="width:50px;height:60px;"></div>
        <?php include 'include/sidebar.php';?>
		 
		
		<div class="col-lg-8">
			<div class="page-header"> <h1>Add Patient</h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-patient.php" method="post">
						<div class="form-group">
							<label for="name"> Name </label>
							<input  id="name" type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="address"> Address </label>
							  <textarea id="address" type="text" name="address" class="form-control" required> </textarea>
						</div>
						<div class="form-group">
							<label for="phone"> Phone </label>
							<input  id="phone" value="+8801" type="text" name="phone" class="form-control" required>
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
								<label class = "radio-inline">
									  <input type = "radio" name = "sex" id = "other" value = "other"> Other
								</label>
							 </div>
	 						 
						</div>
						<div class="form-group">
							<label for="age"> Age </label>
							  <input  id="age" type="number" value="20" name="age" class="form-control" required>
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
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
						</div>
						 
						
					</form>
		 		</div>


				<?php 
					if (isset($_POST['submit'])) {

						$sql= "INSERT INTO patient (name,phone,age,address,
										                sex,blood_group) 
								VALUES ( '$_POST[name]',
								          '$_POST[phone]',
								         '$_POST[age]',
										 '$_POST[address]',
										 '$_POST[sex]',
										 '$_POST[blood_group]'
										
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div>
		
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="panel panel-warning">
						<div class="panel-heading"> <h4 class="modal-panel"> View Information 
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

						 </h4> </div>
						<div class="panel-body">
					 
							<div class="modal-body">
							 <form class="form-horizontal" enctype="multipart/form-data" action="add-patient.php" method="post">
									<input type="hidden" name="id" value="<?php echo "$rows[patient_id]";?> ">
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
							 <label for = "sex">Gender</label>
							 <div>
								<label class = "radio-inline">
									  <input type = "radio" name = "sex" id = "male" value = "male"> Male
								</label>
									   
								<label class = "radio-inline">
									  <input type = "radio" name = "sex" id = "female" value = "female"> Female
								</label>
								<label class = "radio-inline">
									  <input type = "radio" name = "sex" id = "other" value = "other"> Other
								</label>
							 </div>
	 						 
						</div>
						<div class="form-group">
							<label for="age"> Age </label>
							  <input  id="age" type="text" name="age" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="blood_group"> Blood group </label>
							  <input  id="blood_group" type="text" name="blood_group" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="modal_submit" type="submit" name="modal_submit" value="Update" class="btn btn-success">
						</div>
						 
						
					</form>

					<?php
					   
						if (isset($_POST['modal_submit'])) {
							$sql= "UPDATE patient
									SET name='$_POST[name]',
										phone='$_POST[phone]'
										age='$_POST[age]'
										address='$_POST[address]',
										sex= '$_POST[sex]',
										blood_group= '$_POST[blood_group]',
										
										
									WHERE patient_id ='" . $id ."';
								  "; 
							mysqli_query($con,$sql);
							if (mysqli_query($con, $sql)) {
							    echo "Record updated successfully";
								} else {
								    echo "Error updating record: " . mysqli_error($con);
}
						}

					?>   

							</div><!-- end modal-body -->
						
							<div class="modal-footer">
								<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> 
							</div><!-- end modal-footer -->
						</div><!-- end panel-body -->
					</div><!-- end panel -->
				</div><!-- end modal-content -->
			</div><!-- end modal-dialog -->
		</div><!-- end myModal -->

		<footer></footer>
	</body>

</html>