<?php
	
	session_start();
	if(isset($_POST['submit'])){

		include 'dbh.inc.php';

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
		$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);
		$oldPass = mysqli_real_escape_string($conn, $_POST['oldPass']);

		if (empty($oldPass) || empty($pass1) || empty($pass2)){
			header("Location: ../displayItems.php?item=parameters&passm=empty");
			exit();
		}

		if ($pass1 != $pass2) {
			header("Location: ../displayItems.php?item=parameters&passm=match");
			exit();
		}

		if (strlen($pass1) < 6) {
			header("Location: ../displayItems.php?item=parameters&passm=short");
			exit();
		}

		if ($conn) {

			$sql = "SELECT * FROM admins WHERE username='$username'";
			$result = mysqli_query($conn, $sql);

			if ($row = mysqli_fetch_assoc($result)){
					//dehashing the password
				$hashedPassCheck = password_verify($oldPass, $row['password']);
				if($hashedPassCheck == false){
                  	header("Location: ../displayItems.php?item=parameters&passm=wrong");
					exit();
				}
			}

			$password_hash = password_hash($pass1, PASSWORD_DEFAULT);

			$sql_admin = "UPDATE admins SET password = '$password_hash' WHERE username = '$username'";
			$result_admin = mysqli_query($conn, $sql_admin);

			if (mysqli_query($conn, $sql)) {
		    	header("Location: ../displayItems.php?item=parameters&passm=success");
				exit();
			} else {
				header("Location: ../displayItems.php?item=parameters&passm=error");
				exit();
			}
		}

	}