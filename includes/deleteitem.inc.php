<?php
	
	session_start();
	if(isset($_POST['submit'])){

		include 'dbh.inc.php';

		$itemType = mysqli_real_escape_string($conn, $_POST['itemType']);
		$id = mysqli_real_escape_string($conn, $_POST['itemId']);

		if (!isset($isPublic)){
			$isPublic = 0;
		} else {
			$isPublic = 1;
		}

		if ($conn) {
			$d = date('r');
			$d = str_replace(",", "", $d);

			$null = null;
			$zero = 1;
			$idstr = "PK_".$itemType."_ID";


			$sql = "UPDATE ".$itemType." SET IsDeleted = $zero WHERE $idstr = $id";
			echo $sql;
			if (mysqli_query($conn, $sql)) {
				header("Location: ../displayItems.php?item=news");
				exit();
			} 
		    header("Location: ../displayItems.php?item=news");
			exit();

		}
	}

?>