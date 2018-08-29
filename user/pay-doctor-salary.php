<?php 
include '../include/permission.php';

$doc_id = 0;
$doc_name = "";
$doc_designation = "";
$doc_phone = "";
$visit_salary = 0.0;
$oncall_salary = 0.0;
$operation_salary = 0.0;

function find_doc_info($id)
{
    global $con, $doc_name, $doc_designation, $doc_phone, $visit_salary, $oncall_salary, $operation_salary;

    $query = "SELECT * FROM doctor WHERE doctor_id = " . $id;
    $result = mysqli_query($con, $query);
    if(!$result) {
        die('Error: ' . mysqli_error($con));
    }
    else {
        if($row = mysqli_fetch_assoc($result)) {
            $doc_name = $row['doctor_name'];
            $doc_designation = $row['designation'];
            $doc_phone = $row['phone'];
            $visit_salary = $row['visit_salary'];
            $oncall_salary = $row['oncall_salary'];
            $operation_salary = $row['operation_salary'];
        }
        else {
            die('Invalid Doctor ID!');
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['doctor_id'])) {
        $doc_id = $_GET['doctor_id'];
        find_doc_info($doc_id);
    }
    else {
        die('ERROR, TODO: Implement Redirection');
    }
}

else if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doc_id = $_POST['doctor_id'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    if($amount <= 0 || !is_numeric($amount)) {
        $error = "Amount must be a decimal value greater than ZERO!";
        find_doc_info($doc_id);
    } else {
        $query = "INSERT INTO doctor_salary(doctor_id, amount, salary_category, payment_date) VALUES ( ";
        $query .= $doc_id . ", ";
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
        header('Location:view-doctor.php');
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
                <p>Name: <?php echo $doc_name; ?></p>
                <p>Designation: <?php echo $doc_designation; ?></p>
                <p>Phone: <?php echo $doc_phone; ?></p>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">Salary Information</div>
            <div class="panel-body">
                <form method="POST" >
                    <input name="doctor_id" id="doctor_id" hidden value="<?php echo $doc_id; ?>" />
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="1">Visit Salary</option>
                            <option value="2">Oncall Salary</option>
                            <option value="3">Operation Salary</option>
                            <option value="4">Bonus</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" name="amount" id="amount" placeholder="Payment Amount" readonly value="<?php echo $visit_salary; ?>" class="form-control" required>
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
            // visit salary
            if(this.value == 1) {
                amount_input.val(<?php echo $visit_salary; ?>);
                amount_input.prop('readonly', true);
            }
            // oncall salary
            else if(this.value == 2) {
                amount_input.val(<?php echo $oncall_salary; ?>);
                amount_input.prop('readonly', true);
            }
            // operation salary
            else if(this.value == 3) {
                amount_input.val(<?php echo $operation_salary; ?>);
                amount_input.prop('readonly', true);
            }
            // Bonus
            else {
                amount_input.prop('readonly', false);
            }
        });
    });
</script>

<footer></footer>
</body>

</html>