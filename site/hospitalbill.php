<?php 
require_once 'include/condb.php';
?>

<html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
          <script>
              $(function(){
                $('.datepicker').datepicker();
              });

            </script>

        <style type="text/css">
          .card-container.card {
                max-width: 950px;
                padding-bottom:80px;
            }


          .card {
              background-color: #F7F7F7;
              /* just in case there no content*/
              padding: 20px 25px 30px;
              margin: 0 auto 25px;
              margin-top: 50px;
              /* shadows and rounded borders */
              -moz-border-radius: 6px;
              -webkit-border-radius: 2px;
              border-radius: 2px;
              -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
              -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
              box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          }
          .well-title{
            text-align: center;
            text-transform: capitalize;
            text-indent: inherit;
          
            padding-right: 96px;


          }


        </style>
         
    </head>



<body>

<?php include 'include/header.php';?>
    <div style="width:50px;height:60px;"></div>




<div class="card card-container">

  <div class="container">
      <div class="row1">
                
        <div class="well-block">
          <div class="well-title">
            <h1 ><b>Sadman General hospital Rangpur</b></h1>
              <p >CheckPost , rangpur ;Tele:017897, mob:017874</p>
          </div> <!--/.well-title-->
            <form >
                            <!-- Form start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="width:270px">
                                        <label class="control-label" for="name">Name</label>
                                        <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group" style="width:270px">
                                        <label class="control-label" for="email">Phone no.</label>
                                        <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="date"> Date </label>
                                      <div class='input-group date' id='datetimepicker1'>
                                        <input type="text" name="date" id="date" class="datepicker form-control">
                                        <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                      </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-6">
                                    <div class="form-group" style="width:270px">
                                        <label class="control-label" for="time"> Time</label>
                                        <select id="time" name="time" class="form-control">
                                            <option value="8:00 to 9:00">8:00 to 9:00</option>
                                            <option value="9:00 to 10:00">9:00 to 10:00</option>
                                            <option value="10:00 to 1:00">10:00 to 1:00</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Select Basic -->
                                <div class="col-md-12">
                                    <div class="form-group" style="width:270px">
                                        <label class="control-label" for="appointmentfor">Appointment For</label>
                                        <select id="appointmentfor" name="appointmentfor" class="form-control">
                                            <option value="Service#1">Service#1</option>
                                            <option value="Service#2">Service#2</option>
                                            <option value="Service#3">Service#3</option>
                                            <option value="Service#4">Service#4</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            </div>

                        </form>
                        <!-- form end -->
        </div> <!--well-block-->
    </div> <!--/.row1-->
  </div> <!--/.coainter-->

  
    <div class="row2">
      <h2> BIll </h2>
      <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
               <tr class="active">
                   <th >Code</th>
                   <th>DESCCRIPTION</th>
                   <th>Charge</th>
                   <th>No.U</th>
                   <th>Total</th>
                   <th>Less</th>
                   <th style="width: 120px">Net Amount</th>

               </tr> 
            </thead>
            <tbody>
                <tr>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <td class="editable">1234</td>
                  </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <td class="editable">Description</td>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <td class="editable">Description</td>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <td class="editable">Description</td>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <td class="editable">Description</td>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <td class="editable">Description</td>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <td class="editable">Description</td>
                    </div>

                </tr>
                <tr>
                  </tbody>
            </table>
            <table class="table table-hovar">
                  <tbody>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>    </td>
                                <td>    </td>
                                <td>     </td>
                                <td>    </td>
                                <td>     </td>
                                <td>    </td>
                                <td>   </td>
                                <td class="text-right">
                                <p>
                                    <strong>Subtotal: </strong>
                                </p>
                                <p>
                                    <strong>Tax: </strong>
                                </p></td>
                                <td class="text-center">
                                <p>
                                    <strong>$6.94</strong>
                                </p>
                                <p>
                                    <strong>$6.94</strong>
                                </p></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>    </td>
                                <td>    </td>
                                <td>    </td>
                                <td>    </td>
                                <td>     </td>
                                <td>     </td>
                                <td>    </td>
                                <td class="text-right"><h4><strong>Total: </strong></h4></td>
                                <td class="text-center text-danger"><h4><strong>$31.53</strong></h4></td>
                            </tr>
                      </tbody>
                    </table>
           <!--/.table-->
      </div>
  </div> <!--/.row2-->
    <!-- Button -->
  <div class="row3">
      <div class="form-group">
          <button id="singlebutton" name="singlebutton" class="btn btn-lg btn-primary">Paid</button>
      </div>

  </div> <!--/.row3-->
 
   <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                            </div>
                        </div>

                         <div class="row4">
        <div class="span8 well invoice-thank">
          <h5 style="text-align:center;">Thank You!</h5>
        </div>
  </div>

</div> <!--/.card-cointainer-->


   


</body>

</html>   

