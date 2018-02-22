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
		$isPublic = $_POST['isPublic'];
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
			$zero = 0;
			$idstr = "PK_".$itemType."_ID";


			$sql = "UPDATE ".$itemType." SET DisplayWeight = '$weight', IsPublic = '$isPublic', ModifiedDate = '$d', title_ge = '$title_g', Intro_ge = '$intro_g', Content_ge = '$content_g', keywords_ge = '$keywords_g', Description_ge = '$description_g', title_rus = '$title_r', Intro_rus = '$intro_r', Content_rus = '$content_r', keywords_rus = '$keywords_r', Description_rus = '$description_r', title_eng = '$title_e', Intro_eng = '$intro_e', Content_eng = '$content_e', Keywords_eng = '$keywords_e', Description_eng = '$description_e', IsDeleted = $zero WHERE $idstr = $id";
			
			if (mysqli_query($conn, $sql)) {
				header("Location: ../displayItems.php?item=news");
				exit();
			} 
		    header("Location: ../displayItems.php?item=news");
			exit();

		}
	}

?>