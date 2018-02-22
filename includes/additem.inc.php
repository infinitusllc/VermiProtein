<?php
	
	session_start();
	if(isset($_POST['submit'])){

		include 'dbh.inc.php';

		$title_g = mysqli_real_escape_string($conn, $_POST['title-g']);
		$intro_g = mysqli_real_escape_string($conn, $_POST['intro-g']);
		$content_g = mysqli_real_escape_string($conn, $_POST['content-g']);
		$content_g = substr($content_g, 0, strlen($content_g) - 4);
		$keywords_g = mysqli_real_escape_string($conn, $_POST['keywords-g']);
		$description_g = mysqli_real_escape_string($conn, $_POST['description-g']);

		$title_r = mysqli_real_escape_string($conn, $_POST['title-r']);
		$intro_r = mysqli_real_escape_string($conn, $_POST['intro-r']);
		$content_r = mysqli_real_escape_string($conn, $_POST['content-r']);
		$content_r = substr($content_r, 0, strlen($content_r) - 4);
		$keywords_r = mysqli_real_escape_string($conn, $_POST['keywords-r']);
		$description_r = mysqli_real_escape_string($conn, $_POST['description-r']);

		$title_e = mysqli_real_escape_string($conn, $_POST['title-e']);
		$intro_e = mysqli_real_escape_string($conn, $_POST['intro-e']);
		$content_e = mysqli_real_escape_string($conn, $_POST['content-e']);
		$content_e = substr($content_e, 0, strlen($content_e) - 4);
		$keywords_e = mysqli_real_escape_string($conn, $_POST['keywords-e']);
		$description_e = mysqli_real_escape_string($conn, $_POST['description-e']);

		$weight = mysqli_real_escape_string($conn, $_POST['weight']);
		$isPublic = mysqli_real_escape_string($conn, $_POST['isPublic']);
		$itemType = mysqli_real_escape_string($conn, $_POST['type']);

		if (!isset($isPublic)){
			$isPublic = 0;
		} else {
			$isPublic = 1;
		}

		//Error handlers
		//check if empty
		if ($conn) {
			$d = date('r');
			$d = str_replace(",", "", $d);

			$null = null;
			$zero = 0;

			$sql = "INSERT INTO ".$itemType." (DisplayWeight, IsPublic, CreatedDate, ModifiedDate, DeletedDate, title_ge, Intro_ge, Content_ge, keywords_ge, Description_ge, title_rus, Intro_rus, Content_rus, keywords_rus, Description_rus, title_eng, Intro_eng, Content_eng, Keywords_eng, Description_eng, IsDeleted) VALUES 
				('$weight','$isPublic','$d','$null','$null','$title_g','$intro_g','$content_g','$keywords_g','$description_g','$title_r','$intro_r','$content_r','$keywords_r','$description_r','$title_e','$intro_e','$content_e','$keywords_e','$description_e','$zero');";
			
			if (mysqli_query($conn, $sql)) {
			    header("Location: ../displayItems.php?item=news");
				exit();
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		header("Location: ../displayItems.php?item=news");
		exit();
	}

?>