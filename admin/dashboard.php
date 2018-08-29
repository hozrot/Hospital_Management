<?php
include '../include/permission.php';
// For Chart Data

$M = array(
    1 => "Jan", 2=> "Feb", 3=>'Mar', 4=>'Apr', 5=>'May', 6=>'Jun', 7=>'Jul', 8=>'Aug',
    9=>'Sep', 10=>'Oct', 11=>'Nov', 12=>'Dec'
);
// total month
$tm = 6;
$current_year = date('Y') - 1;
$current_month = date('m');
$current_month -= $tm -1;
if($current_month < 1) $current_month += 12;


$from_month = $current_month > 12 ? 1 : $current_month;
$to_month = $current_month-1 ;

$from_year = $current_month == 1 ? $current_year + 1 : $current_year;

$months = array();
$q_months = array();
$patient_per_month = array();
$income_per_month = array();
$expense_per_month = array();

for ($i = 0; $i < 6; $i++) {
    if($current_month > 12) $current_month = 1;
    if ($current_month == 1) $current_year += 1;
    echo $current_month[$i]."\n";
    $months[] = $M[$current_month];// . " " . $current_year;

    // now query for data, patients per month
    $sql = "SELECT COUNT(patient_id) as total FROM patient ";
    $sql .= "WHERE month(admission_date) = ";
    $sql .= $current_month . " AND year(admission_date) = " . $current_year;
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);

    $patient_per_month[] = $row['total'];


    // now query data for income per month
    // 1. Medicine Bill
    $sql = "SELECT ifnull(SUM(medicine_bill),0) as total FROM patient_medicine WHERE month(issue_date) = $current_month AND year(issue_date) = $current_year";
    $res = mysqli_query($con, $sql);
    if(!$res) die('Error ' . mysqli_error($con));
    $row = mysqli_fetch_assoc($res);
    $income_per_month[] = $row['total'];

    // 2. Hospital Bill
    $sql = "SELECT ifnull(SUM(total_bill),0) as total FROM hospital_bill WHERE month(date) = $current_month AND year(date) = $current_year";
    $res = mysqli_query($con, $sql);
    if(!$res) die('Error ' . mysqli_error($con));
    $row = mysqli_fetch_assoc($res);
    $income_per_month[$i] += $row['total'];

    // 3. Test Bill
    $sql = "SELECT ifnull(SUM(total_bill),0) as total FROM test_bill WHERE month(date) = $current_month AND year(date) = $current_year";
    $res = mysqli_query($con, $sql);
    if(!$res) die('Error ' . mysqli_error($con));
    $row = mysqli_fetch_assoc($res);
    $income_per_month[$i] += $row['total'];


    // now query data for expense per month
    // 1. From Expense Table
    $sql = "SELECT ifnull(SUM(amount),0) as total FROM expense WHERE month(day) = $current_month AND year(day) = $current_year";
    $res = mysqli_query($con, $sql);
    if(!$res) die('Error ' . mysqli_error($con));
    $row = mysqli_fetch_assoc($res);
    $expense_per_month[] = $row['total'];

    // 2. Doctor's Salary
    $sql = "SELECT ifnull(SUM(amount),0) as total FROM doctor_salary WHERE month(payment_date) = $current_month AND year(payment_date) = $current_year";
    $res = mysqli_query($con, $sql);
    if(!$res) die('Error ' . mysqli_error($con));
    $row = mysqli_fetch_assoc($res);
    $expense_per_month[$i] += $row['total'];

    // 3. Staff's Salary
    $sql = "SELECT ifnull(SUM(amount),0) as total FROM staff_salary WHERE month(payment_date) = $current_month AND year(payment_date) = $current_year";
    $res = mysqli_query($con, $sql);
    if(!$res) die('Error ' . mysqli_error($con));
    $row = mysqli_fetch_assoc($res);
    $expense_per_month[$i] += $row['total'];

    // increment current month
    $current_month++;

}
$to_year = $current_year;
//print_r($months);
////print_r($income_per_month);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="../include/img/apple-icon.png"/>
    <link rel="icon" type="image/png" href="../include/img/favicon.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Sadman General Hospital</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="../include/css/bootstrap.min.css" rel="stylesheet"/>

    <!--  Material Dashboard CSS    -->
    <link href="../include/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="../include/css/demo.css" rel="stylesheet" /> -->

    <!--     Fonts and icons     -->
    <link href="..include/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet'
          type='text/css'> -->
    <link href='../include/css/material-font.css' rel='stylesheet' type='text/css'>
</head>

<body>
<?php include '../include/dashboard-sidebar.php'; ?>

