<?php
include '../include/permission.php';


$patient_id = 0;

if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
    $sql = "SELECT * FROM patient WHERE patient_id = " . $patient_id;
    $run_sql = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($run_sql);

    $patient_name = $row['patient_name'];
    $address = $row['address'];
    $phone = $row['phone'];
    $date = $row['admission_date'];
    $room = $row['room_no'];

    // now query additional room information
    $sql = "SELECT * FROM room WHERE room_no = '" . $room . "'";
    $run_sql = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($run_sql);

    $room_price = $row['price'];

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "INSERT INTO hospital_bill(patient_id, date, total_bill) VALUES ('$_POST[patient_id]', '" .
        date('Y-m-d')."', '$_POST[total]')";

    if(!mysqli_query($con, $sql)){
        die('Error: ' . mysqli_error($con));
    }

    header('Location: view-patient.php');
}


?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hospital Bill </title>
    <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
    <script src="../include/js/jquery.js"></script>
    <script src="../include/bootstrap/js/bootstrap.js"></script>
    <script src="../include/bootstrap/js/bootstrap-datepicker.js"></script>
    <script>
        $(function () {
            $('.datepicker').datepicker();
        });

    </script>
    <style>
        @import url(../include/fonts.css);

        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Bree Serif', serif;
        }
    </style>
</head>

