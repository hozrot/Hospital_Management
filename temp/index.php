<?php 
	session_start();
	include 'include/condb.php';

?>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<script src="includes/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		
	</head>

	<body>
		<?php include 'include/header.php';?>
		<div style="width:50px;height:60px;"></div>
		<?php include 'include/sidebar.php';?>
		
			
		 <!-- Panels  starts -->

			<div class="col-lg-9">
			<div style="width:50px;height:50px;"></div>
				<div class="col-md-3">

				<?php

					$sql= "SELECT * FROM doctor";
					$run_sql= mysqli_query($con,$sql);
					$total_doctor= mysqli_num_rows($run_sql); 
				?>
					<div class="panel panel-success">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="glyphicon glyphicon-pencil" style="font-size:4.5em"></i> </div>
								<div class="col-xs-9 text-right">
									<div style="font-size:2.5em"> <?php echo "$total_doctor";  ?> </div>
									<div > Doctors </div>
									
								</div>
							</div>
						</div>
						<a href="add-doctor.php">
						<div class="panel-footer">
							<div class="pull-left"> View Doctors</div>
							<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
							<div class="clearfix"></div>
						
						</div>
						
						</a>
					</div>
				</div>
				 <!-- Singel  Panels  Ends  -->
				<div class="col-md-3">
				<?php

					$sql= "SELECT * FROM operation";
					$run_sql= mysqli_query($con,$sql);
					$total_operation= mysqli_num_rows($run_sql); 
				?>
					<div class="panel panel-warning">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size:4.5em"></i> </div>
								<div class="col-xs-9 text-right">
									<div style="font-size:2.5em"> <?php echo "$total_operation";  ?> </div>
									<div > Nurse </div>
									
								</div>
							</div>
						</div>
						<a href="add-operation.php">
						<div class="panel-footer">
							<div class="pull-left"> View Operations </div>
							<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
							<div class="clearfix"></div>
						
						</div>
						
						</a>
					</div>
				</div>
				<!--  Singel  Panels  Ends  --> 
				<div class="col-md-3">

				<?php

					$sql= "SELECT * FROM office_staff";
					$run_sql= mysqli_query($con,$sql);
					$total_office_staff= mysqli_num_rows($run_sql); 
				?>

					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="glyphicon glyphicon-paperclip" style="font-size:4.5em"></i> </div>
								<div class="col-xs-9 text-right">
									<div style="font-size:2.5em"> <?php echo "$total_office_staff";  ?> </div>
									<div > Office Stuff </div>
									
								</div>
							</div>
						</div>
						<a href="add-office-staff.php">
						<div class="panel-footer">
							<div class="pull-left"> View Office Staff  </div>
							<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
							<div class="clearfix"></div>
						
						</div>
						
						</a>
					</div>
				</div>	
					<!--  Singel  Panels  Ends  -->
					<div class="col-md-3">
						<?php

							$sql= "SELECT * FROM room";
							$run_sql= mysqli_query($con,$sql);
							$total_room= mysqli_num_rows($run_sql); 
						?>
					<div class="panel panel-danger">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="glyphicon glyphicon-pushpin" style="font-size:4.5em"></i> </div>
								<div class="col-xs-9 text-right">
									<div style="font-size:2.5em"> <?php echo "$total_room";  ?> </div>
									<div > Room </div>
									
								</div>
							</div>
						</div>
						<a href="add-room.php">
						<div class="panel-footer">
							<div class="pull-left"> View Rooms  </div>
							<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
							<div class="clearfix"></div>
						
						</div>
						
						</a>
					</div>
				
				</div>
				<div class="clearfix"></div>
			<!--  Panels  Ends  -->
				
				 

				
				
		<!-- Profile  Panel Starts    -->
				
			
				
				<div class="clearfix"></div>
			<!--  Profile  Panel Ends   --> 
				
				
				
			
		
			 
			
		<footer></footer>
		
	</body>
	
</html>