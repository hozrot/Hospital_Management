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
		<?php include '../include/header.php';?>
		<div style="width:50px;height:60px;"></div>
		<?php include '../include/sidebar.php';?>
		
			
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
						<a href="view-doctor.php">
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

					$sql= "SELECT * FROM medicine";
					$run_sql= mysqli_query($con,$sql);
					$total_medicine= mysqli_num_rows($run_sql); 
				?>
					<div class="panel panel-warning">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size:4.5em"></i> </div>
								<div class="col-xs-9 text-right">
									<div style="font-size:2.5em"> <?php echo "$total_medicine";  ?> </div>
									<div > Medicine </div>
									
								</div>
							</div>
						</div>
						<a href="add-medicine.php">
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
				
	
      
        
          <div class="panel panel-info">
            <div class="panel-heading">
            	<div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           		<A href="edit.html" >Edit Profile</A>

        		<A href="edit.html" >Logout</A>
       			<br>

      		</div>
              <h3 class="panel-title">Sadman Hospital</h3>
            </div>
            
            <div class="panel-body" align="center">
              <div class="row">
                
                
                
                <div class=" table table-responsive "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Account No:</td>
                        <td>123</td>
                      </tr>
                      <tr>
                        <td>AAA:</td>
                        <td>AAAAAA</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>01/24/1988</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>CCC</td>
                        <td>VVVVV</td>
                      </tr>
                        <tr>
                        <td> Address</td>
                        <td>Address of</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="info@support.com">info@support.com</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>05215567(Landline)<br><br>015-4567-890(Mobile)
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
                 	
            
          </div>
        
     
				
				<div class="clearfix"></div>
			<!--  Profile  Panel Ends   --> 
				
				
				
			
		
			 
			
		<footer></footer>
		
	</body>
	
</html>