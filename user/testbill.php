<?php 
include '../include/permission.php';

$patient_id = 0;

if(isset($_GET['patient_id'])) {
  $patient_id = $_GET['patient_id'];
  $sql = "SELECT * FROM patient WHERE patient_id = " . $patient_id;
  $run_sql = mysqli_query($con, $sql);

  $row = mysqli_fetch_assoc($run_sql);

  $patient_name = $row['patient_name'];
  $address = $row['address'];
  $phone = $row['phone'];
  $date= $row['admission_date'];
  $room= $row['room_no'];

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "INSERT INTO test_bill(patient_id, date, total_bill) VALUES ('$_POST[patient_id]', '" .
        date('Y-m-d')."', '$_POST[net_amount]')";

    if(!mysqli_query($con, $sql)){
        die('Error: ' . mysqli_error($con));
    }
    header('Location: view-patient.php');
}



?>


<html>
      <head>
        <meta charset="UTF-8">
        <title>Test Bill </title>
            <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
            <script src="../include/js/jquery.js"></script>
            <script src="../include/bootstrap/js/bootstrap.js"></script>
        <!-- <style>
          @import url(includes/fonts.css);
          body, h1, h2, h3, h4, h5, h6{
          font-family: 'Bree Serif', serif;
          }
        </style> -->
      </head>
  


  <body>
        <?php include '../include/header.php';?>
              <div style="width:50px;height:60px;"></div>
        <?php include '../include/sidebar.php';?>
  
      

  <div class="col-lg-10" id="print">
      <div class="row">
          <div class="col-xs-6">
            <h1>
              <a href="#">Sadman Generel Hospital, Rangpur </a>
            </h1>
          </div>
          <div class="col-xs-6 text-right">
            <h1>Hospital Bill</h1>
          </div>
      </div>
      <div class="row">
            <div class="col-xs-5">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h2><?php echo $patient_name; ?></h2>
                </div>
                <div class="panel-body">
                  <p>Address: <?php echo $address; ?></p>
                  <p>Phone: <?php echo $phone; ?></p>
                </div>
              </div>
            </div>


            <div class="col-xs-5 col-xs-offset-2 text-right">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Date: <?php echo date("m-d-Y") . "<br>";?> <?php  echo date("l") ; ?> </h4>
                </div>
                <div class="panel-body">
                  <p> Admission date : <?php echo $date; ?> <br>
                    Release Date: <?php echo date("m-d-Y") ;?>  <br>
                    
                  </p>
                </div>
              </div>
            </div>
          </div>
      <!-- / end client details section -->

              <div class="panel-body">
                    <form action="testbill.php" method="post">
                      <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-hover" id="mydata">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                           Test Id 
                                        </th>
                                        
                                        <th class="text-center">
                                           Test Name 
                                        </th>
                                         <th class="text-center">
                                           Test Price  
                                        </th>
                                        <th class="text-center">
                                            Discount(%)
                                        </th>
                                        <th class="text-center">
                                            Discount Amount
                                        </th>
                                        <th class="text-center">
                                            Net Amount
                                        </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                              </table>
                           </div>
                         </div>
                         <div class="panel-footer">
                            <div class="form-group pull-right">
                             <label for="net_amount"> Net Total </label>
                               <input type="text" name="net_amount" id="net_amount" readonly="readonly">
                                <input type="text" name="patient_id" value="<?php echo $patient_id; ?>" hidden />
                            </div>

                            <div class="form-group">
                                <label for="submit"> </label>
                                <input id="submit" type="submit" name="submit" class="btn btn-success" value="paid" placeholder="Paid">
                            </div>
                             
                             

                         </div>


                    </form>
              <center>
                     <button class="btn btn-primary hidden-print" onclick="printDiv('print')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
              </center>
            </div>
  </div>

        <!--  <script src="../include/bootstrap/DataTables/js/jquery.js"></script> -->
    <script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script>

              $(document).ready(function () {
                  var table  = $('#mydata').dataTable({
                      "aProcessing": true,
                      "aServerSide": true,
                      "ajax": "response/test.php",
                      "columnDefs": [
                           {
                              "targets": 0,
                              "visible": false,
                              "searchable": false
                          },
                          {
                              "targets": 1,
                              "render": function (data, type, row, meta) {
                                  return row[1];
                              }
                          },
                          {
                              "targets": 2,
                              "render": function (data, type, row, meta) {
                                  return '<p id="price_' + row[0] + '">' + row[2] + '</p>';
                              }
                          },
                          {
                                      "targets": 3,
                                      "render": function (data, type, row, meta) {
                                          return '<input class="inputs" type="text" value="100" name="discount_' + row[0] + '"  id="discount_' + row[0] + '" onkeyup="calculateResult(this)">';
                                      }
                                  },
                                  {
                                      "targets": 4,
                                      "render": function (data, type, row, meta) {
                                          return '<input class="inputs" type="text" value="0" name="discountAmount_' + row[0] + '"   id="discountAmount_' + row[0] + '" disabled>';
                                      }
                                  },
                                  {
                                      "targets": 5,
                                      "render": function (data, type, row, meta) {
                                          return '<input class="inputs netAmountInputs" type="text" value="0"  name="netAmount_' + row[0] + '"  id="netAmount_' + row[0] + '" disabled>';
                                      }
                                  },
                          

                      ],
                    
                     });
             
              });

              function calculateResult(element) {
                  var id = element.id.substring(element.id.search("_") + 1);
                 
                  var price = $('#price_' + id).text()
                  var discount = $('#discount_' + id).val();
                  var discountAmountBox = $('#discountAmount_' + id);
                  var netAmountBox = $('#netAmount_' + id);

                  var discount_amount = ( price / 100) * discount;
                  var net_amount = price - discount_amount;

                  discountAmountBox.val(discount_amount);
                  netAmountBox.val(net_amount);

                  updateNetAmount();

              }

                function updateNetAmount()
                {
                    var netAmountBoxes = $('.netAmountInputs');
                    var lenght = netAmountBoxes.length;
                    var total = 0;
                    for(var i=0; i<lenght; i++) {
                        total += parseFloat(netAmountBoxes[i].value);
                    }
                    $('#net_amount').val(total);
                }

                function printDiv(print) {
                     var printContents = document.getElementById(print).innerHTML;
                     var originalContents = document.body.innerHTML;

                     document.body.innerHTML = printContents;

                     window.print();

                     document.body.innerHTML = originalContents;
               }
    </script>

     <!-- Print Button code and Script start  -->
      
     
              
        
      <!-- End Print Code  -->


</body>
</html>

