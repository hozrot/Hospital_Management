<?php 
include '../include/permission.php';

?>
<?php
if (isset($_POST['submit'])) {
	$date = date('Y-m-d');

    $sql= "INSERT INTO patient (patient_name,phone,age,admission_date,room_no,occupation,reference,patient_type,address,
										                gender,status,blood_group) 
								VALUES ( '$_POST[name]',
								         '$_POST[phone]',
								         '$_POST[age]',
								         '$date',
								         '$_POST[room_no]',
								         '$_POST[occupation]',
								         '$_POST[reference]',
								         '$_POST[patient_type]',
										 '$_POST[address]',
										 '$_POST[gender]',
										 'Admitted',
										 '$_POST[blood_group]'
										
										 )";
    mysqli_query($con,$sql);

    // make the corresponding room BOOKED
    $sql = "UPDATE room SET status='Booked' WHERE room_no = '$_POST[room_no]'";
    mysqli_query($con, $sql);


}
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
			<div class="page-header"> <h1>Patient Addmission <a href="view-patient.php" class="btn btn-info">View </a></h1>  </div>
				<div class="container-fluid">
					<form class="form-horizontal" enctype="multipart/form-data" action="add-patient.php" method="post">
						<div class="form-group">
							<label for="name"> Name </label>
							<input  id="name" type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
                                        <label for="name"> Doctor Name </label>
                                        <select id="doctor_name" name="doctor_name"  class="form-control" required>
                                            <?php
                                            $sql="SELECT * FROM doctor ";

                                            $run_sql=  mysqli_query($con,$sql);
                                            echo "<option > Select Doctor </option>";
                                            while ($rows= mysqli_fetch_array($run_sql)) {
                                                $doctor_name= $rows['doctor_name'];

                                                echo "<option > {$doctor_name}</option>";
                                            } 
                                            ?>

                                         </select>
                                    </div>
						<div class="form-group">
							<label for="address"> Address </label>
							  <textarea  id="address" type="text" name="address" rows="2" class="form-control" required> </textarea>
						</div>
						<div class="form-group">
							<label for="phone"> Phone </label>
							<input  id="phone" type="tel" value="+8801" name="phone" class="form-control" required>
						</div>
						
						<div class="form-group">
							 <label for = "gender">Gender</label>
							 <div>
								<label class = "radio-inline">
									  <input type = "radio" name = "gender" id = "male" value = "male"> Male
								</label>
									   
								<label class = "radio-inline">
									  <input type = "radio" name = "gender" id = "female" value = "female"> Female
								</label>
								
							 </div>
	 						 
						</div>
						<div class="form-group">
							<label for="age"> Age </label>
							  <input  id="age" type="input" name="age" class="form-control" required>
						</div>
						<!-- <div class="form-group">
						<label for="admission_date"> Date Of Admission </label>
						<div class='input-group date' id='datetimepicker1'>
							<input type="text" name="admission_date" id="date" class="datepicker form-control">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
						</div> -->



						<div class="form-group">
							<label for="room_no"> Room no </label>
							  <select id="room_no" name="room_no"  class="form-control" required>
								<?php
							$sql="SELECT * FROM room WHERE status = 'Available'";

							$run_sql=  mysqli_query($con,$sql);
							echo "<option value=\"N/A\"> Select room </option>";
							while ($rows= mysqli_fetch_array($run_sql)) {
								$room_no= $rows['room_no'];

								echo "<option > {$room_no}</option>";
							} 
							?>

							   </select>
						</div>
						<div class="form-group">
							<label for="occupation"> Occupation </label>
							  <select id="occupation" name="occupation"  class="form-control" required>
								<option>none</option>
								<option>Sericeholder</option>
								<option>Housewife</option>
								<option>Student</option>
								<option>Farmer</option>

							   </select>
						</div>
						<div class="form-group">
							<label for="reference"> Reference </label>
							  <input  id="reference" name="reference" type="text" name="reference" class="form-control" required>
						</div>
					

						<!-- <div class="form-group">
							<label for="status"> Patient Status </label>
							  <select id="status" name="status"  class="form-control" required>
								
								<option>Admitted </option>
								<option>Released </option>
								

							   </select>
						</div> -->
						<div class="form-group">
							<label for="blood_group"> Blood Group </label>
							  <select id="blood_group" name="blood_group"  class="form-control" required>
								<option>none</option>
								<option>A+</option>
								<option>A-</option>
								<option>B+</option>
								<option>B-</option>
								<option>O+</option>
								<option>O-</option>
								<option>AB+</option>
								<option>AB-</option>
							   </select>
						</div>
	
						<div class="form-group">
							<label for="submit"> </label>
							<input  id="submit" type="submit" name="submit" class="btn btn-success" value="submit">

						</div>

						 
						
					</form>
		 		</div>




				
		</div>
		
		

		<footer></footer>
	</body>

</html>