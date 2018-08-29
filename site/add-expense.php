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
			<div class="page-header"> <h1>Add Expense  <a href="view-expense.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-expense.php" method="post">
						<div class="form-group">
							<label for="expense_for"> Expense For </label>
							<input  id="expense_for" type="text" name="expense_for" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="expense_id"> Expense Id </label>
							<input  id="expense_id" type="text" name="expense_id" class="form-control" required>
						</div>
						<div class="form-group">
							 <label for="expense_category">Category</label>
							 <select class="form-control" id="expense_category" name="expense_category" value="Select Category">
							 		<option> </option>
							        <option>Proffesor</option>
								    <option>Intern</option>
								    <option>Associate Proffesor</option>
								    <option>Lecturer</option>
							 </select>
						</div>

						<div class="form-group">
							<label for="expense_reason"> Expense Reason </label>
							<select class="form-control" id="expense_reason" name="expense_reason" value="Select">
							         <option> </option>
							        <option>Arthopedic</option>
								    <option>Gainocology</option>
								    <option>Eye </option>
								    <option>Skin</option>
							 </select>
						</div>
						
						<div class="form-group">
							<label for="amount"> Amount </label>
							  <input id="amount" type="text" name="amount" class="form-control"  required> 
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