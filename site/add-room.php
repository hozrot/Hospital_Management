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
			<div class="page-header"> <h1>Add Room  <a href="view-room.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-room.php" method="post">
						<div class="form-group">
							<label for="room_no"> Room no </label>
							  <select id="room_no"  class="form-control" required>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>

							   </select>
						</div>
						
						<div class="form-group">
							<label for="price"> Price </label>
							<input  id="price" type="text" name="price" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="description"> Description </label>
							  <textarea  id="description" type="text" name="description" rows="3" class="form-control" required> </textarea>
						</div>

						<div class="form-group">
							<label for="category"> Category </label>
							  <select id="category"  class="form-control" required>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>

							   </select>
						</div>
						<div class="form-group">
							<label for="room_satus"> Status </label>
							  <select id="room_status"  class="form-control" required>
								<option></option>
								<option>on</option>
								<option>off</option>
								
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

						$sql= "INSERT INTO room (room_no,category,description,price,status) 
								VALUES ( '$_POST[room_no]',
								          
								         '$_POST[category]',
										 '$_POST[description]',
										 '$_POST[price]',
										 '$_POST[status]'
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div>
		
		

		<footer></footer>
	</body>

</html>