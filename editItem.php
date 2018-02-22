<html>

<head>
    <title>Edit Item</title>
    <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .tabcontent1 {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tabcontent2 {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tabcontent3 {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tabcontent4 {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tabcontent5 {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<script type="text/javascript">
    <!--
    function openNews(evt, newsName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent1");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks1");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(newsName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    function displayNews() {
        openNews(event, 'news-geo');
    }

    //-->
</script>

<body onload="displayNews()">

<?php
    include 'includes/dbh.inc.php';

    session_start();
    

    $logged = $_SESSION['logged'];
    if (!isset($logged) || $logged == false){
        header("Location: adminLogin.php");
        exit();
    }

    $itemType = null;
    $id = null;
    if (isset($_GET['itemType']) && isset($_GET['id'])){
        $itemType = $_GET['itemType'];
        $id = $_GET['id'];
    } else {
        header("Location: displayItems.php");
        exit();
    }

    $idstr = "PK_".$itemType."_ID";

    $sql = "SELECT * FROM $itemType WHERE $idstr = $id ";
    $res = mysqli_query($conn, $sql);
    $item = mysqli_fetch_assoc($res);


?>

<!--Navigation bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="displayItems.php">ადმინის<span> პანელი</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="displayItems.php"> უკან </a></li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Navigation bar-->

<!-- NEWS -->
<div id="news-div" style="margin: 30px; margin-top: 60px;">
    <form id="news-form" action="includes/edititem.inc.php" method="post" accept-charset="UTF-8">

        <ul>
            <li><a class="tablinks1" onclick="openNews(event, 'news-geo')"> Geo </a></li>
            <li><a class="tablinks1" onclick="openNews(event, 'news-rus')"> Rus </a></li>
            <li><a class="tablinks1" onclick="openNews(event, 'news-eng')"> Eng </a></li>
        </ul>
        <input type="hidden" name="htmlFormName" value=<?php echo '"'.$itemType.'-form"';?>/>
        <input type="hidden" name="itemType" value=<?php echo '"'.$itemType.'"';?>/>
        <input type="hidden" name="itemId" value=<?php echo '"'.$id.'"';?>/>
        <div id="news-geo" class="tabcontent1">
            <input name="title-g" class = "textInput" placeholder="ქართული სათაური" value=<?php echo '"'.$item['title_ge'].'"';?> id = "nTitleG" /> </br>
            <input name="intro-g" class = "textInput" placeholder="ქართული ინტრო" value=<?php echo '"'.$item['Intro_ge'].'"';?> id = "nIntroG" /> </br>
            <textarea name="content-g" form="news-form" class = "textInput htmlClass" id = "nContentG" placeholder="ქართული კონტენტი">  <?php echo $item['Content_ge'];?> </textarea> </br>
            <input name="keywords-g" class = "textInput" placeholder="ქართული ქივორდები" id = "nKeywordsG" value=<?php echo '"'.$item['keywords_ge'].'"';?>/> </br>
            <input name="description-g" class = "textInput" placeholder="ქართული აღწერა" id = "nDescriptionG" value=<?php echo '"'.$item['Description_ge'].'"';?>/> </br>
            <script>
                CKEDITOR.replace( 'content-g' );
            </script>
        </div>
        <div id="news-rus" class="tabcontent1">
            <input name="title-r" class = "textInput" placeholder="Русское Название" id = "nTitleR" value=<?php echo '"'.$item['title_rus'].'"';?>/> </br>
            <input name="intro-r" class = "textInput" placeholder="Русское Введение" id = "nIntroR" value=<?php echo '"'.$item['Intro_rus'].'"';?>/> </br>
            <textarea name="content-r" form="news-form" class = "textInput htmlClass" id = "nContentR"> <?php echo $item['Content_rus'];?> </textarea></br>
            <input name="keywords-r" class = "textInput" placeholder="Русские Ключевые Слова" id = "nKeywordsR" value=<?php echo '"'.$item['keywords_rus'].'"';?>/> </br>
            <input name="description-r" class = "textInput" placeholder="Русское Описание" id = "nDescriptionR" value=<?php echo '"'.$item['Description_rus'].'"';?>/> </br>
            <script>
                CKEDITOR.replace( 'content-r' );
            </script>
        </div>
        <div id="news-eng" class="tabcontent1">
            <input name="title-e" class = "textInput" placeholder="English Title" id = "nTitleE" value=<?php echo '"'.$item['title_eng'].'"';?>/> </br>
            <input name="intro-e" class = "textInput" placeholder="English Intro" id = "nIntroE" value=<?php echo '"'.$item['Intro_eng'].'"';?>/> </br>
            <textarea name="content-e" form="news-form" class = "textInput htmlClass" id = "nContentE" > <?php echo $item['Content_eng']; ?> </textarea></br>
            <input name="keywords-e" class = "textInput" placeholder="English Keywords" id = "nKeywordsE" value=<?php echo '"'.$item['keywords_eng'].'"';?>/> </br>
            <input name="description-e" class = "textInput" placeholder="English Description" id = "nDescriptionE" value=<?php echo '"'.$item['Description_eng'].'"';?>/> </br>
            <script>
                CKEDITOR.replace( 'content-e' );
            </script>
        </div>

        <p>Created at: <?php echo '"'.$item['CreatedDate'].'"';?> </p>

        Input an integer: </br>
        <input name="weight" placeholder="News weight" id = "Weight"  value=<?php echo '"'.$item['DisplayWeight'].'"';?>/> </br>
		
		<?php if ($item['IsPublic'] == 1) { ?>
        	<input type="checkbox" name="isPublic" checked> საჯარო </br>
		<?php } else {	?>
			<input type="checkbox" name="isPublic"> საჯარო </br>
		<?php }	?>
        <button type="submit" name="submit" onclick="document.getElementById('news-form').submit();"> Submit </button>
    </form>
    <form id="news-delete" action="includes/deleteitem.inc.php" method="post" accept-charset="UTF-8">
        <input type="hidden" name="htmlFormName" value=<?php echo '"'.$itemType.'-form"';?>/>
        <input type="hidden" name="itemType" value=<?php echo '"'.$itemType.'"';?>/>
        <input type="hidden" name="itemId" value=<?php echo '"'.$id.'"';?>/>
        <button type="submit" name="submit" onclick="document.getElementById('news-delete').submit();"> Delete </button>
    </form>

</div>
<!--/ NEWS -->

</body>

</html>
