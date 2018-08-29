<?php
require_once 'condb.php';
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])==true) {

        $sql= "SELECT * FROM admin WHERE username='$_SESSION[username]' AND password='$_SESSION[password]' " ;
        if ($run_sql=  mysqli_query($con,$sql)) {
            if (mysqli_num_rows($run_sql)== 1) {
                
            }

            else{
                header('Location:index.php');
            }
        }
    } else{
        header('Location:index.php');
    }


?> 