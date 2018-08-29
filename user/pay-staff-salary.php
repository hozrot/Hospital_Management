<?php 
include '../include/permission.php';

$office_staff_id = 0;
$staff_name = "";
$staff_designation = "";
$staff_phone = "";
$salary_amount = 0.0;

function find_staff_info($id)
{
    global $con, $staff_name, $staff_designation, $staff_phone, $salary_amount;

    $query = "SELECT * FROM office_staff WHERE office_staff_id = " . $id;
    $result = mysqli_query($con, $query);
    if(!$result) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        if($row = mysqli_fetch_assoc($result)) {
            $staff_name = $row['staff_name'];
            $staff_designation = $row['designation'];
            $staff_phone = $row['phone'];
            $salary_amount = $row['salary'];
        }
        else {
            die('Invalid Staff ID!');
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['office_staff_id'])) {
        $office_staff_id = $_GET['office_staff_id'];
        find_staff_info($office_staff_id);
    }
    else {
        die('ERROR, TODO: Implement Redirection');
    }
}

else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $office_staff_id = $_POST['office_staff_id'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    if($amount <= 0 || !is_numeric($amount)) {
        $error = "Amount must be a decimal value greater than ZERO!";
        find_staff_info($office_staff_id);
    } else {
        $query = "INSERT INTO staff_salary(office_staff_id, amount, salary_category, payment_date) VALUES ( ";
        $query .= $office_staff_id . ", ";
        $query .= $amount . ", ";
        $query .= $category . ", ";
        $query .= "'" . date('d-m-Y') . "' ) ";

        $result = mysqli_query($con, $query);
        if(!$result) {
            die('Error: '. mysqli_error($con));
        }
        else {
            // success
            // redirect to previous page
        }
        header('Location:view-office-staff.php');
    }
}
?>

<html>
<head>
        <title>Admin Panel</title>
         <link rel="stylesheet" href="../include/bootstrap/css/bootstrap.css">
        <script src="../include/js/jquery.js"></script>
        <script src="../include/bootstrap/js/bootstrap.js"></script>
        <script>
        $(function(){
            $('.datepicker').datepicker();
        });

    </script>
        
    </head>
    <body>
         <?php include 'include/header.php';?>
        <div style="width:50px;height:60px;"></div>
        <?php include 'include/sidebar.php';?>

<div class="col-lg-8">
    <?php if(isset($error)) { ?>
        <div class="alert alert-danger alert-dismissable">
            <p><?php echo $error;?></p>
        </div>
    <?php } ?>
    <div class="panel-group">
        <div class="panel panel-success">
            <div class="panel-heading">Pay Salary For</div>
            <div class="panel-body">
                <p>Name: <?php echo $staff_name; ?></p>
                <p>Designation: <?php echo $staff_designation; ?></p>
                <p>Phone: <?php echo $staff_phone; ?></p>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Salary Information</div>
            <div class="panel-body">
                <form method="POST">
                    <input name="office_staff_id" id="office_staff_id" hidden value="<?php echo $office_staff_id; ?>" />
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="1">Salary</option>
                            <option value="2">Overtime</option>
                            <option value="3">Bonus</option>
                            <option value="4">Advance</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" id="amount" placeholder="Payment Amount" readonly value="<?php echo $salary_amount; ?>" class="form-control" required>
                    </div>
                        <input type="submit" class="btn btn-primary pull-right" value="Pay" />

                </form>
            </div>
        </div>
    </div>
</div> <!--/.col-lg-8-->

<script>
    $(window).load(function () {
        $('#category').change(function () {
            var amount_input = $('#amount');
            if(this.value == 1) {
                amount_input.val(<?php echo $salary_amount; ?>);
                amount_input.prop('readonly', true);
            }
            else {
                amount_input.prop('readonly', false);
            }
        });
    });
</script>

<footer></footer>
</body>

</html>