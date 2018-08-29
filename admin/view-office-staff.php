<?php 
include '../include/permission.php';

 if (isset($_POST['modal_submit'])) {

            $id = $_POST['modal_staff_id'];
            $sql = "UPDATE office_staff
                                    SET  staff_name = '$_POST[name]',
                                   		 address     = '$_POST[address]',
								   	     phone       = '$_POST[phone]',
										 designation = '$_POST[designation]',
										
										 sex      = '$_POST[gender]',
										 blood_group = '$_POST[blood_group]',
										 salary= '$_POST[salary]'  

                                        
                                    WHERE office_staff_id ='" . $id . "'";
            if(!mysqli_query($con, $sql)){
            	die('Error: ' . mysqli_error($con));
            }
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
						       
						        <li class="active"><a href="add-office-staff.php"><i class="fa fa-wheelchair"></i>Create Office Staff</a></li>

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
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Staff list</h4>
								      <div class="btn-group pull-right">
								        
								        <a href="add-office-staff.php" class="btn btn-default"> Create</a>
								      </div>
	    							</div>											
						           
						            <div class="panel-body">						 
							            	<div class="box">							
									           <div class="box-body">						
									              <table class="table table_striped table_hover table_bordered" id="mydata"> 
										                <thead>														
										                <tr>
										                <th>Id </th>
										                  <th>Name</th>
										                  <th>Phone</th>
										                  <th>Designation</th>
										                  <th>Blood </th>
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

	 <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h4 class="modal-panel"> Staff Information 
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>

                            </h4>
                        </div>
                        <div class="panel-body">
                        <div class="modal-body">
			                        <form class="form-horizontal" enctype="multipart/form-data" action="view-office-staff.php" method="post">
									<input type="hidden" name="modal_staff_id" id="modal_staff_id">
									<div class="form-group">
										<label for="name"> Name </label>
										<input  id="modal_name" type="text" name="name" class="form-control" required>
									</div>
									
									<div class="form-group">
										 <label for="designation">Designation</label>
										 <select class="form-control" id="modal_designation" name="designation">
										 		<option>Select from below  </option>
										        <option>Nurse</option>
											    <option>Sister</option>
											    <option>Clark</option>
											    <option>Accountant</option>
											    <option>Manager</option>
											    <option>Watchman</option>
											    <option>Cabin Boy</option>
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
										<label for="salary"> Salary </label>
										<input  id="modal_salary" type="text" name="salary" class="form-control" >
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
            $('#modal_staff_id').val(data['office_staff_id']);
            $('#modal_name').val(data['staff_name']);
            $('#modal_phone').val(data['phone']);
            $('#modal_designation').val(data['designation']);
           
            $('#modal_male').val(data['sex']);
            $('#modal_female').val(data['sex']);
            $('#modal_blood_group').val(data['blood_group']);
            $('#modal_address').val(data['address']);
            $('#modal_image').val(data['image']);
            $('#modal_salary').val(data['salary']);
           
           
        }
        function buttonClicked(element) {
            var attr_id = element.getAttribute("id");
            //console.log("Clicked: " + attr_id);
            $.getJSON('update/staff.php', {id: attr_id}, showData);

        }
    </script>


        <script src="../include/bootstrap/DataTables/js/jquery.js"></script>
		<script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
		<script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>
    
        <script type="text/javascript" language="javascript" class="init">

			$(document).ready(function() {
			$('#mydata').dataTable( {
			 "aProcessing": true,
			 "aServerSide": true,
			"ajax": "response/office_staff.php",
			"columnDefs": [

				{
                    "targets": 0,
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": 5,
                    "render": function(data, type, row, meta){
                        return '<button type="button" class="btn btn-info view-office-staff" onclick="buttonClicked(this)" data-toggle="modal" id="' + row[0] + '" data-target="#myModal">View</button>'+
                        '<a href="pay-staff-salary.php?office_staff_id='+ row[0] +'"class="btn btn-info">payment</a>' 
                       ;
                    }
                }
            ]
			} );
			} );

			</script>								

		

		<footer></footer>
	</body>

</html>