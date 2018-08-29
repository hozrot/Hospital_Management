<?php 
require_once 'include/condb.php';
?>

<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/DataTables/css/dataTables.bootstrap.css">

		<script src="js/jquery.js"></script>
		<script src="bootstrap/DataTables/js/jquery.dataTables.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>

		
		<script type="text/javascript" charset="utf8" src="bootstrap/DataTables/js/dataTables.bootstrap.js"></script>

			<script>
				$(document).ready( function () {
				    $('#mydata').DataTable();
				} );
		 
				</script>	
		 
	</head>
	<body>
		<?php include 'include/header.php';?>
		<div style="width:50px;height:60px;"></div>
		<?php include 'include/sidebar.php';?>
			<div class="col-lg-10"> 						
				 <ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#medicine">Medicine</a></li>
				  <li><a data-toggle="tab" href="#medical">Medical</a></li>
				  <li><a data-toggle="tab" href="#accomodation">Accomodation </a></li>
				   <li><a data-toggle="tab" href="#equipment">Equipment</a></li>
				  <li><a data-toggle="tab" href="#others">Other Expense </a></li>
				</ul>

				<div class="tab-content">
				  <div id="medicine" class="tab-pane fade in active">
				    <h3>Medicine</h3>
				    <div class="container-fluid">
						<form class="form-horizontal" enctype="multipart/form-data" action="add-room.php" method="post">
							<div class="form-group">
								<label for="medicine_name"> Medicine Name</label>
								<input  id="medicine_name" type="text" name="medicine_name" class="form-control" required>
							</div>
							
							
							<div class="form-group">
								<label for="description"> Description </label>
								  <textarea  id="description" type="text" name="description" class="form-control" required> </textarea>
							</div>

						<div class="form-group">
							 <label for="medicine_category">Category</label>
							 <select class="form-control" id="meddicine_category" name="medicine_category" value="Select Category">
							 		<option>Select from below  </option>
							        <option>Medicine</option>
								    <option>Food</option>
								    <option>Medical-test</option>
								    <option>CheckUp</option>
							 </select>
						</div>
							<div class="form-group">
								<label for="quantity"> Quantity </label>
								  <input  id="quantity" type="text" name="quantity" class="form-control" required>
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
				  </div>
				  <div id="medical" class="tab-pane fade">
				    <h3>Medical</h3>
					    <div class="container-fluid">
							<form class="form-horizontal" enctype="multipart/form-data" action="add-room.php" method="post">
								<div class="form-group">
									<label for="service_name"> Service Name  </label>
									<select id="service_name" name="service_name" class="form-control">
                                            <option value="Operation">Operation</option>
                                            <option value="checkup">checkup</option>
                                            <option value="test">test</option>
                                            
                                        </select>
								</div>
								
								<div class="form-group">
									<label for="price"> Price </label>
									<input  id="price" type="text" name="price" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="description"> Description </label>
									  <textarea  id="description" type="text" name="description" class="form-control" required> </textarea>
								</div>

								<div class="form-group">
									<label for="submit"> </label>
									<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
								</div>
								 
								
							</form>
			 			</div>
					 </div>

					 <div id="accomodation" class="tab-pane fade">
				    <h3>Accomodation</h3>
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
									  <textarea  id="description" type="text" name="description" class="form-control" required> </textarea>
								</div>

								<div class="form-group">
									 <label for="room_category">Category</label>
							 		<select class="form-control" id="room_category" name="room_category" value="Select Category">
							 		<option>Select from below  </option>
							        <option>Medicine</option>
								    <option>Food</option>
								    <option>Medical-test</option>
								    <option>CheckUp</option>
							 		</select>
								</div>
								<div class="form-group">
									<label for="status"> Status </label>
									  <input  id="status" type="text" name="status" class="form-control" required>
								</div>
								<div class="form-group">
							 		<label for="status">Staus</label>
							 		<select class="form-control" id="meddicine_category" name="medicine_category" value="Select Category">
							 		<option>Select from below  </option>
							        <option>Medicine</option>
								    <option>Food</option>
								    <option>Medical-test</option>
								    <option>CheckUp</option>
							 		</select>
								</div>
								
								<div class="form-group">
									<label for="submit"> </label>
									<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
								</div>
								 
								
							</form>
			 			</div>
					 </div>

					 <div id="equipment" class="tab-pane fade">
				    <h3>Equipment</h3>
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
					 </div>

					 <div id="others" class="tab-pane fade">
				    <h3>others</h3>
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
					 </div>

					 <div id="food" class="tab-pane fade">
				    <h3>Medical</h3>
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
					 </div>
				</div> 


			</div>	


								

		

		<footer></footer>
	</body>

</html>