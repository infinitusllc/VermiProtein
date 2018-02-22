<?php
	
	session_start();

	if(isset($_POST['submit'])){

		include 'dbh.inc.php';
      
		$uname = mysqli_real_escape_string($conn, $_POST['username']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);

		//Error handlers
		//check if empty
		if (!(empty($uname) || empty($pass))){
			$sql = "SELECT * FROM admins WHERE username='$uname'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck < 1){
				header("Location: ../adminLogin.php?message=error3");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)){
					//dehashing the password
					$hashedPassCheck = password_verify($pass, $row['password']);
					if($hashedPassCheck == false){
                      	echo "bla";
						exit();
					} else if ($hashedPassCheck == true) {
						//Log in the admin here
						$_SESSION['logged'] = true;
						$_SESSION['username'] = $uname;
						header("Location: ../displayItems.php?item=news");
						exit();
					}
				}
			}
		}
	} else {
			header("Location: ../adminLogin.php?message=error1");
			exit();
	}

?>