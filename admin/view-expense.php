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
						    <div class="btn-group">
								        
								<a href="dailyexpense.php" class="btn btn-info btn-md"><span class="fa fa-asterisk"></span>Daily Expense</a>
							</div>
						    <div class="btn-group">
								        
								<a href="monthlyexpense.php" class="btn btn-info btn-md"><span class="fa fa-asterisk"></span> Monthly Expanse</a>
							</div>
							<div class="btn-group">
								        
								<a href="salary-expense.php" class="btn btn-info btn-md"><span class="fa fa-asterisk"></span> Salary Expense  </a>
							</div>
								      
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
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Expense</h4>
								      <div class="btn-group pull-right">
								        
								        <a href="add-expense.php" class="btn btn-default"> Create</a>
								      </div>
	    							</div>											
						           
						            <div class="panel-body">						 
							            	<div class="box">							
									           <div class="box-body">						
									              <table class="table table_striped table_hover table_bordered" id="mydata" cellspacing="0" width="100%"> 	 
										                <thead>														
										                <tr>
										                  <th>To </th>
										                  <th>Reason</th>
										                  <th>Amount</th>
										                  <th>Day </th>
										                  <th>Month</th>
										                  <th>Action</th>

										                  
										                 
										                  
										                  
										                </tr>
										                </thead>	
										               <!--  <?php 
															 $sql="SELECT * FROM expense ORDER BY expense_id DESC";
															 $run_sql=  mysqli_query($con,$sql);

															  while ($rows= mysqli_fetch_array($run_sql) ) { 
																echo'
																	   <tr>
																		<td>'.$rows['expense_for'].'  </td>
																		<td>'.$rows['expense_reason'].'  </td>
																		<td>'.$rows['amount'].'  </td>
																		<td>'.$rows['day'].'  </td>
																		<td>'.$rows['month'].'  </td>
																		<td> <button type="button" class="btn btn-info view_student" id=" '.$rows['expense_id'].' " data-toggle="modal" data-target="#myModal" 
					 													>View</button></td> 
														               </tr>
																';
															}
															?> -->
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
			"ajax": "response/expense.php",
			"columnDefs": [
                {
                    "targets": 5,
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