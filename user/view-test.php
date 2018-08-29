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
	

				 <div class="col-lg-10">
						<div class="page-header"> 
							<section class="content-header">
						    
						      <ol class="breadcrumb ">

						        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						       
						        <li class="active"><a href="add-test.php"><i class="fa fa-wheelchair"></i>Create test</a></li>

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
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Services</h4>
								      <div class="btn-group pull-right">
								        
								        <a href="add-test.php" class="btn btn-default"> Create</a>
								      </div>
	    							</div>											
						           
						            <div class="panel-body">						 
							            	<div class="box">							
									           <div class="box-body">						
									              <table class="table table_striped table_hover table_bordered" id="mydata">	 
										                <thead>														
										                <tr>
										                  <th>Test Id </th>
										                  <th>Test Name </th>
										                  <th>Description </th>
										                  <th>Price</th>
										                  <th>Action</th>
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
			"ajax": "response/test.php",
			"columnDefs": [
			{
                    "targets": 0,
                    "visible": false,
                    "searchable": false
                },

                {
                    "targets": 4,
                    "render": function(data, type, row, meta){
                        return '<a href="#"><button type="button" class="btn btn-info">View</button></a>' ;
                    }
                }
            ]
			} );
			} );

			</script>

		<footer></footer>
	</body>

</html>