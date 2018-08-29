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
			<div class="page-header"> <h1>Add Medicine  <a href="view-medicine.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-medicine.php" method="post">
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
							  <textarea id="description" type="text" name="description" rows="3 "class="form-control" required> </textarea>
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

						$sql= "INSERT INTO medicine (medicine_name,company,description,medicine_price) 
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