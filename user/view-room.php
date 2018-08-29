<?php
include '../include/permission.php';
if(isset($_GET['action']) && isset($_GET['status']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $status = $_GET['status'];
    $id = $_GET['id'];
    $msg = "";
    if($action == 'change') {
        $sql = "UPDATE room SET status = ";
        $sql .= ($status == 'Booked') ? "'Available'" : "'Booked'";
        $sql .= " WHERE room_id = " . $id;

        $res = mysqli_query($con, $sql);
        if(!$res) {
            $msg = "Error: " . mysqli_error($con);
        }
        else {
            $msg = "Successfully Changed Status";
        }
    }
}

if (isset($_POST['modal_submit'])) {

            $id = $_POST['modal_room_id'];
            $sql = "UPDATE room
                                    SET room_no='$_POST[room_no]',
                                        category='$_POST[category]',
                                        description='$_POST[description]',
                                        price='$_POST[price]',
                                        status='$_POST[status]'
                                        
                                        
                                    WHERE room_id ='" . $id . "';
                                  ";
            mysqli_query($con, $sql);
            if (mysqli_query($con, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($con);
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
        <section class="content-header">
            <div class="btn-group pull-right">

                <a href="#" class="btn btn-default btn-md"><span class="fa fa-asterisk"></span> Setting</a>
            </div>
            <ol class="breadcrumb ">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active"><a href="add-room.php"><i class="fa fa-wheelchair"></i>Create room</a></li>

            </ol>

        </section>

    </div>    <!-- start and endof page title header-->
</div>

<div class="col-lg-10">
    <?php if(isset($msg)) {?>
        <div class="alert alert-info alert-dismissable">
            <?php echo $msg; ?>
        </div>
    <?php } ?>
</div>

<div class="col-lg-10">
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-danger panel-responsive">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Rooms</h4>
                            <div class="btn-group pull-right">

                                <a href="add-room.php" class="btn btn-default"> Create</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="box">
                                <div class="box-body">
                                    <table class="table table_striped table_hover table_bordered" id="mydata">
                                        <thead>
                                        <tr>
                                            <th>Room no.</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             $sql = "SELECT * FROM room ORDER BY room_no ASC";
                                             $res = mysqli_query($con, $sql);
                                             while($room = mysqli_fetch_assoc($res)) {
                                                 echo "<tr>";
                                                 echo "<td>$room[room_no]</td>";
                                                 echo "<td>$room[category]</td>";
                                                 echo "<td>$room[price]</td>";
                                                 echo "<td>$room[status]</td>";
                                                 echo "<td>
                                                 
                                                 <button type=\"button\" class=\"btn btn-info view_medicine\" onclick=\"buttonClicked(this)\" data-toggle=\"modal\" id=\"' + row[0] + '\" data-target=\"#myModal\">View</button>
                                                 <a href=\"?action=change&status=$room[status]&id=$room[room_id]\" class=\"btn btn-warning\">Change Status</a></td>";
                                                 echo "</tr>";
                                             }
                                        ?>
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
                            <h4 class="modal-panel"> View Information
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> X </button>

                            </h4>
                        </div>
                        <div class="panel-body">

                            <div class="modal-body">
                                <form class="form-horizontal" enctype="multipart/form-data" action="view-medicine.php"
                                      method="post">
                                    <input type="hidden" name="modal_room_id" id="modal_room_id">
                                    <div class="form-group">
                                        <label for="room_no"> Room no </label>
                                        <input id="modal_room_no" type="text" name="room_no" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="category"> Category </label>
                                        <input id="modal_category" type="text" name="category" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description"> Description </label>
                                        <textarea id="modal_description" type="text" name="description" rows="3 "
                                                  class="form-control"> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price"> Price </label>
                                        <input id="modal_price" type="text" name="price" class="form-control">
                                    </div>
                                    
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


     <script type="text/javascript">
        function showData(data) {
            //console.log((data));
            $('#modal_room_id').val(data['room_id']);
            $('#modal_room_no').val(data['room_no']);
            $('#modal_category').val(data['category']);
            $('#modal_description').val(data['description']);
            $('#modal_price').val(data['price']);

        }
        function buttonClicked(element) {
            var attr_id = element.getAttribute("id");
            //console.log("Clicked: " + attr_id);
            $.getJSON('update/room.php', {id: attr_id}, showData);

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
//            "ajax": "response/room_response.php",
//            "columnDefs": [
//                {
//                    "targets": 0,
//                    "visible": false,
//                    "searchable": false
//                },
//                {
//                    "targets": 5,
//                    "render": function (data, type, row, meta) {
//                        return '>';
//                    }
//                }
//            ]
//        });
//    });

</script>

<footer></footer>
</body>

</html>