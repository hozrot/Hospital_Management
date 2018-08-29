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
			<div class="page-header"> <h1>Add Despensary  <a href="view-despensary.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-despensary.php" method="post">
						<div class="form-group">
							<label for="name"> Name </label>
							<input  id="name" type="text" name="name" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="company"> Company </label>
							<input  id="company" type="text" name="company" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="description"> Description </label>
							  <input  id="description" type="text" name="description" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="price"> Price </label>
							  <input  id="price" type="text" name="price" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
						</div>
						 
						
					</form>
		 		</div>


				<?php 
					if (isset($_POST['submit'])) {

						$sql= "INSERT INTO medicine (name,company,description,price) 
								VALUES ( '$_POST[name]',
								          '$_POST[company]',
										 '$_POST[description]',
										 '$_POST[price]'
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div>
		
		

		<footer></footer>
	</body>

</html>