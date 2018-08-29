<?php
include '../include/permission.php';

// Modal to update database

 if (isset($_POST['modal_submit'])) {

            $id = $_POST['modal_medicine_id'];
            $sql = "UPDATE medicine
                                    SET medicine_name='$_POST[name]',
                                        company='$_POST[company]',
                                        description='$_POST[description]',
                                        medicine_price='$_POST[price]'
                                        
                                        
                                    WHERE medicine_id ='" . $id . "';
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

   <?php include '../include/header.php';?>
        <div style="width:50px;height:60px;"></div>
        <?php include '../include/sidebar.php';?>


    <div class="col-lg-10">
        <div class="page-header">
            <section class="content-header">
                
                <ol class="breadcrumb ">

                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                    <li class="active"><a href="add-medicine.php"><i class="fa fa-wheelchair"></i>Create new Medicine</a>
                    </li>

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
                                <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Medicine</h4>
                                <div class="btn-group pull-right">

                                    <a href="add-medicine.php" class="btn btn-default"> Create</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="box">
                                    <div class="box-body">
                                        <table class="table table_striped table_hover table_bordered" id="mydata">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Price </th>
                                                    <th>Company </th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
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
                                    <input type="hidden" name="modal_medicine_id" id="modal_medicine_id">
                                    <div class="form-group">
                                        <label for="name"> Medicine Name </label>
                                        <input id="modal_name" type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="company"> Company </label>
                                        <input id="modal_company" type="text" name="company" class="form-control">
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


<!-- script for showing modala data from the database -->

    <script type="text/javascript">
        function showData(data) {
            //console.log((data));
            $('#modal_medicine_id').val(data['medicine_id']);
            $('#modal_name').val(data['medicine_name']);
            $('#modal_company').val(data['company']);
            $('#modal_description').val(data['description']);
            $('#modal_price').val(data['medicine_price']);

        }
        function buttonClicked(element) {
            var attr_id = element.getAttribute("id");
            //console.log("Clicked: " + attr_id);
            $.getJSON('../update/medicine.php', {id: attr_id}, showData);

        }
    </script>

    <!-- scripts for the dataTable used  -->

        <script src="../include/bootstrap/DataTables/js/jquery.js"></script>
        <script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
        <script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>
        <script>
        $(document).ready(function () {
            $('#mydata').dataTable({
                "aProcessing": true,
                "aServerSide": true,
                "ajax": "response/medicine.php",
                "columnDefs": [
                    {
                        "targets": 0,
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": 5,
                        "render": function (data, type, row, meta) {
                            return '<button type="button" class="btn btn-info view_medicine" onclick="buttonClicked(this)" data-toggle="modal" id="' + row[0] + '" data-target="#myModal">View</button>';
                        }
                    }
                ]

            });
        });

    </script>

    <footer></footer>
</body>

</html>