 <div class="col-lg-10">
						<div class="page-header"> 
							<section class="content-header">
						    <div class="btn-group pull-right">
								        
								<a href="#" class="btn btn-default btn-md"><span class="fa fa-asterisk"></span> Setting</a>
							</div>
						      <ol class="breadcrumb ">

						        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						        <li class="active"> InPatient </li>
						        <li class="active"><a href="add-patient.php"><i class="fa fa-wheelchair"></i>Create Patient</a></li>

						      </ol>  
								      
				    		</section> 

				    	</div> 	
</div>

<!--  endof page title header-->


<div class="col-lg-10"> 						
	<div class="content-wrapper">
		<section class="content">  						
	      <div class="row">          				  
		        <div class="col-xs-12">    				
			          <div class="panel panel-danger panel-responsive"> 
				            <div class="panel-heading clearfix">
						      <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Patient list</h4>
							      <div class="btn-group pull-right">
							        
							        <a href="add-patient.php" class="btn btn-default"> Create</a>
							      </div>
							</div>											
				           
				            <div class="panel-body">						 
					            	

							</div>
			          </div>
		          </div>
	          
	        </div>
        

		</section>  
	</div>  
</div>	




<!-- start and endof Table of content -->


<div class="box">							
   <div class="box-body">						
      <table id="1" class="table table-bordered table-hover"> 	 
            <thead>														
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Room no.</th>
              <th>Admission Date </th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>	
            <?php 
				 $sql="SELECT * FROM patient ";
				 $run_sql=  mysqli_query($con,$sql);

				  while ($rows= mysqli_fetch_array($run_sql) ) { 
					echo'
						<tbody>
							<td>'.$rows['name'].' </td>
													 
							<td>'.$rows['phone'].'  </td>
							<td>'.$rows['room_no'].'  </td>
							
			                <td>'.$rows['admission_date'].'  </td>
			                <td><a href="add-patient.php" class="btn btn-sm btn-success">'.$rows['status'].' </a> 
			                </td>
			                <td> 
			                	<a href="add-patient.php" class="btn btn-sm btn-info">account</a>
			                	 <a href="add-patient.php" class="btn btn-sm btn-info"> charge</a>
			                	
			                </td>
						</tbody>
					';
				}
				?>
        </table>
		</div>
	</div>




<!-- .pagination -->


	<nav aria-label="Page navigation example">		
  <ul class="pagination justify-left">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>											



<!-- /.pagination -->