<?php
include '../include/permission.php';

if(isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
    // find doctors' salaries
    $sql = "SELECT doctor_salary.payment_date, doctor.doctor_name, doctor.designation, doctor_salary.amount ";
    $sql .= "FROM doctor JOIN doctor_salary ON doctor.doctor_id = doctor_salary.doctor_id ";
    $sql .= "WHERE MONTH(doctor_salary.payment_date)=$month AND YEAR(doctor_salary.payment_date)=$year";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('Error : ' . mysqli_error($con));
    }

    $doctors = array();
    while($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }

    // find staffs' salaries
    $sql = "SELECT staff_salary.payment_date, office_staff.staff_name, office_staff.designation, staff_salary.amount ";
    $sql .= "FROM office_staff JOIN staff_salary ON office_staff.office_staff_id = staff_salary.office_staff_id ";
    $sql .= "WHERE MONTH(staff_salary.payment_date)=$month AND YEAR(staff_salary.payment_date)=$year";

    $result = mysqli_query($con, $sql);
    if(!$result) {
        die('Error : ' . mysqli_error($con));
    }

    $staffs = array();
    while($row = mysqli_fetch_assoc($result)) {
        $staffs[] = $row;
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
<?php include '../include/header.php'; ?>
<div style="width:50px;height:60px;"></div>
<?php include '../include/sidebar.php'; ?>



<div class="col-lg-10">
    <div class="page-header">
        <h4>Salary Expense</h4>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
            Select Month: <select name="month">
                <?php for($m = 1; $m <= 12; $m++) {
                    $dateObj   = DateTime::createFromFormat('!m', $m);
                    $monthName = $dateObj->format('F');
                ?>
                    <option value="<?php echo $m; ?>" <?php if(isset($month) && $month == $m) echo "selected"; ?> ><?php echo $monthName; ?></option>
                <?php } ?>
            </select>

            Select Year <select name="year">
                <?php $base_year = 2017; $current_year = date('Y'); for($y = $base_year; $y <= $current_year; $y++) {
                    ?>
                    <option value="<?php echo $y; ?>" <?php if(isset($year) && $year == $y) echo "selected"; ?> ><?php echo $y; ?></option>
                <?php } ?>
            </select>
            <input class="btn btn-primary" type="submit" value="Show Result" >
        </form>
    </div>    <!-- start and endof page title header-->
</div>

<?php if(isset($month) && isset($year)) {?>
<div class="col-lg-10">
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-danger panel-responsive">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Doctors' Salary Expense</h4>
                        </div>
                        <div class="panel-body">
                            <div class="box">
                                <div class="box-body">
                                    <table class="table table_striped table_hover table_bordered" id="mydata"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total_doctor_salary = 0;
                                        foreach ($doctors as $doctor) {?>
                                            <tr>
                                                <td>
                                                    <?php echo $doctor['payment_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $doctor['doctor_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $doctor['designation']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $doctor['amount']; $total_doctor_salary += $doctor['amount']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th><?php echo $total_doctor_salary; ?></th>
                                        </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-danger panel-responsive">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Staffs' Salary Expense</h4>
                        </div>
                        <div class="panel-body">
                            <div class="box">
                                <div class="box-body">
                                    <table class="table table_striped table_hover table_bordered" id="mydata"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        $total_staff_salary = 0;
                                        foreach ($staffs as $staff) {?>
                                            <tr>
                                                <td>
                                                    <?php echo $staff['payment_date']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $staff['staff_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $staff['designation']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $staff['amount']; $total_staff_salary += $staff['amount']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th><?php echo $total_staff_salary; ?></th>
                                        </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="panel panel-success panel-responsive">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title text-center" style="padding-top: 7.5px;">Total Salary Expense in
                    <?php echo $monthName; ?> </h4>
                </div>
                <div class="panel-body">
                    <div class="box text-center">
                        <strong>Total Doctor's Salary : <?php echo  $total_doctor_salary; ?></strong> <br><br>
                        <strong>Total Staff's Salary  : <?php echo  $total_staff_salary; ?></strong> <br><hr>
                        <strong>Total Salary Expense  : <?php echo  ($total_doctor_salary+$total_staff_salary); ?></strong>
                    </div>
                </div>
            </div>


        </section>
    </div>
</div>
<?php }?>

<script src="bootstrap/DataTables/js/jquery.js"></script>
<script src="bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
<script src="bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function () {
        $('#mydata').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            "ajax": "response/staff-salary.php",

            "columnDefs": [
                {
                    "targets": 0,
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": 5,
                    "render": function (data, type, row, meta) {
                        return '<a href="#"><button type="button" class="btn btn-info">View</button></a>';
                    }
                }
            ]
        });
    });

</script>


<footer></footer>
</body>

</html>