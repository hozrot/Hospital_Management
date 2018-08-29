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
			<div class="page-header"> <h1>Add Expense  <a href="view-expense.php" class="btn btn-info">View </a></h1> </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-expense.php" method="post">
						<div class="form-group">
							<label for="expense_for"> Expense For </label>
							<input  id="expense_for" type="text" name="expense_for" class="form-control" required>
						</div>
						<div class="form-group">
							 <label for="category">Category</label>
							<select class="form-control" id="category" name="category" value="Select Category">
							 		<option>Select from below</option>
							        <option>Doctor</option>
								    <option>Staff</option>
								    <option>Medicine</option>
								    <option>Equipment</option>
								    <option>Bill</option>
								     <option>Others</option>
							 </select>
						</div>

						<div class="form-group">
							<label for="expense_reason"> Expense Reason </label>
							<textarea  id="expense_reason" type="text" name="expense_reason" rows="2" class="form-control" required> </textarea>
						</div>
						
						<div class="form-group">
							<label for="amount"> Amount </label>
							  <input id="amount" type="text" name="amount" class="form-control"  required> 
						</div>
						
	 					<div class="form-group">
						<label for="day"> Date </label>
						<div class='input-group date' id='datetimepicker1'>
							<input type="text" name="day" id="date" class="datepicker form-control">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>	 
						<div class="form-group">
							 <label for="month">Month</label>
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
						</div>
												
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success">
						</div>
						 
						
					</form>
		 		</div> <!--/.container-fluid-->


				<?php 
					if (isset($_POST['submit'])) {

					

						$sql= "INSERT INTO expense (expense_for,category,amount,expense_reason,day,month) 
								VALUES ( '$_POST[expense_for]',
								         '$_POST[category]',
										 '$_POST[amount]',
										 '$_POST[expense_reason]',
										 '$_POST[day]',
										 '$_POST[month]'
										 

										 )";
						mysqli_query($con,$sql);

					     
					}
				 ?> 

				
		</div> <!--/.col-lg-8-->
		
		

		<footer></footer>
	</body>

</html>