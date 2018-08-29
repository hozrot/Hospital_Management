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
		  <?php include 'include/header.php';?>
        <div style="width:50px;height:60px;"></div>
        <?php include 'include/sidebar.php';?>
	
					<div class="col-lg-10"> 						
						<div class="content-wrapper">
							<section class="content">  						
						      <div class="row">          				  
						        <div class="col-xs-12">    				
						          <div class="panel panel-danger panel-responsive"> 
						            <div class="panel-heading clearfix">
								      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Doctor list</h4>
								      
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
                        return '<a href="pay-doctor-salary.php?doctor_id='+ row[0] +'"class="btn btn-info">payment</a>' ;

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

