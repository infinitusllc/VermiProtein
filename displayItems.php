

<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        #itemBar{
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

        input {
            text-align: center;
            background-color: #ECF0F1;
            border: 2px solid transparent;
            border-radius: 3px;
            font-size: 16px;
            font-weight: 200;
            padding: 10px 0;
            width: 250px;
            transition: border .5s;
            margin-bottom:5px;
        }

        .button {
            background-color: #0a662a; /* Green */
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            width: 255px;
            margin: 0 auto;
            border-radius: 3px;
            font-weight: 600;
            margin-bottom:5px;
        }

        .sub{
            font-size: 125%;
            margin-top:20px;
        }
    </style>
</head>

<body>
    <?php
        session_start();

        $logged = $_SESSION['logged'];
        if (!isset($logged) || $logged == false){
            header("Location: adminLogin.php");
            exit();
        }

        include 'includes/dbh.inc.php';
        
        $sql_news = "SELECT * FROM news";
        $sql_members = "SELECT * FROM members";
        $sql_products = "SELECT * FROM products";
        $sql_partners = "SELECT * FROM partners";
        $sql_misc = "SELECT * FROM misc";

        $result_news = mysqli_query($conn, $sql_news);
        $result_members = mysqli_query($conn, $sql_members);
        $result_products = mysqli_query($conn, $sql_products);
        $result_partners = mysqli_query($conn, $sql_partners);
        $result_misc = mysqli_query($conn, $sql_misc);

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
                <a class="navbar-brand">ადმინის<span> პანელი</span></a>
            </div>
        </div>
    </nav>
    <!--/ Navigation bar-->

    <ul style="margin-top: 60px" class="itemBar">
        <li><a href="displayItems.php?item=news" id="news-list"> სიახლეები </a></li>
        <li><a href="displayItems.php?item=products" id="product-list"> პროდუქტები </a></li>
        <li><a href="displayItems.php?item=members" id="member-list"> გუნდის წევრები </a></li>
        <li><a href="displayItems.php?item=partners" id="partner-list"> პარტნიორები </a></li>
        <li><a href="displayItems.php?item=misc" id="misc-list"> კონტაქტი </a>
        <li><a href="displayItems.php?item=parameters"> პარამეტრები </a></li>
        <li><a href="index.php"> საიტზე გადასვლა </a></li>
        </li>
    </ul>

    <?php

        $itemType = "news";
        if (isset($_GET['item'])){
            $itemType = $_GET['item'];
        }

        include 'includes/item.inc.php';

        switch ($itemType) {
            case "news":
                echo "<p class='tb' style='text-align:center; position:relative; top:15px; margin-bottom: 50px;'> სიახლეები  -  <a href='additem.php?itemType=news'> ახლის დამატება </a></p>";
                foreach ($news as $n) {
                    echo " <p style='text-align:center; position:relative; margin-top:20px; font-size:large;'>";
                    echo "<b> სათაური: </b> ".$n['title_ge'] . "</br> <b> აღწერა: </b> ".$n['Description_ge']." </br> <a href='editItem.php?id=".$n['PK_news_ID']."&itemType=news' > შეცვლა </a> ";

                    echo "</p>";
                }
                break;
            
            case "products":
                echo "<p class='tb' style='text-align:center; position:relative; top:15px; margin-bottom: 50px;'> პროდუქტები  -  <a href='additem.php?itemType=products'> ახლის დამატება </a></p>";
                foreach ($products as $n) {
                    echo " <p style='text-align:center; position:relative; margin-top:20px; font-size:large;'>";
                    echo "<b> სათაური: </b> ".$n['title_ge'] . "</br> <b> აღწერა: </b> ".$n['Description_ge']." </br> <a href='editItem.php?id=".$n['PK_products_ID']."&itemType=products' > შეცვლა </a> ";

                    echo "</p>";
                }
                break;

            case "members":
                echo "<p class='tb' style='text-align:center; position:relative; top:15px; margin-bottom: 50px;'> გუნდის წევრები  -  <a href='additem.php?itemType=members'> ახლის დამატება </a></p>";
                foreach ($members as $n) {
                    echo " <p style='text-align:center; position:relative; margin-top:20px; font-size:large;'>";
                    echo "<b> სათაური: </b> ".$n['title_ge'] . "</br> <b> აღწერა: </b> ".$n['Description_ge']." </br> <a href='editItem.php?id=".$n['PK_members_ID']."&itemType=members' > შეცვლა </a> ";

                    echo "</p>";
                }
                break;

            case "partners":
                echo "<p class='tb' style='text-align:center; position:relative; top:15px; margin-bottom: 50px;'> პარტნიორები  -  <a href='additem.php?itemType=partners'> ახლის დამატება </a></p>";
                foreach ($partners as $n) {
                    echo " <p style='text-align:center; position:relative; margin-top:20px; font-size:large;'>";
                    echo "<b> სათაური: </b> ".$n['title_ge'] . "</br> <b> აღწერა: </b> ".$n['Description_ge']." </br> <a href='editItem.php?id=".$n['PK_partners_ID']."&itemType=partners' > შეცვლა </a> ";

                    echo "</p>";
                }
                break;

            case "misc":
                echo "<p class='tb' style='text-align:center; position:relative; top:15px; margin-bottom: 50px;'> საქონტაქტო ინფორმაცია  -  <a href='additem.php?itemType=misc'> ახლის დამატება</a></p>";
                foreach ($misc as $n) {
                    echo " <p style='text-align:center; position:relative; margin-top:20px; font-size:large;'>";
                    echo "<b> სათაური: </b> ".$n['title_ge'] . "</br> <b> აღწერა: </b> ".$n['Description_ge']." </br> <a href='editItem.php?id=".$n['PK_misc_ID']."&itemType=misc' > შეცვლა </a> ";

                    echo "</p>";
                }
                break;
            case "parameters":
                ?>
                    <form id="newAdmin" action="includes/newAdmin.inc.php" method="post" style="margin: 0 auto; width: 250px">
                            <h3 style="text-align: center;"> ახალი მოდერატორის შექმნა </h3>
                            <input type="text" name="username" placeholder="იუზერნეიმი"> </br>
                            <input type="password" name="pass1" placeholder="პასვორდი"> </br>
                            <input type="password" name="pass2" placeholder="პასვორდი განმეორებით"> </br>

                            <?php
                                if (isset($_GET['message'])) {
                                    $message = $_GET['message'];
                                    switch ($message) {
                                        case 'success':
                                            ?>
                                            <h8 style="text-align: center;"> ახალი მოდერატორი წარმატებით შეიქმნა </h8>
                                            <?php
                                            break;
                                        case 'error':
                                            ?>
                                            <h8 style="text-align: center;"> მოდერატორის შექმნისას მოხდა შეცდომა </h8>
                                            <?php
                                            break;
                                        case 'empty':
                                            ?>
                                            <h8 style="text-align: center;"> გთხოვთ, არ დატოვოთ ცარიელი ველები </h8>
                                            <?php
                                            break;
                                        case 'match':
                                            ?>
                                            <h8 style="text-align: center;"> მოცემული პასვორდები ერთმანეთს არ ემთხვევა </h8>
                                            <?php
                                            break;
                                        case 'short':
                                            ?>
                                            <h8 style="text-align: center;"> მოცემული პასვორდი ძალიან მოკლეა (მინ - 6) </h8>
                                            <?php
                                            break;
                                        case 'exists':
                                            ?>
                                            <h8 style="text-align: center;"> მოდერატორი ასეთი სახელით უკვე არსებობს </h8>
                                            <?php
                                            break;
                                    }
                                }
                            ?>

                            <input type="submit" class="button sub" name="submit">
                    </form>

                    <hr style="height:1px; border:none; color:#333;background-color:#333; margin:30px;" />

                    <form id="changePass" action="includes/changePass.inc.php" method="post" style="margin: 0 auto; width: 250px">
                            <h3 style="text-align: center;"> პასვორდის შეცვლა </h3>
                            <input type="text" name="oldPass" placeholder="ძველი პასვორდი"> </br>
                            <input type="password" name="pass1" placeholder="ახალი პასვორდი"> </br>
                            <input type="password" name="pass2" placeholder="პასვორდი განმეორებით"> </br>
                            <input type="hidden" name="username" value=<?php echo '"'.$_SESSION['username'].'"'; ?> >

                            <?php
                                if (isset($_GET['passm'])) {
                                    $message = $_GET['passm'];
                                    switch ($message) {
                                        case 'success':
                                            ?>
                                            <h8 style="text-align: center;"> პასვორდი წარმატებით შეიცვალა </h8>
                                            <?php
                                            break;
                                        case 'error':
                                            ?>
                                            <h8 style="text-align: center;"> პასვორდის შეცვლისას მოხდა შეცდომა </h8>
                                            <?php
                                            break;
                                        case 'empty':
                                            ?>
                                            <h8 style="text-align: center;"> გთხოვთ, არ დატოვოთ ცარიელი ველები </h8>
                                            <?php
                                            break;
                                        case 'match':
                                            ?>
                                            <h8 style="text-align: center;"> მოცემული პასვორდები ერთმანეთს არ ემთხვევა </h8>
                                            <?php
                                            break;
                                        case 'short':
                                            ?>
                                            <h8 style="text-align: center;"> მოცემული პასვორდი ძალიან მოკლეა (მინ - 6) </h8>
                                            <?php
                                            break;
                                        case 'wrong':
                                            ?>
                                            <h8 style="text-align: center;"> თქვენს მიერ შეყვანილი ძველი პასვორდი არასწორია </h8>
                                            <?php
                                            break;
                                    }
                                }
                            ?>

                            <input type="submit" class="button sub" name="submit">
                    </form>

                    <hr style="height:1px; border:none; color:#333;background-color:#333; margin:30px;" />

                <?php
                break;
        }

    ?>
    

</body>
</html>