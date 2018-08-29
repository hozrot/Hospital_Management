<?php 
include '../include/permission.php';
?>

<html>
	<head>
		<title>Admin Panel</title>
		 <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
        <script src="../include/js/jquery.js"></script>
        <script src="../include/bootstrap/js/bootstrap.js"></script>
        <script src="../include/bootstrap/js/bootstrap-datepicker.js"></script>
        <script>
		$(function(){
			$('.datepicker').datepicker();
		});

		</script>
		
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
								        
								<a href="salary-expense.php" class="btn btn-info btn-md"><span class="fa fa-asterisk"></span> Salary Expense </a>
							</div>
								      
				    		</section> 

				    	</div> 	<!-- start and endof page title header-->
				    </div>
			<div class="col-lg-10" id="print"> 						
				<div class="content-wrapper">
					<section class="content">  						
				      <div class="row">          				  
				        <div class="col-xs-12">    				
				          <div class="panel panel-danger panel-responsive"> 
				            <div class="panel-heading clearfix">
						      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Daily  Expense  </br> </br></br><p> Today : <?php echo date("d-m-y"); ?>  </p> </h4>

						      <form class="form-horizontal" enctype="multipart/form-data" action="dailyexpense.php" method="post">
								<div class="panel-title pull-right">
									<label for="day"> Select date Date </label>
											<div class='input-group date' id='datetimepicker1'>
												<input type="text" name="day" id="date" class="datepicker form-control">
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>

									 <label for="submit"> </label>
									<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
								</div>

						
						 
						
							</form>
								      
	    				</div>											
					 <div class="panel panel-danger panel-responsive">
						
							<div class="panel-body">
								<table class="table table-hover ">
									<thead>
										
									  <th>To </th>
						              <th>Reason</th>
						              <th>Amount</th>
						              <th>Day </th>
						              <th>Month</th>


										
									</thead>
									<?php 
									if($_SERVER['REQUEST_METHOD'] == 'POST') {
									$day= $_POST['day']; 

									$sql="SELECT * FROM expense where day='$day' ";

									$run_sql=  mysqli_query($con,$sql);
									$sum = 0;
									while ($rows= mysqli_fetch_array($run_sql)) { 
										$sum += $rows['amount'];
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
										<tr><td colspan="2">Total Expense at : '.$rows['day'].'  </td> <td>'. $sum .'</td><td></td><td></td></tr>
										';
									}
									
								}

									?>
									
								</table>


							</div>
					</div>
						            
	          </div>

	          </div>
	          
	        </div>
					        
	      
	    					</section>  
					</div>  
				</div>	


				

		

		<footer>
				<center>
		             <button class="btn btn-primary hidden-print" onclick="printDiv('print')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
		      	</center>
		        <script type="text/javascript">
		              function printDiv(print) {
		                         var printContents = document.getElementById(print).innerHTML;
		                         var originalContents = document.body.innerHTML;

		                         document.body.innerHTML = printContents;

		                         window.print();

		                         document.body.innerHTML = originalContents;
		                       }
		        </script>
	    </footer>
	</body>

</html>