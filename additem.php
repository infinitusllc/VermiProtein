<html>

<head>
    <title>Add Item</title>
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
</script>

<body onload="displayNews()">

<?php
    session_start();
    

    $logged = $_SESSION['logged'];
    if (!isset($logged) || $logged == false){
        header("Location: adminLogin.php");
        exit();
    }
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
            <a class="navbar-brand" href="displayItems.php?item=news">ადმინის<span> პანელი</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="displayItems.php?item=news"> უკან </a></li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Navigation bar-->

<div id="news-div" style="margin: 30px; margin-top: 60px;">
    <form id="news-form" action="includes/additem.inc.php" method="post" accept-charset="UTF-8">

        <ul>
            <li><a class="tablinks1" onclick="openNews(event, 'news-geo')"> Geo </a></li>
            <li><a class="tablinks1" onclick="openNews(event, 'news-rus')"> Rus </a></li>
            <li><a class="tablinks1" onclick="openNews(event, 'news-eng')"> Eng </a></li>
        </ul>

        <div id="news-geo" class="tabcontent1">
            <input name="title-g" class = "textInput" placeholder="ქართული სათაური" id = "nTitleG" /> </br>
            <input name="intro-g" class = "textInput" placeholder="ქართული ინტრო" id = "nIntroG" /> </br>
            <textarea name="content-g" form="news-form" class = "textInput htmlClass" id = "nContentG" placeholder="ქართული კონტენტი">  </textarea> </br>
            <input name="keywords-g" class = "textInput" placeholder="ქართული ქივორდები" id = "nKeywordsG" /> </br>
            <input name="description-g" class = "textInput" placeholder="ქართული აღწერა" id = "nDescriptionG"/> </br>
            <script>
                CKEDITOR.replace( 'content-g' );
            </script>
        </div>
        <div id="news-rus" class="tabcontent1">
            <input name="title-r" class = "textInput" placeholder="Русское Название" id = "nTitleR" /> </br>
            <input name="intro-r" class = "textInput" placeholder="Русское Введение" id = "nIntroR" /> </br>
            <textarea name="content-r" form="news-form" class = "textInput htmlClass" id = "nContentR">  </textarea></br>
            <input name="keywords-r" class = "textInput" placeholder="Русские Ключевые Слова" id = "nKeywordsR"/> </br>
            <input name="description-r" class = "textInput" placeholder="Русское Описание" id = "nDescriptionR" /> </br>
            <script>
                CKEDITOR.replace( 'content-r' );
            </script>
        </div>
        <div id="news-eng" class="tabcontent1">
            <input name="title-e" class = "textInput" placeholder="English Title" id = "nTitleE"/> </br>
            <input name="intro-e" class = "textInput" placeholder="English Intro" id = "nIntroE"/> </br>
            <textarea name="content-e" form="news-form" class = "textInput htmlClass" id = "nContentE" > </textarea></br>
            <input name="keywords-e" class = "textInput" placeholder="English Keywords" id = "nKeywordsE" /> </br>
            <input name="description-e" class = "textInput" placeholder="English Description" id = "nDescriptionE" /> </br>
            <script>
                CKEDITOR.replace( 'content-e' );
            </script>
        </div>

        Input an integer: </br>
        <input name="weight" placeholder="News weight" id = "Weight" value="1"/> </br>

        <input name="isPublic" type="checkbox" value="IsPublic" checked> საჯარო </br>
        <input name="type" type="hidden" value=<?php echo $_GET['itemType'] ?>>
        <button onclick="document.getElementById('news-form').submit();" type="submit" class="button sub" name="submit""> Submit </button>
    </form>

</div>

</body>

</html>
