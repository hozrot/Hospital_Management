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
						<div class="page-header"> 
							<section class="content-header">
						    <div class="btn-group pull-right">
								        
								<a href="#" class="btn btn-default btn-md"><span class="fa fa-asterisk"></span> Setting</a>
							</div>
						      <ol class="breadcrumb ">

						        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						        <li class="active"> InPatient </li>
						        <li class="active"><a href="add-patient.php"><i class="fa fa-wheelchair"></i>Create Patient</a></li>

						      </ol>  
								      
				    		</section> 

				    	</div> 	<!-- start and endof page title header-->
				    </div>
					<div class="col-lg-10"> 						
						<div class="content-wrapper">
							<section class="content">  						
						      <div class="row">          				  
						        <div class="col-xs-12">    				
						          <div class="panel panel-danger panel-responsive"> 
						            <div class="panel-heading clearfix">
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Patient list</h4>
								      <div class="btn-group pull-right">
								        
								        <a href="add-patient.php" class="btn btn-default"> Create</a>
								      </div>
	    							</div>											
						           
						            <div class="panel-body">						 
							            	<div class="box">							
									           <div class="box-body">						
									              <table class="table table_striped table_hover table_bordered" id="mydata">	 
										                <thead>														
										                <tr>
										                  <th>Name</th>
										                  <th>Phone</th>
										                  <th>Room no.</th>
										                  <th>Admission Date </th>
										                  <th>Status</th>
										                  <th>Action</th>
										                </tr>
										                </thead>	
										                <?php 
															 $sql="SELECT * FROM patient ";
															 $run_sql=  mysqli_query($con,$sql);

															  while ($rows= mysqli_fetch_array($run_sql) ) { 
																echo'
																	<tbody>
																		<td>'.$rows['patient_name'].' </td>
																								 
																		<td>'.$rows['phone'].'  </td>
																		<td>'.$rows['room_no'].'  </td>
																		
														                <td>'.$rows['admission_date'].'  </td>
														                <td><a href="add-patient.php" class="btn btn-sm btn-success">'.$rows['status'].' </a> 
														                </td>
														                <td> 
														                	<a href="add-patient.php" class="btn btn-sm btn-info">account</a>
														                	 <a href="add-patient.php" class="btn btn-sm btn-info"> charge</a>
														                	
														                </td>
																	</tbody>
																';
															}
															?>
									                </table>
							             		</div>
							              	</div>

										              	<!-- .pagination -->


										              	<nav aria-label="Page navigation example">		
														  <ul class="pagination justify-left">
														    <li class="page-item disabled">
														      <a class="page-link" href="#" tabindex="-1">Previous</a>
														    </li>
														    <li class="page-item"><a class="page-link" href="#">1</a></li>
														    <li class="page-item"><a class="page-link" href="#">2</a></li>
														    <li class="page-item"><a class="page-link" href="#">3</a></li>
														    <li class="page-item">
														      <a class="page-link" href="#">Next</a>
														    </li>
														  </ul>
														</nav>											



														<!-- /.pagination -->
						            </div>
						          </div>
						          </div>
						          
						        </div>
					        
	      
	    					</section>  
					</div>  
				</div>	


								

		

		<footer></footer>
	</body>

</html>