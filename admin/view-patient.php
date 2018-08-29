<?php
include '../include/permission.php';
if (isset($_GET['action']) && isset($_GET['patient_id'])) {
    if ($_GET['action'] == 'release') {
        $id = $_GET['patient_id'];

        $sql = "UPDATE patient SET status = 'Released' WHERE patient_id = " . $id;
        if (!mysqli_query($con, $sql)) {
            die("Error: " . mysqli_errno($con));
        }
    }
}
if (isset($_POST['modal_submit'])) {

    $id = $_POST['modal_patient_id'];
    $sql = "UPDATE patient
                                    SET  patient_name = '$_POST[name]', 
                                         doctor_name = '$_POST[doctor_name]',
                                         phone       = '$_POST[phone]',
                                         age = '$_POST[age]',
                                         admission_date = '$_POST[admission_date]',
                                         room_no= '$_POST[room_no]',
                                         occupation='$_POST[occupation]',
                                         reference='$_POST[reference]',
                                         address     = '$_POST[address]',
                                         gender      = '$_POST[gender]',
                                         blood_group = '$_POST[blood_group]'
                                          WHERE patient_id ='" . $id . "';
                                  ";
    mysqli_query($con, $sql);
}?>

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
        <section class="content-header">
            <div class="btn-group pull-right">

                <a href="#" class="btn btn-default btn-md"><span class="fa fa-asterisk"></span> Setting</a>
            </div>
            <ol class="breadcrumb ">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> InPatient</li>
                <li class="active"><a href="add-patient.php"><i class="fa fa-wheelchair"></i>Create Patient</a></li>

            </ol>

        </section>

    </div>    <!-- start and endof page title header-->
