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
							<label for="room_no"> Room No </label>
							<input  id="room_no" type="text" name="room_no" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label for="price"> price </label>
							<input  id="price" type="text" name="price" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="description"> Description </label>
							  <input  id="description" type="text" name="description" class="form-control" required>
						</div>

						<div class="form-group">
							<label for="category"> Category </label>
							  <input  id="category" type="text" name="category" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="status"> Status </label>
							  <input  id="status" type="text" name="status" class="form-control" required>
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

				<div class="panel panel-danger panel-responsive">
						<div class="panel-heading"> <h4> List Of Rooms  </h4> </div>
						<div class="panel-body">
							<table class="table table-hover ">
								<thead>
									    <th>Name  </th>
									    <th>price</th>
										
										<th>description</th>
										<th>Status</th>  
										
								</thead>
								<?php 
									 $sql="SELECT * FROM room ";
									 $run_sql=  mysqli_query($con,$sql);

									  while ($rows= mysqli_fetch_array($run_sql)) { 
										echo'
												<tbody>
													<td>'.$rows['room_no'].' </td>
													<td>'.$rows['price'].'  </td>						 
													<td>'.$rows['description'].'  </td>
													<td>'.$rows['status'].'  </td>
													
												</tbody>
											';
									}
								?>
									 
								 
							</table>
						</div>
			    </div>
		</div>
		
		

		<footer></footer>
	</body>

</html>