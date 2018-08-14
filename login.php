<?php 
	session_start();
	include 'include/condb.php';
	
	if (isset($_POST['login'])) {
		$username= $_POST['username'];
	    $password= $_POST['password'];

		$sql= "SELECT * FROM admin WHERE username='$username' AND password='$password' " ;
		$run_sql=  mysqli_query($con,$sql);
		if (!$run_sql) {
			die("Failed".mysqli_error($con));
		}
		while ($row=mysqli_fetch_array($run_sql)) {

			if($row['admin_role']== 1){

			 $_SESSION['username']= $username;
			 $_SESSION['password']= $password;
			header('Location:admin/dashboard.php');
		    }
		    elseif($row['admin_role']== 2 )
		   {
             $_SESSION['username']= $username;
			 $_SESSION['password']= $password;
			header('Location:user/dashboard.php');

		   }
		  
	}
}
?>

 