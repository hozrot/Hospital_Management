<?php
include 'include/condb.php';
$medicine_name = $_GET['medicine_name'];
$sql= "SELECT medicine_price FROM medicine WHERE medicine_name = '" . $medicine_name ."'";

$run_sql=  mysqli_query($con,$sql);

$rows= mysqli_fetch_array($run_sql);

echo $rows['medicine_price'];

