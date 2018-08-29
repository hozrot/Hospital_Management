<?php
include '../include/permission.php';
?>

<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
    <script src="../include/js/jquery.js"></script>
    <script src="../include/bootstrap/js/bootstrap.js"></script>

</head>
<body>
<?php include '../include/header.php'; ?>
<div style="width:50px;height:60px;"></div>
<?php include '../include/sidebar.php'; ?>


<div class="col-lg-10"
">
<div class="page-header">
    <section class="content-header">
        <div class="btn-group">

            <a href="#" class="btn btn-info btn-md"><span class="fa fa-asterisk"></span>Today</a>
        </div>


        <div class="btn-group">

            <a href="#" class="btn btn-info btn-md"><span class="fa fa-asterisk"></span> This Month</a>

        </div>


    </section>

</div>    <!-- start and endof page title header-->
</div>
<div class="col-lg-10" id="print">
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-danger panel-responsive">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title pull-left" style="padding-top: 7.5px;">All Patient Bill</h4>

                        </div>
                        <div class="panel panel-danger panel-responsive">

                            <div class="panel-body">
                                <table class="table table-hover ">
                                    <thead>

                                    <th>Patient Name</th>
                                    <th>Medicine Bill</th>
                                    <th>Hospital Bill</th>
                                    <th>Test Bill</th>
                                    <th>Total</th>


                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT p.patient_name, ifnull(pm.medicine_bill,0) as medicine_bill, ifnull(hb.total_bill,0) as hospital_bill, ifnull(tb.total_bill,0) as test_bill, (ifnull(pm.medicine_bill,0) + ifnull(hb.total_bill,0) + ifnull(tb.total_bill,0)) as total_bill ";
                                    $sql .= "FROM patient as p LEFT JOIN patient_medicine as pm ON(p.patient_id=pm.patient_id) LEFT JOIN hospital_bill as hb ";
                                    $sql .= "ON (p.patient_id = hb.patient_id)LEFT JOIN test_bill as tb ON (p.patient_id = tb.patient_id)";
                                    // SELECT p.patient_name, pm.medicine_bill, hb.total_bill as hospital_bill, tb.total_bill as test_bill FROM patient as p  JOIN patient_medicine as pm ON(p.patient_id=pm.patient_id)  JOIN hospital_bill as hb ON (p.patient_id = hb.patient_id)  JOIN test_bill as tb ON (p.patient_id = tb.patient_id)
                                    $result = mysqli_query($con, $sql);
                                    $total = 0;
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['total_bill'] == 0) continue;
                                            $total += $row['total_bill'];
                                            echo "<tr><td>$row[patient_name]</td><td>$row[medicine_bill]</td><td>$row[hospital_bill]</td><td>$row[test_bill]</td><td>$row[total_bill]</td></tr>";
                                        }
                                    } else {
                                        die('Error: ' . mysqli_error($con));
                                    }

                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th><?php echo $total; ?></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


        </section>
    </div>
</div>


<footer>
    <center>
        <button class="btn btn-primary hidden-print" onclick="printDiv('print')"><span class="glyphicon glyphicon-print"
                                                                                       aria-hidden="true"></span> Print
        </button>
    </center>
    <script type="text/javascript">
        function printDiv(print) {
            var printContents = document.getElementById(print).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</footer>
</body>

</html>