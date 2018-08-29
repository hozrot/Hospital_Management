<?php
include '../include/permission.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "INSERT INTO patient_medicine (patient_id,issue_date,medicine_bill) 
            VALUES ( '$_POST[patient_id]',
                     '". date('Y-m-d') ."',
                     '$_POST[net_amount]' )";
    mysqli_query($con, $sql);

    header('Location: view-patient.php');
}
?>

<html>
<head>
    <title>Medicine Bill</title>
    <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">

    <script src="../include/js/jquery.js"></script>
    <script src="../include/bootstrap/js/bootstrap.js"></script>
    <style type="text/css">
        .inputs {
            width: 70px;
            text-align: center;
        }
    </style>
</head>

<body>
<?php include '../include/header.php'; ?>
<div style="width:50px;height:60px;"></div>
<?php include '../include/sidebar.php'; ?>


<div class="col-lg-10" id="print">

    <div class="row">
        <div class="panel panel-danger panel-responsive">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Medicine Bill</h4>

            </div>

            <div class="panel-body">
                <form action="medicine-bill.php" method="post">
                    <input type="text" name="patient_id" value="<?php echo $_GET['patient_id']; ?>" hidden>
                    <!-- office staff id will be from : <?php //echo $_SESSION['office_staff_id'] ?> -->
                    <input type="text" name="office_staff_id" value="1" hidden>
                    <div class="form-group">
                        <label for="date"> Billing Date </label>
                        <div class='input-group date' id='datetimepicker1'>
<!--                            <input type="text" name="issue_date" id="date" class="datepicker form-control" required>-->
<!--                            <span class="input-group-addon">-->
<!--                                <span class="glyphicon glyphicon-calendar"></span>-->
<!--                            </span>-->
                            <?php echo date('d-m-Y'); ?>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        Sl
                                    </th>
                                    <th class="text-center">
                                        Medicine name
                                    </th>
                                    <th class="text-center">
                                        MRP
                                    </th>
                                    <th class="text-center">
                                        Issued
                                    </th>
                                    <th class="text-center">
                                        Returned
                                    </th>
                                    <th class="text-center">
                                        Sold
                                    </th>
                                    <th class="text-center">
                                        Total price
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
                                    <th class="text-center">

                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT m.medicine_id, m.medicine_name, m.medicine_price, i.patient_id, sum(i.quantity) as 'issued' FROM medicine as m join issued_medicine as i on (m.medicine_id=i.medicine_id) GROUP by i.patient_id, m.medicine_id having i.patient_id = " . $_GET['patient_id'];
                                $result = mysqli_query($con, $sql);
                                $sl = 1;
                                $netAmount = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $amount = $row['medicine_price'] * $row['issued'];
                                    $netAmount += $amount;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl;
                                            $sl++; ?></td>
                                        <td><?php echo $row['medicine_name']; ?></td>
                                        <td><input class="inputs" type="text"
                                                   value="<?php echo $row['medicine_price']; ?>"
                                                   name="price_<?php echo $row['medicine_id']; ?>"
                                                   id="price_<?php echo $row['medicine_id']; ?>" readonly></td>
                                        <td>
                                            <input class="inputs" type="text" value="<?php echo $row['issued']; ?>"
                                                   name="issued_<?php echo $row['medicine_id']; ?>"
                                                   id="issued_<?php echo $row['medicine_id']; ?>" readonly>
                                        </td>
                                        <td>
                                            <input class="inputs" type="text" value="0"
                                                   name="returned_<?php echo $row['medicine_id']; ?>"
                                                   id="returned_<?php echo $row['medicine_id']; ?>"
                                                   onkeyup="calculateResult(this)">
                                        </td>
                                        <td>
                                            <input class="inputs" type="text" value="<?php echo $row['issued']; ?>"
                                                   name="sold_<?php echo $row['medicine_id']; ?>"
                                                   id="sold_<?php echo $row['medicine_id']; ?>" readonly>
                                        </td>
                                        <td>
                                            <input class="inputs" type="text" value="<?php echo $amount; ?>"
                                                   name="total_<?php echo $row['medicine_id']; ?>"
                                                   id="total_<?php echo $row['medicine_id']; ?>" readonly">
                                        </td>
                                        <td>
                                            <input class="inputs" type="text" value="0"
                                                   name="discount_<?php echo $row['medicine_id']; ?>"
                                                   id="discount_<?php echo $row['medicine_id']; ?>"
                                                   onkeyup="calculateResult(this)">
                                        </td>
                                        <td>
                                            <input class="inputs" type="text" value="0"
                                                   name="discountAmount_<?php echo $row['medicine_id']; ?>"
                                                   id="discountAmount_<?php echo $row['medicine_id']; ?>" readonly>
                                        </td>
                                        <td>
                                            <input class="inputs netAmountInputs" type="text"
                                                   value="<?php echo $amount; ?>"
                                                   name="netAmount_<?php echo $row['medicine_id']; ?>"
                                                   id="netAmount_<?php echo $row['medicine_id']; ?>" readonly>
                                        </td>
                                        <td>
                                            <input class="inputs" type="text" value="<?php echo $row['medicine_id']; ?>"
                                                   name="medicine_id[]" hidden>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <div class="form-group pull-right">
                            <label for="net_amount"> Net Total </label>
                            <input type="text" value="<?php echo $netAmount; ?>" name="net_amount" id="net_amount"
                                   readonly="readonly">
                        </div>

                        <div class="form-group">
                            <label for="submit"> </label>
                            <input id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
                        </div>


                    </div>

                </form>
                <!-- Print Button code and Script start  -->
                <center>
                    <button class="btn btn-primary hidden-print" onclick="printDiv('print')"><span
                                class="glyphicon glyphicon-print" aria-hidden="true"></span> Print
                    </button>
                </center>

                <!-- End Print Code  -->
            </div>
        </div>
    </div>
</div>

<!--       <!--  <script src="../include/bootstrap/DataTables/js/jquery.js"></script> -->-->
<!--        <script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>-->
<!--        <script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>-->
<script>

    function calculateResult(element) {
        var id = element.id.substring(element.id.search("_") + 1);
        var issued = $('#issued_' + id).val();
        var returned = $('#returned_' + id).val();
        $('#returned_' + id).attr('value', returned);
        var price = $('#price_' + id).val();
        var discount = $('#discount_' + id).val();
        $('#discount_' + id).attr('value', discount);


        var soldBox = $('#sold_' + id);
        var totalBox = $('#total_' + id);
        var discountAmountBox = $('#discountAmount_' + id);
        var netAmountBox = $('#netAmount_' + id);

        var sold_items = (issued - returned);
        var total_price = sold_items * price;
        var discount_amount = ( total_price / 100) * discount;
        var net_amount = total_price - discount_amount;


        soldBox.attr("value", sold_items);
        totalBox.attr("value", total_price);
        discountAmountBox.attr("value", discount_amount);
        netAmountBox.attr("value", net_amount);

        updateNetAmount();

    }

    function updateNetAmount() {
        var netAmountBoxes = $('.netAmountInputs');
        var lenght = netAmountBoxes.length;
        var total = 0;
        for (var i = 0; i < lenght; i++) {
            total += parseFloat(netAmountBoxes[i].value);
        }
        $('#net_amount').attr("value", total);
    }

    function printDiv(print) {
        var printContents = document.getElementById(print).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

</script>


</body>

</html>