<?php 
include '../include/permission.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_POST['patient_id'];
    $medicine_ids = $_POST['medicine_id'];

    // loop through each medicine
    foreach ($medicine_ids as $medicine_id) {
        $quantity = $_POST['issued_' . $medicine_id];
        if($quantity <= 0) {
            continue;
        }
        $sql = "INSERT INTO issued_medicine VALUES($medicine_id, $patient_id, $quantity)";
        mysqli_query($con, $sql);
    }
    // redirect
    header('Location: view-patient.php');
}
?>

<html>
<head>
        <title>Admin Panel</title>
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
        <?php include '../include/header.php';?>
        <div style="width:50px;height:60px;"></div>
        <?php include '../include/sidebar.php';?>


<div class="col-lg-10">

    <div class="row">
        <div class="panel panel-danger panel-responsive">
            <div class="panel-heading clearfix">
                <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Despensary</h4>

            </div>

            <div class="panel-body">
                <form action="add-medicine-bill.php" method="post">
                    <input type="text" name="patient_id" value="<?php echo $_GET['patient_id'];?>" hidden>
                    <!-- office staff id will be from : <?php //echo $_SESSION['office_staff_id'] ?> -->
                    <input type="text" name="office_staff_id" value="1" hidden>
                    

                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered table-hover" id="mydata">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        Sl
                                    </th>
                                    <th>
                                        Medicine name
                                    </th>
                                    <th >
                                        MRP
                                    </th>
                                    <th >
                                        Issued
                                    </th>
                                    <th>
                                        
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <div class="form-group">
                            <label for="submit"> </label>
                            <input id="submit" type="submit" name="submit" class="btn btn-success" value="submit">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

        <script src="../include/bootstrap/DataTables/js/jquery.js"></script>
        <script src="../include/bootstrap/DataTables/js/jquery.dataTables.min.js"></script>
        <script src="../include/bootstrap/DataTables/js/dataTables.bootstrap.min.js"></script>
        
            <script>
            $(document).ready(function () {
                var table  = $('#mydata').dataTable({
                    "aProcessing": true,
                    "aServerSide": true,
                    "ajax": "response/medicine.php",
                    "columnDefs": [
                        {
                            "targets": [0, 2, 3],
                            "searchable": false
                        },
                        {
                            "targets": 1,
                            "render": function (data, type, row, meta) {
                                return row[1];
                            }
                        },
                        {
                            "targets": 2,
                            "render": function (data, type, row, meta) {
                                return '<p id="price_' + row[0] + '">' + row[2] + '</p>';
                            }
                        },
                        {
                            //"name" : "issued",
                            "targets": 3,
                            "render": function (data, type, row, meta) {
                                // issued
                                return '<input class="inputs" type="text" value="0" name="issued_' + row[0] + '"  id="issued_' + row[0] + '" onKeyUp="calculateResult(this);">';
                            }
                        },
                        

                        {
                            "targets" : 4,
        //                    "visible" : false,
                            "searchable": false,
                            "render" : function (data, type, row, meta) {
                                return '<input type="text" name="medicine_id[]" value="' + row[0] + '" hidden>';
                            }
                        }


                    ],
                    "fnDrawCallback": function (oSettings) {
                        /* Need to redo the counters if filtered or sorted */
                        if (oSettings.bSorted || oSettings.bFiltered) {
                            for (var i = 0, iLen = oSettings.aiDisplay.length; i < iLen; i++) {
                                $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[i]].nTr).html(i + 1);
                            }
                        }
                    }

                    
                });

                table.on( 'search.dt', function (e, settings) {
                    updateNetAmount();
                } );

            });

                    function calculateResult(element) {
                        var id = element.id.substring(element.id.search("_") + 1);
                        var issued = $('#issued_' + id).val();
                        var returned = $('#returned_' + id).val();
                        var price = $('#price_' + id).text()
                        var discount = $('#discount_' + id).val();

                        var soldBox = $('#sold_' + id);
                        var totalBox = $('#total_' + id);
                        var discountAmountBox = $('#discountAmount_' + id);
                        var netAmountBox = $('#netAmount_' + id);

                        var sold_items = (issued - returned);
                        var total_price = sold_items * price;
                        var discount_amount = ( total_price / 100) * discount;
                        var net_amount = total_price - discount_amount;


                        soldBox.val(sold_items);
                        totalBox.val(total_price);
                        discountAmountBox.val(discount_amount);
                        netAmountBox.val(net_amount);

                        updateNetAmount();

                    }

                    function updateNetAmount()
                    {
                        var netAmountBoxes = $('.netAmountInputs');
                        var lenght = netAmountBoxes.length;
                        var total = 0;
                        for(var i=0; i<lenght; i++) {
                            total += parseInt(netAmountBoxes[i].value);
                        }
                        $('#net_amount').val(total);
                    }

        </script>


</body>

</html>