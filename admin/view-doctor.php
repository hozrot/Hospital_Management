<?php 
include '../include/permission.php';
// Modal to update database

 if (isset($_POST['modal_submit'])) {

            $id = $_POST['modal_doctor_id'];
            $sql = "UPDATE doctor
                                    SET  doctor_name = '$_POST[name]',
								         phone       = '$_POST[phone]',
										 designation = '$_POST[designation]',
										 depertment  = '$_POST[depertment]',
										 gender      = '$_POST[gender]',
										 blood_group = '$_POST[blood_group]',
										 address     = '$_POST[address]',
										 photo       = '{$photo}',
										 visit_salary= '$_POST[visit_salary]',
										 oncall_salary='$_POST[oncall_salary]',
										 operation_salary='$_POST[operation_salary]',
										 category     = '$_POST[category]'

                                        
                                    WHERE doctor_id ='" . $id . "';
                                  ";
            mysqli_query($con, $sql);
            // if (mysqli_query($con, $sql)) {
            //     echo "Record updated successfully";
            // } else {
            //     echo "Error updating record: " . mysqli_error($con);
            // }
        }
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
						   
						      <ol class="breadcrumb ">

						        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						       
						        <li class="active"><a href="add-doctor.php"><i class="fa fa-wheelchair"></i>Create Docotr</a></li>

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
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Doctor list</h4>
								      <div class="btn-group pull-right">
								        
								        <a href="add-doctor.php" class="btn btn-default"> Create</a>
								      </div>
	    							</div>											
						           
						            <div class="panel-body">						 
							            	<div class="box">							
									           <div class="box-body">						
									              <table class="table table_striped table_hover table_bordered" id="mydata">	 
										                <thead>														
										                <tr>
										                  <th>Id</th>
										                  <th>Name</th>
										                  <th>Phone</th>
										                  <th>Designation</th>
										                  <th>Depertment </th>
										                  <th>Blood Group </th>
										                   <th>Action </th>
										                  
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

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h4 class="modal-panel"> Doctor Information 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>

                            </h4>
                        </div>
                        <div class="panel-body">
                        <div class="modal-body">
			                        <form class="form-horizontal" enctype="multipart/form-data" action="view-doctor.php" method="post">
									<input type="hidden" name="modal_doctor_id" id="modal_doctor_id">
									<div class="form-group">
										<label for="name"> Name </label>
										<input  id="modal_name" type="text" name="name" class="form-control" required>
									</div>
									
									<div class="form-group">
										<label for="photo"> Photo </label>
										<input  id="modal_photo" type="file" name="photo" class="btn btn-success">
									</div>
									<div class="form-group">
										 <label for="designation">Designation</label>
										 <select class="form-control" id="modal_designation" name="designation">
										 		<option>Select from below  </option>
										        <option>Proffesor</option>
											    <option>Intern</option>
											    <option>Associate Proffesor</option>
											    <option>Lecturer</option>
										 </select>
									</div>

									<div class="form-group">
										<label for="depertment"> Depertment </label>
										<select class="form-control" id="modal_depertment" name="depertment">
										         <option>Select from below  </option>
										        <option>Arthopedic</option>
											    <option>Gainocology</option>
											    <option>Eye </option>
											    <option>Skin</option>
										 </select>
									</div>
									<div class="form-group">
										<label for="category"> Category </label>
										<select class="form-control" id="modal_category" name="category">
										         <option>Select from below  </option>
										        <option>Sergon</option>
											    <option>Anesthitic</option>
											    <option>Assistant </option>
											    <option>other</option>
										 </select>
									</div>
									
									<div class="form-group">
										<label for="address"> Address </label>
										  <textarea id="modal_address" type="text" name="address" class="form-control" rows="2" required> </textarea>
									</div>
									<div class="form-group">
										<label for="blood_group"> Blood group </label>
										  <select class="form-control" id="modal_blood_group" name="blood_group">
										         <option>Select from below  </option>
										        <option>A+</option>
											    <option>B+</option>
											    <option>AB+ </option>
											    <option>O+</option>
											     <option>A-</option>
											    <option>B-</option>
											    <option>AB- </option>
											    <option>O-</option>
										 </select>
									</div>
									
									
									<div class="form-group">
										 <label for = "gender">Gender</label>
										 <div>
											<label class = "radio-inline">
												  <input type = "radio" name = "gender" id = "modal_male" required> Male
											</label>
												   
											<label class = "radio-inline">
												  <input type = "radio" name = "gender" id = "modal_female" required> Female
											</label>
											
										 </div>
				 						 
									</div>
									<div class="form-group">
										<label for="phone"> Phone </label>
										<input  id="modal_phone" value="+8801" type="text" name="phone" class="form-control" >
									</div>
									<div class="form-group">
										<label for="visit_salary"> Visit Salary </label>
										<input  id="modal_visit_salary" type="text" name="visit_salary" class="form-control" >
									</div>
									<div class="form-group">
										<label for="oncall_salary"> On-Call Salary </label>
										<input  id="modal_oncall_salary" type="text" name="oncall_salary" class="form-control" >
									</div>
									<div class="form-group">
										<label for="operation_salary"> Operation Salary </label>
										<input  id="modal_operation_salary" type="text" name="operation_salary" class="form-control" >
									</div>
									
									<div class="form-group">
										<label for="submit"> </label>
										<input  id="modal_submit" type="submit" name="modal_submit" value="Update" class="btn btn-success">
									</div>
									 
									
								</form>
                            </div><!-- end modal-body -->

                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                            </div><!-- end modal-footer -->
                        </div><!-- end panel-body -->
                    </div><!-- end panel -->
                </div><!-- end modal-content -->
            </div><!-- end modal-dialog -->
        </div><!-- end myModal -->
 <!-- script for showing modala data from the database -->

    <script type="text/javascript">
        function showData(data) {
            //console.log((data));
            $('#modal_doctor_id').val(data['doctor_id']);
            $('#modal_name').val(data['doctor_name']);
            $('#modal_phone').val(data['phone']);
            $('#modal_designation').val(data['designation']);
            $('#modal_depertment').val(data['depertment']);
            $('#modal_male').val(data['gender']);
            $('#modal_female').val(data['gender']);
            $('#modal_blood_group').val(data['blood_group']);
            $('#modal_address').val(data['address']);
            $('#modal_photo').val(data['photo']);
            $('#modal_visit_salary').val(data['visit_salary']);
            $('#modal_oncall_salary').val(data['oncall_salary']);
            $('#modal_operation_salary').val(data['operation_salary']);
            $('#modal_category').val(data['category']);
           
        }
        function buttonClicked(element) {
            var attr_id = element.getAttribute("id");
            //console.log("Clicked: " + attr_id);
            $.getJSON('update/doctor.php', {id: attr_id}, showData);

        }
    </script>

		<script src="../include/bootstrap/DataTables/js/jquery.js"></script>
		<script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
		<script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>
        <script>

			$(document).ready(function () {
        	$('#mydata').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            "ajax": "response/doctor.php",
            "columnDefs": [
            	{
                    "targets": 0,
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": 6,
                    "render": function(data, type, row, meta){
                        return '<button type="button" class="btn btn-info view_doctor" onclick="buttonClicked(this)" data-toggle="modal" id="' + row[0] + '" data-target="#myModal">View</button>'+

                        '<a href="pay-doctor-salary.php?doctor_id='+ row[0] +'"class="btn btn-info">payment</a>' ;

                        return 
                    }
                }
            ]
        });
    });

			</script>
		

		<footer></footer>
	</body>

</html>

