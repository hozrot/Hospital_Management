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
	

				 <div class="col-lg-10"">
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
					<div class="col-lg-10"  id="print"> 						
						<div class="content-wrapper">
							<section class="content">  						
						      <div class="row">          				  
						        <div class="col-xs-12">    				
						          <div class="panel panel-danger panel-responsive"> 
						            <div class="panel-heading clearfix">
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Monthly Expense</h4>
								      <form class="form-horizontal" enctype="multipart/form-data" action="monthlyexpense.php" method="post">
								<div class="panel-title pull-right">
									<label for="room_no"> Select Month </label>
									<select class="form-control" id="month" name="month" value="Select Category">
									 		<option>Select from below</option>
									        <option>January</option>
										    <option>February</option>
										    <option>March</option>
										    <option>April</option>
										    <option>May</option>
										     <option>June</option>
										     <option>July</option>
										    <option>August</option>
										    <option>September</option>
										    <option>October</option>
										    <option>November</option>
										     <option>December</option>
									 </select>

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
			$month= $_POST['month']; 

			$sql="SELECT * FROM expense where month='$month' ";

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

				</tr>
				';
			}
			echo '<tr><td colspan="2">Net Total: </td> <td>'. $sum .'</td><td></td><td></td></tr>';
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