<body>
<?php include '../include/header.php'; ?>
<div style="width:50px;height:60px;"></div>
<?php include '../include/sidebar.php'; ?>
<form action="hospital-bill.php" method="post">
    <div class="col-lg-10" id="print">

        <div class="row">
            <div class="col-xs-6">
                <h1>
                    <a href="#">

                        Sadman Generel Hospital, Rangpur
                    </a>
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
                        <input type="text" value="<?php echo $patient_id; ?>" name="patient_id" hidden>
                        <h3>Patient Name: <?php echo $patient_name; ?></h3>
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
                        <h4>
                            <div class="form-group">
                                <label for="date"> Billing Date </label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type="text" name="date" id="date" value="<?php echo date('m/d/Y'); ?>" class=" form-control" required>
                                    <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                                </div>
                            </div>


                        </h4>
                    </div>
                    <div class="panel-body">
                        <p> Admission date : <?php echo $date; ?> <br>
                            Release Date: <?php echo date("m/d/Y"); ?> <br>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- / end client details section -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><h4>Service</h4></th>
                <th><h4>Charge</h4></th>
                <th><h4>No of unit</h4></th>
                <th><h4>Total</h4></th>
                <th><h4>Discount %</h4></th>
                <th><h4>Discount Amount </h4></th>
                <th><h4>Net Amount</h4></th>

            </tr>
            </thead>
            <thead>
            <tr>
                <th>
                    <h4>Admission Charge </h4>
                </th>
                <th>
                    <input id="admission_charge" type="text" name="admission_charge" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="admission_unit" type="text" name="admission_unit" class="form-control" value="1"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="admission_total" type="text" value="0" name="admission_total" class="form-control"
                           required>
                </th>
                <th>
                    <input id="admission_discount" type="text" name="admission_discount" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="admission_discount_amount" type="text" value="0" name="admission_discount_amount"
                           class="form-control" required>
                </th>
                <th>
                    <input id="admission_net_amount" type="text" value="0" name="net_amount" class="form-control"
                           required>
                </th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th>
                    <h4>Room no: <?php echo $room; ?>  </h4>
                </th>
                <th>
                    <input id="room_charge" type="text" name="room_charge" class="form-control" readonly="readonly"
                           value="<?php echo $room_price; ?>" onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="room_unit" type="text" name="room_unit" value="1" class="form-control"
                           onKeyUp="calculateResult(this);"
                           required>
                </th>
                <th>
                    <input id="room_total" type="text" name="room_total" value="<?php echo $room_price; ?>"
                           class="form-control" required>
                </th>
                <th>
                    <input id="room_discount" type="text" name="room_discount" value="0" class="form-control"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="room_discount_amount" type="text" name="room_discount_amount" value="0"
                           class="form-control" required>
                </th>
                <th>
                    <input id="room_net_amount" type="text" name="room_net_amount" value="<?php echo $room_price; ?>"
                           class="form-control" required>
                </th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th>
                    <h4>Service charge </h4>
                </th>
                <th>
                    <input id="service_charge" type="text" name="service_charge" class="form-control" value="500"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="service_unit" type="text" name="service_unit" class="form-control" value="1"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="service_total" type="text" name="service_total" class="form-control" value="0" required>
                </th>
                <th>
                    <input id="service_discount" type="text" name="service_discount" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="service_discount_amount" type="text" name="service_discount_amount" class="form-control"
                           value="0"
                           required>
                </th>
                <th>
                    <input id="service_net_amount" type="text" name="service_net_amount" class="form-control" value="0"
                           required>
                </th>
            </tr>
            </thead>

            <thead>
            <tr>
                <th>
                    <h4>Food charge </h4>
                </th>
                <th>
                    <input id="food_charge" type="text" name="food_charge" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="food_unit" type="text" name="food_unit" class="form-control" value="1"
                           onKeyUp="calculateResult(this);"
                           required>
                </th>
                <th>
                    <input id="food_total" type="text" name="food_total" class="form-control" value="0" required>
                </th>
                <th>
                    <input id="food_discount" type="text" name="food_discount" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="food_discount_amount" type="text" name="food_discount_amount" class="form-control"
                           value="0" required>
                </th>
                <th>
                    <input id="food_net_amount" type="text" name="food_net_amount" class="form-control" value="0"
                           required>
                </th>
            </tr>
            </thead>

            <thead>
            <tr>
                <th>
                    <h4>Team charge </h4>
                </th>
                <th>
                    <input id="team_charge" type="text" name="team_charge" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="team_unit" type="text" name="team_unit" class="form-control" value="1"
                           onKeyUp="calculateResult(this);"
                           required>
                </th>
                <th>
                    <input id="team_total" type="text" name="team_total" class="form-control" value="0" required>
                </th>
                <th>
                    <input id="team_discount" type="text" name="team_discount" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>

                </th>
                <th>
                    <input id="team_discount_amount" type="text" name="team_discount_amount" class="form-control"
                           value="0" required>
                </th>
                <th>
                    <input id="team_net_amount" type="text" name="team_net_amount" class="form-control" value="0"
                           required>
                </th>
            </tr>
            </thead>

            <thead>
            <tr>
                <th>
                    <h4>Other charges </h4>
                </th>
                <th>
                    <input id="other_charge" type="text" name="other_charge" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="other_unit" type="text" name="other_unit" class="form-control" value="1"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="other_total" type="text" name="other_total" class="form-control" value="0" required>
                </th>
                <th>
                    <input id="other_discount" type="text" name="other_discount" class="form-control" value="0"
                           onKeyUp="calculateResult(this);" required>
                </th>
                <th>
                    <input id="other_discount_amount" type="text" name="other_discount_amount" class="form-control"
                           value="0"
                           required>
                </th>
                <th>
                    <input id="other_net_amount" type="text" name="other_net_amount" class="form-control" value="0"
                           required>
                </th>
            </tr>
            </thead>
            <input type="text" id="net_total" name="total" value="<?php echo $room_price; ?>" hidden>
        </table>

        <div class="row text-right">
            <div class="col-xs-2 col-xs-offset-8">
                <h2>
                    <strong>

                        Total : <span id="total"><?php echo $room_price; ?></span>
                    </strong>
                </h2>
            </div>
            <!-- <div class="col-xs-2">
              <h2><strong>
              $1200.00 <br>
              N/A <br>
              $1200.00 <br>
              </strong>
              </h2>
            </div> -->
        </div>
        <div class="row">
            <div class="form-group  text-right">

                <input id="submit" type="submit" value="Paid" name="submit" placeholder="Paid"
                       class="btn btn-success btn-lg">
            </div>

            <div class="col-xs-11">
                <div class="span7">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            <h4>Get your Treatment with our hospitality and care </h4>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</form>
<!-- Print Button code and Script start  -->
<center>
    <button class="btn btn-primary hidden-print" onclick="printDiv('print')"><span class="glyphicon glyphicon-print"
                                                                                   aria-hidden="true"></span> Print
    </button>
</center>

