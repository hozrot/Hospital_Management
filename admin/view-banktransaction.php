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

				 <div class="col-lg-10">
						<div class="page-header"> 
							<section class="content-header">
						    <div class="btn-group pull-right">
								        
								<a href="#" class="btn btn-default btn-md"><span class="fa fa-asterisk"></span> Setting</a>
							</div>
						      <ol class="breadcrumb ">

						        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						       
						        <li class="active"><a href="add-banktransaction.php"><i class="fa fa-wheelchair"></i>Create new Tranction</a></li>

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
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Tranction</h4>
								      <div class="btn-group pull-right">
								        
								        <a href="add-banktransaction.php" class="btn btn-default"> Create</a>
								      </div>
	    							</div>											
						           
						            <div class="panel-body">						 
							            	<div class="box">							
									           <div class="box-body">						
									              <table class="table table_striped table_hover table_bordered" id="mydata"> 	 
										                <thead>														
										                <tr>
										                  <th>Bank Name </th>
										                  <th>Type</th>
										                  <th>Amount</th>
										                  <th>Date</th>
										                </tr>
										                </thead>	
										                
									                </table>
							             		</div>
							              	</div>

										              	
						            </div>
						          </div>
						          </div>
						          
						        </div>
					        
	      
	    					</section>  
					</div>  
				</div>	


								
<script src="../include/bootstrap/DataTables/js/jquery.js"></script>
		<script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
		<script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" language="javascript" class="init">

			$(document).ready(function() {
			$('#mydata').dataTable( {
			 "aProcessing": true,
			 "aServerSide": true,
			"ajax": "response/bank.php",
			
			
			} );
			} );

			</script>
		

		<footer></footer>
	</body>

</html>