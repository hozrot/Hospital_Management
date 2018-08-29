<?php

// Prevent caching.
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

// The JSON standard MIME header.
header('Content-type: application/json');

// database connection
require_once '../../include/condb.php';

// This ID parameter is sent by our javascript client.
$id = $_GET['id'];

// Here's some data that we want to send via JSON.
// We'll include the $id parameter so that we
// can show that it has been passed in correctly.
// You can send whatever data you like.

$sql="SELECT * FROM doctor WHERE doctor_id = " . $id ;
$run_sql=  mysqli_query($con,$sql);
$data= mysqli_fetch_array($run_sql);
echo json_encode($data);

?>
