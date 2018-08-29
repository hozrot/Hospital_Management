<?php 
	session_start();
	include '../admin/include/condb.php';
	
	if (isset($_POST['login'])) {
		$username= $_POST['username'];
	    $password= $_POST['password'];

		$sql= "SELECT * FROM user WHERE username='$username' AND password='$password' " ;
		$run_sql=  mysqli_query($con,$sql);
		if (!$run_sql) {
			die("Failed".mysqli_error($con));
		}
		while ($row=mysqli_fetch_array($run_sql)) {

			 $_SESSION['username']= $username;
			 $_SESSION['password']= $password;
			header('Location:../admin/dashboard.php');
		
	}
}

 


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login Error</title>
 </head>
 <body>
 		<div>
 			<h1> Username or Password is not Mathched </h1>
 		</div>
 </body>
 </html>