<div class="main-panel">
    <?php include '../include/navbar.php'; ?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">security</i>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT * FROM doctor";
                            $run_sql = mysqli_query($con, $sql);
                            $total_doctor = mysqli_num_rows($run_sql);
                            ?>


                            <h4 class="category"> Doctor </h4>
                            <h3 class="title"><?php echo "$total_doctor"; ?> </small></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">reply</i> <a href="view-doctor.php">view doctor
                                    info...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">rowing</i>
                        </div>
                        <div class="card-content">

                            <?php

                            $sql = "SELECT * FROM office_staff";
                            $run_sql = mysqli_query($con, $sql);
                            $total_office_staff = mysqli_num_rows($run_sql);
                            ?>
                            <h4 class="category"> Office Staff </h4>
                            <h3 class="title"><?php echo "$total_office_staff"; ?> </small></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">reply</i> <a href="view-office-staff.php">view
                                    staff info...</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">bug_report</i>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT * FROM medicine";
                            $run_sql = mysqli_query($con, $sql);
                            $total_medicine = mysqli_num_rows($run_sql);
                            ?>
                            <h4 class="category"> Medicine</h4>

                            <h3 class="title"><?php echo "$total_medicine"; ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">reply</i> <a href="view-medicine.php">view
                                    medicine info...</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="card-content">
                            <?php

                            $sql = "SELECT * FROM room";
                            $run_sql = mysqli_query($con, $sql);
                            $total_room = mysqli_num_rows($run_sql);
                            ?>
                            <h4 class="category"> Rooms</h4>
                            <h3 class="title"><?php echo "$total_room"; ?></h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">reply</i> <a href="view-room.php">view room
                                    info...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="green">
                            <div class="ct-chart" id="patientsPerMonthChart"></div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Patients Per Month</h4>
                            <p class="category">
                                <?php echo $M[$from_month] . " " . $from_year . " - "  . $M[$to_month] . " " . $to_year; ?>
                            </p>
                        </div>
                      
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="orange">
                            <div class="ct-chart" id="incomePerMonthChart"></div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Income Per Month</h4>
                            <p class="category">
                                <?php echo $M[$from_month] . " " . $from_year . " - "  . $M[$to_month] . " " . $to_year; ?>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-chart" data-background-color="red">
                            <div class="ct-chart" id="expensePerMonthChart"></div>
                        </div>
                        <div class="card-content">
                            <h4 class="title">Expense Per Month</h4>
                            <p class="category">
                                <?php echo $M[$from_month] . " " . $from_year . " - "  . $M[$to_month] . " " . $to_year; ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="../logout.php">
                            log out
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <p class="copyright pull-right">
                &copy;
                <script>document.write(new Date().getFullYear())</script>
                <a href="#">Sadman General Hospital</a>, Get your Treatment with our <b>Hospitality</b> and <b>Care</b> 
            </p>
        </div>
    </footer>
</div>
</div>

</body>



<!--   Core JS Files   -->
<script src="../include/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="../include/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../include/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../include/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../include/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="../include/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../include/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        // Javascript method's body can be found in include/js/demos.js
        //demo.initDashboardPageCharts();

        /* ----------==========    Monthly Patient Chart initialization    ==========---------- */

        var dataPatientsPerMonth = {
            labels: <?php echo json_encode($months); ?>,
            series: [
                <?php echo json_encode($patient_per_month); ?>

            ]
        };
        var optionsPatientsPerMonth = {
            axisX: {
                showGrid: false
            },
            low: 0,
            high: <?php $mx = max($patient_per_month); echo ($mx + 10-($mx%10)); ?>,
            chartPadding: {top: 0, right: 5, bottom: 0, left: 0},
        };
        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];


        // Income Per Month
        var dataIncomePerMonth = {
            labels: <?php echo json_encode($months); ?>,
            series: [
                <?php echo json_encode($income_per_month); ?>

            ]
        };
        var optionsIncomePerMonth = {
            axisX: {
                showGrid: false
            },
            low: 0,
            axisY: {
                offset: 62
            },
            high: <?php $mx = max($income_per_month); echo ($mx + 10-($mx%10)); ?>,
            chartPadding: {top: 0, right: 5, bottom: 0, left: 0},
        };

        // Expense Per Month
        var dataExpensePerMonth = {
            labels: <?php echo json_encode($months); ?>,
            series: [
                <?php echo json_encode($expense_per_month); ?>

            ]
        };
        var optionsExpensePerMonth = {
            axisX: {
                showGrid: false
            },
            low: 0,
            axisY: {
                offset: 62
            },
            high: <?php $mx = max($expense_per_month); echo ($mx + 10-($mx%10)); ?>,
            chartPadding: {top: 0, right: 0, bottom: 0, left: 0},
        };



        // Patients Per Month Chart
        var patientsPerMonthChart = Chartist.Bar('#patientsPerMonthChart', dataPatientsPerMonth, optionsPatientsPerMonth);//, responsiveOptions);
        // Income Per Month Chart
        var incomePerMonthChart = Chartist.Bar('#incomePerMonthChart', dataIncomePerMonth, optionsIncomePerMonth);//, responsiveOptions);
        // Expense Per Month Chart
        var expensePerMonthChart = Chartist.Bar('#expensePerMonthChart', dataExpensePerMonth, optionsExpensePerMonth)//, responsiveOptions);

        // Start Animating The Charts
        md.startAnimationForBarChart(patientsPerMonthChart);
        md.startAnimationForBarChart(incomePerMonthChart);
        md.startAnimationForBarChart(expensePerMonthChart);




    });
</script>

</html>
