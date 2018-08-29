<?php 
include '../include/permission.php';
?>

<html>
	<head>
		<title>Add Test</title>
		 <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
        <script src="../include/js/jquery.js"></script>
        <script src="../include/bootstrap/js/bootstrap.js"></script>
		
	</head>
	<body>
		 <?php include 'include/header.php';?>
        <div style="width:50px;height:60px;"></div>
        <?php include 'include/sidebar.php';?>
		
		<div class="col-lg-8">
			<div class="page-header"> <h1>Add Test  <a href="view-test.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-test.php" method="post">
						
						<div class="form-group">
							 <label for="test_name">Test Name</label>
							 <input  id="test_name"  type="text" name="test_name" class="form-control" required>
						</div>

						
						
						<div class="form-group">
							<label for="description"> Description </label>
							  <textarea id="description" type="text" name="description" class="form-control" rows="2" required> </textarea>
						</div>
					
						
						
						
						<div class="form-group">
							<label for="test_price"> Price </label>
							<input  id="test_price"  type="text" name="test_price" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success">
						</div>
						 
						
					</form>
		 		</div> <!--/.container-fluid-->


				<?php 
					if (isset($_POST['submit'])) {

						

						$sql= "INSERT INTO test (test_name,test_price,description) 
								VALUES ( '$_POST[test_name]',
								          '$_POST[test_price]',
								         '$_POST[description]'
										)";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div> <!--/.col-lg-8-->
		
		

		<footer></footer>
	</body>

</html>