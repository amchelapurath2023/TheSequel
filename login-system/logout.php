<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	$uname = $_POST['uname'];
	$pass = $_POST['password'];

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
        if ($row) {
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
            header("Location: home.php");
		    	exit();
        }else{
			header("Location: index.php?error=Incorect User name or password");
		    exit();
			}
		}
	
	
}else{
	header("Location: index.php");
	exit();
}
