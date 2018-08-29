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
		 
		
		<div class="col-lg-8">
			<div class="page-header"> <h1>Add Bank Transaction  <a href="view-banktransaction.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-banktransaction.php" method="post">
						<div class="form-group">
							<label for="bank_name"> Bank Name </label>
							
							<select class="form-control" id="bank_name" name="bank_name" value="">
							 	
							 		<option>Sonali Bank   </option>
							        <option>Rupali Bank  </option>
							         <option>Duch Bangla Bank  </option>
							          <option>Islami Bank  </option>
							           <option>Trust Bank  </option>
								    
							 </select>
						</div>
						
						
						<div class="form-group">
							 <label for="transaction_type">Bank Transaction Type</label>
							 <select class="form-control" id="transaction_type" name="transaction_type" value="">
							 		<option>In  </option>
							        <option>Out </option>
								    
							 </select>
						</div>

						
						
						<div class="form-group">
							<label for="amount"> Amount </label>
							  <input id="amount" type="text" name="amount" class="form-control" required> 
						</div>
					
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success">
						</div>
						 
						
					</form>
		 		</div> <!--/.container-fluid-->


				<?php 
					if (isset($_POST['submit'])) {

						$date=date('Y-m-d');

						$sql= "INSERT INTO bank_transaction (bank_name,transaction_type,amount,date) 
								VALUES ( '$_POST[bank_name]',
								         '$_POST[transaction_type]',
										 '$_POST[amount]',
										 '{$date}'
										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div> <!--/.col-lg-8-->
		
		

		<footer></footer>
	</body>

</html>