<!-- End Print Code  -->
<script type="text/javascript">
    function calculateResult(element) {

        // admission
        var dom = $('#admission_charge');
        var admission_charge = parseFloat(dom.val());
        dom.attr('value', admission_charge);

        dom = $('#admission_unit');
        var admission_unit = parseFloat(dom.val());
        dom.attr('value', admission_unit);

        dom = $('#admission_discount');
        var admission_discount = parseFloat(dom.val());
        dom.attr('value', admission_discount);


        var admission_totalBox = $('#admission_total');
        var admission_discount_amountBox = $('#admission_discount_amount');
        var admission_net_amountBox = $('#admission_net_amount');

        var admission_total = (admission_charge * admission_unit);
        var admission_discount_amount = ( admission_total / 100) * admission_discount;
        var admission_net_amount = admission_total - admission_discount_amount;

        admission_totalBox.attr("value", admission_total);
        admission_discount_amountBox.attr("value", admission_discount_amount);
        admission_net_amountBox.attr("value", admission_net_amount);

        // room
        dom = $('#room_charge');
        var room_charge = parseFloat(dom.val());
        dom.attr('value', room_charge);

        dom = $('#room_unit');
        var room_unit = parseFloat(dom.val());
        dom.attr('value', room_unit);

        dom = $('#room_discount');
        var room_discount = parseFloat(dom.val());
        dom.attr('value', room_discount);


        var room_totalBox = $('#room_total');
        var room_discount_amountBox = $('#room_discount_amount');
        var room_net_amountBox = $('#room_net_amount');

        var room_total = (room_charge * room_unit);
        var room_discount_amount = ( room_total / 100) * room_discount;
        var room_net_amount = room_total - room_discount_amount;

        room_totalBox.attr("value", room_total);
        room_discount_amountBox.attr("value", room_discount_amount);
        room_net_amountBox.attr("value", room_net_amount);

        // service
        dom = $('#service_charge');
        var service_charge = parseFloat(dom.val());
        dom.attr('value', service_charge);

        dom = $('#service_unit');
        var service_unit = parseFloat(dom.val());
        dom.attr('value', service_unit);

        dom = $('#service_discount');
        var service_discount = parseFloat(dom.val());
        dom.attr('value', service_discount);


        var service_totalBox = $('#service_total');
        var service_discount_amountBox = $('#service_discount_amount');
        var service_net_amountBox = $('#service_net_amount');

        var service_total = (service_charge * service_unit);
        var service_discount_amount = ( service_total / 100) * service_discount;
        var service_net_amount = service_total - service_discount_amount;

        service_totalBox.attr("value", service_total);
        service_discount_amountBox.attr("value", service_discount_amount);
        service_net_amountBox.attr("value", service_net_amount);

        // food
        dom = $('#food_charge');
        var food_charge = parseFloat(dom.val());
        dom.attr('value', food_charge);

        dom = $('#food_unit');
        var food_unit = parseFloat(dom.val());
        dom.attr('value', food_unit);

        dom = $('#food_discount');
        var food_discount = parseFloat(dom.val());
        dom.attr('value', food_discount);


        var food_totalBox = $('#food_total');
        var food_discount_amountBox = $('#food_discount_amount');
        var food_net_amountBox = $('#food_net_amount');

        var food_total = (food_charge * food_unit);
        var food_discount_amount = ( food_total / 100) * food_discount;
        var food_net_amount = food_total - food_discount_amount;

        food_totalBox.attr("value", food_total);
        food_discount_amountBox.attr("value", food_discount_amount);
        food_net_amountBox.attr("value", food_net_amount);

        // team
        dom = $('#team_charge');
        var team_charge = parseFloat(dom.val());
        dom.attr('value', team_charge);

        dom = $('#team_unit');
        var team_unit = parseFloat(dom.val());
        dom.attr('value', team_unit);

        dom = $('#team_discount');
        var team_discount = parseFloat(dom.val());
        dom.attr('value', team_discount);


        var team_totalBox = $('#team_total');
        var team_discount_amountBox = $('#team_discount_amount');
        var team_net_amountBox = $('#team_net_amount');

        var team_total = (team_charge * team_unit);
        var team_discount_amount = ( team_total / 100) * team_discount;
        var team_net_amount = team_total - team_discount_amount;

        team_totalBox.attr("value", team_total);
        team_discount_amountBox.attr("value", team_discount_amount);
        team_net_amountBox.attr("value", team_net_amount);

        // other
        dom = $('#other_charge');
        var other_charge = parseFloat(dom.val());
        dom.attr('value', other_charge);

        dom = $('#other_unit');
        var other_unit = parseFloat(dom.val());
        dom.attr('value', other_unit);

        dom = $('#other_discount');
        var other_discount = parseFloat(dom.val());
        dom.attr('value', other_discount);


        var other_totalBox = $('#other_total');
        var other_discount_amountBox = $('#other_discount_amount');
        var other_net_amountBox = $('#other_net_amount');

        var other_total = (other_charge * other_unit);
        var other_discount_amount = ( other_total / 100) * other_discount;
        var other_net_amount = other_total - other_discount_amount;

        other_totalBox.attr("value", other_total);
        other_discount_amountBox.attr("value", other_discount_amount);
        other_net_amountBox.attr("value", other_net_amount);

        // final total amount
        var total = admission_net_amount + room_net_amount + food_net_amount + service_net_amount + team_net_amount + other_net_amount;

        $('#total').html(total);
        $('#net_total').attr('value', total);
    }


    function printDiv(print) {
        var printContents = document.getElementById(print).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }


</script>
</div>


</body>
</html>
