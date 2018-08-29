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
			<div class="page-header"> <h1>Add Room  <a href="view-room.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-room.php" method="post">
						<div class="form-group">
							<label for="room_no"> Room no.  </label>
							<input  id="room_no" type="text" name="room_no" class="form-control" required>
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
							  <select name="category" id="category"  class="form-control" required>
								
								<option>Ac Room</option>
								<option>Normal</option>
								<option>Single</option>
								<option>Double</option>
								<option>Vip</option>

							   </select>
						</div>
						<div class="form-group">
							<label for="room_satus"> Status </label>
							  <select name="status" id="room_status" class="form-control" required>
								
								<option>Available</option>
								<option>Booked</option>
								
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