</div>
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
                            <div class="box">
                                <div class="box-body">
                                    <table class="table table_striped table_hover table_bordered" id="mydata">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Admission Date</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Room no.</th>
                                            <th>Blood Group</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sql = "SELECT * FROM patient WHERE status = 'Admitted'";
                                        $res = mysqli_query($con, $sql);
                                        while($row = mysqli_fetch_assoc($res)) {
                                            $id = $row['patient_id'];
                                            $name = $row['patient_name'];
                                            $doc_name = $row['doctor_name'];
                                            $date = $row['admission_date'];
                                            $phone = $row['phone'];
                                            $room = $row['room_no'];
                                            $status = $row['status'];
                                            $blood = $row['blood_group'];

                                            $is_medicine_bill_paid = false;
                                            $is_hospital_bill_paid = false;
                                            $is_test_bill_paid = false;

                                            // queries for medicine bill
                                            $query = "SELECT patient_id FROM patient_medicine where(patient_id = $id)";
                                            $q_result = mysqli_query($con, $query);
                                            $q_val = mysqli_fetch_assoc($q_result);
                                            if (!$q_result) die("ERROR " . mysqli_error($con));

                                            if (isset($q_val['patient_id']) && $q_val['patient_id'] > 0) $is_medicine_bill_paid = true;

                                            // queries for hospital bill
                                            $query = "SELECT patient_id FROM hospital_bill where(patient_id = $id)";
                                            $q_result = mysqli_query($con, $query);
                                            $q_val = mysqli_fetch_assoc($q_result);
                                            if (!$q_result) die("ERROR " . mysqli_error($con));

                                            if (isset($q_val['patient_id']) && $q_val['patient_id'] > 0) $is_hospital_bill_paid = true;


                                            // queries for test bill
                                            $query = "SELECT patient_id FROM test_bill where(patient_id = $id)";
                                            $q_result = mysqli_query($con, $query);
                                            $q_val = mysqli_fetch_assoc($q_result);
                                            if (!$q_result) die("ERROR " . mysqli_error($con));

                                            if (isset($q_val['patient_id']) && $q_val['patient_id'] > 0) $is_test_bill_paid = true;
                                            echo "<tr>
                                                <td>$id</td>
                                                <td>$date</td>
                                                <td>$name</td>
                                                <td>$phone</td>
                                                <td>$room</td>
                                                <td>$blood</td>
                                                <td>$status</td>
                                                <td>
                                                    <button type=\"button\" class=\"btn btn-info view_patient\" onclick=\"buttonClicked(this)\" data-toggle=\"modal\" id=\"$id\" data-target=\"#myModal\">View</button>";
                                            if(!$is_medicine_bill_paid)
                                                    echo "<a href=\"add-medicine-bill.php?patient_id=$id\"class=\"btn btn-info\" " .(($is_medicine_bill_paid) ? "disabled" : "") . "> Add Medicine </a>";
                                            if(!$is_medicine_bill_paid)
                                                    echo "<a href=\"medicine-bill.php?patient_id=$id\" class=\"btn btn-info\" " .(($is_medicine_bill_paid) ? "disabled" : "") . ">Medicine Bill</a>";
                                            if(!$is_hospital_bill_paid)
                                                    echo "<a href=\"hospital-bill.php?patient_id=$id\" class=\"btn btn-info\" " .(($is_hospital_bill_paid) ? "disabled" : "") . " >Hospital bill</a>";
                                             if(!$is_test_bill_paid)
                                                 echo "<a href=\"testbill.php?patient_id=$id\" class=\"btn btn-info\">Test bill</a>";
                                             echo "<a href=\"?action=release&patient_id=$id\" class=\"btn btn-danger\">Release</a>
                                                </td>
                                            </tr>";
                                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="modal-panel"> Patient Information
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X</button>

                    </h4>
                </div>
                <div class="panel-body">
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" action="view-patient.php"
                              method="post">
                            <input type="hidden" name="modal_patient_id" id="modal_patient_id">
                            <div class="form-group">
                                <label for="name"> Name </label>
                                <input id="modal_name" type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name"> Doctor Name </label>
                                <select id="modal_doctor_name" name="doctor_name" class="form-control" required>
                                    <?php
                                    $sql = "SELECT * FROM doctor ";
                                    $run_sql = mysqli_query($con, $sql);
                                    echo "<option > Select Doctor </option>";
                                    while ($rows = mysqli_fetch_array($run_sql)) {
                                        $doctor_name = $rows['doctor_name'];
                                        echo "<option > {$doctor_name}</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address"> Address </label>
                                <textarea id="modal_address" type="text" name="address" class="form-control" rows="2"
                                          required> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="blood_group"> Blood group </label>
                                <select class="form-control" id="modal_blood_group" name="blood_group">
                                    <option>Select from below</option>
                                    <option>A+</option>
                                    <option>B+</option>
                                    <option>AB+</option>
                                    <option>O+</option>
                                    <option>A-</option>
                                    <option>B-</option>
                                    <option>AB-</option>
                                    <option>O-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="age"> Age </label>
                                <input id="modal_age" type="input" name="age" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="admission_date"> Date Of Admission </label>
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type="text" name="admission_date" id="date" class="datepicker form-control">
                                    <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" id="modal_male" required> Male
                                    </label>

                                    <label class="radio-inline">
                                        <input type="radio" name="gender" id="modal_female" required> Female
                                    </label>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="phone"> Phone </label>
                                <input id="modal_phone" value="+8801" type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="room_no"> Room no </label>
                                <select id="modal_room_no" name="room_no" class="form-control" required>
                                    <?php
                                    $sql = "SELECT * FROM room ";
                                    $run_sql = mysqli_query($con, $sql);
                                    echo "<option > Select room </option>";
                                    while ($rows = mysqli_fetch_array($run_sql)) {
                                        $room_no = $rows['room_no'];
                                        echo "<option > {$room_no}</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="occupation"> Occupation </label>
                                <select id="modal_occupation" name="occupation" class="form-control" required>
                                    <option>none</option>
                                    <option>Sericeholder</option>
                                    <option>Housewife</option>
                                    <option>Student</option>
                                    <option>Farmer</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reference"> Reference </label>
                                <input id="modal_reference" type="text" name="reference" class="form-control" required>
                            </div>

                            <!--   <div class="form-group">
                                   <label for="status"> Patient Status </label>
                                     <select id="modal_status" name="status"  class="form-control" required>

                                       <option>Admitted </option>
                                       <option>Released </option>


                                      </select>
                               </div> -->

                            <div class="form-group">
                                <label for="submit"> </label>
                                <input id="modal_submit" type="submit" name="modal_submit" value="Update"
                                       class="btn btn-success">
                            </div>


                        </form>
                    </div><!-- end modal-body -->

                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                    </div><!-- end modal-footer -->
                </div><!-- end panel-body -->
            </div><!-- end panel -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end myModal -->
<!-- script for showing modala data from the database -->

<script type="text/javascript">
    function showData(data) {
        //console.log((data));
        $('#modal_patient_id').val(data['patient_id']);
        $('#modal_name').val(data['patient_name']);
        $('#modal_doctor_name').val(data['doctor_name']);
        $('#modal_phone').val(data['phone']);
        $('#modal_age').val(data['age']);
        $('#date').val(data['admission_date']);
        $('#modal_room_no').val(data['room_no']);
        $('#modal_occupation').val(data['occupation']);
        $('#modal_reference').val(data['reference']);
        $('#modal_patient_type').val(data['patient_type']);
        $('#modal_address').val(data['address']);

        $('#modal_male').val(data['gender']);
        $('#modal_female').val(data['gender']);
        $('#modal_status').val(data['status']);
        $('#modal_blood_group').val(data['blood_group']);


    }
    function buttonClicked(element) {
        var attr_id = element.getAttribute("id");
        //console.log("Clicked: " + attr_id);
        $.getJSON('update/patient.php', {id: attr_id}, showData);

    }
</script>

<script src="../include/bootstrap/DataTables/js/jquery.js"></script>
<script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" language="javascript" class="init">

//    $(document).ready(function () {
//        $('#mydata').dataTable({
//            "aProcessing": true,
//            "aServerSide": true,
//            "ajax": "response/patient.php",
//            "oSearch": {
//                "sSearch": "Admitted"
//            },
//            "columnDefs": [
//                {
//                    "targets": 0,
//                    "visible": false,
//                    "searchable": false
//                },
//                {
//                    "targets": 7,
//                    "render": function (data, type, row, meta) {
//                        return '<button type="button" class="btn btn-info view_patient" onclick="buttonClicked(this)" data-toggle="modal" id="' + row[0] + '" data-target="#myModal">View</button>' +
//                            '<a href="add-medicine-bill.php?patient_id=' + row[0] + '"class="btn btn-info"' + ((row[5] == "Released") ? 'disabled' : '') + ' > Add Medicine </a> ' +
//                            '<a href="medicine-bill.php?patient_id=' + row[0] + '"class="btn btn-info"' + ((row[5] == "Released") ? 'disabled' : '') + ' >Medicine Bill</a>' +
//                            '<a href="hospital-bill.php?patient_id=' + row[0] + '"class="btn btn-info"' + ((row[5] == "Released") ? 'disabled' : '') + '>Hospital bill</a>' +
//                            '<a href="testbill.php?patient_id=' + row[0] + '"class="btn btn-info"' + ((row[5] == "Released") ? 'disabled' : '') + '>Test bill</a>' +
//                            '<a href="?action=release&patient_id=' + row[0] + '"class="btn btn-danger"' + ((row[5] == "Released") ? 'disabled' : '') + '>Release</a>'
//                            ;
//                    }
//                }
//            ]
//        });
//    });

</script>


<footer></footer>
</body>

</html>