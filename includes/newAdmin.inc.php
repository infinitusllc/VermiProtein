<?php
	
	session_start();
	if(isset($_POST['submit'])){

		include 'dbh.inc.php';

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
		$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

		if (empty($username) || empty($pass1) || empty($pass2)){
			header("Location: ../displayItems.php?item=parameters&message=empty");
			exit();
		}

		if ($pass1 != $pass2) {
			header("Location: ../displayItems.php?item=parameters&message=match");
			exit();
		}

		if (strlen($pass1) < 6) {
			header("Location: ../displayItems.php?item=parameters&message=short");
			exit();
		}

		if ($conn) {

			$sql_admin = "SELECT * FROM admins WHERE username = '$username'";
			$result_admin = mysqli_query($conn, $sql_admin);
			$resultCheck = mysqli_num_rows($result_admin);

			if ($resultCheck > 0) {
				header("Location: ../displayItems.php?item=parameters&message=exists");
				exit();
			} else {
				$password_hash = password_hash($pass1, PASSWORD_DEFAULT);

				$sql = "INSERT INTO admins (username, password) values ('$username', '$password_hash')";
				if (mysqli_query($conn, $sql)) {
			    	header("Location: ../displayItems.php?item=parameters&message=success");
					exit();
				} else {
					header("Location: ../displayItems.php?item=parameters&message=error");
					exit();
					echo $sql;
				}
			}
		}
	}
?>