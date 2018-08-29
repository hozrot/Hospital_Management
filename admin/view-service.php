<?php 
include '../include/permission.php';
if (isset($_POST['modal_submit'])) {

            $id = $_POST['modal_service_id'];
            $sql = "UPDATE service
                                    SET service_name='$_POST[service_name]',
                                        service_cost='$_POST[service_cost]',
                                        description='$_POST[description]'
                                      
                                        
                                        
                                    WHERE service_id ='" . $id . "';
                                  ";
            mysqli_query($con, $sql);
            if (mysqli_query($con, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
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
						       
						        <li class="active"><a href="add-service.php"><i class="fa fa-wheelchair"></i>Create service</a></li>

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
								        
								        <a href="add-service.php" class="btn btn-default"> Create</a>
								      </div>
	    							</div>											
						           
						            <div class="panel-body">						 
							            	<div class="box">							
									           <div class="box-body">						
									              <table class="table table_striped table_hover table_bordered" id="mydata">	 
										                <thead>														
										                <tr>
										                  <th>Service Id </th>
										                  <th>Service Name </th>
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
			<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h4 class="modal-panel"> View Information
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>

                            </h4>
                        </div>
                        <div class="panel-body">

                            <div class="modal-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="view-service.php"
                                      method="post">
                                    <input type="hidden" name="modal_service_id" id="modal_service_id">
                                    <div class="form-group">
                                        <label for="service_name"> Service Name </label>
                                        <input id="modal_service_name" type="text" name="service_name" class="form-control">
                                    </div>
                                   <div class="form-group">
                                        <label for="service_cost"> Service Cost </label>
                                        <input id="modal_service_cost" type="text" name="service_cost" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description"> Description </label>
                                        <textarea id="modal_description" type="text" name="description" rows="3 "
                                                  class="form-control"> </textarea>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="submit"> </label>
                                        <input id="modal_submit" type="submit" name="modal_submit" value="Update"
                                               class="btn btn-success">
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

    <script type="text/javascript">
        function showData(data) {
            //console.log((data));
            $('#modal_service_id').val(data['service_id']);
             $('#modal_service_name').val(data['service_name']);
            $('#modal_service_cost').val(data['service_cost']);
            $('#modal_description').val(data['description']);
             
            
            
           
          
           
           
        }
        function buttonClicked(element) {
            var attr_id = element.getAttribute("id");
            //console.log("Clicked: " + attr_id);
            $.getJSON('update/service.php', {id: attr_id}, showData);

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
			"ajax": "response/service_response.php",
			"columnDefs": [
			{
                    "targets": 0,
                    "visible": false,
                    "searchable": false
                },

                {
                    "targets": 4,
                    "render": function(data, type, row, meta){
                        return '<button type="button" class="btn btn-info view_service" onclick="buttonClicked(this)" data-toggle="modal" id="' + row[0] + '" data-target="#myModal">View</button>' ;
                    }
                }
            ]
			} );
			} );

			</script>

		<footer></footer>
	</body>

</html>