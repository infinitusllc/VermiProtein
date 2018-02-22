<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mentor Education Bootstrap Theme</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<?php
    $lang = "ge";
    if (isset($_GET['lang'])){
        $lang = $_GET['lang'];
    }

    $itemType = "news";
    if (isset($_GET['itemType'])){
        $itemType = $_GET['itemType'];
    }

    //misc
    //$misc1 = misc.get(0).getContent_ge();
    $misc1 = "bla";

    //other Strings
    $goBack = "უკან";

    $navBar_news= "სიახლეები";
    $navBar_contact = "კონტაქტი";

    $news_header= "სიახლეები";
    $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";

    $contact_header = "დაგვეკონტაქტეთ";
    $contact_subheader = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";

    if($lang == "rus"){
        $navBar_news= "სიახლეები (რუს)";
        $navBar_contact = "კონტაქტი (რუს)";

        $news_header= "სიახლეები (რუს)";
        $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";

        $contact_header = "Contact Us";
        $contact_subheader = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";

        $goBack = "უკან (რუს)";

    } else if($lang == "eng"){
        $navBar_news= "News";
        $navBar_contact = "Contact";

        $news_header= "News";
        $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";

        $contact_header = "Contact Us";
        $contact_subheader = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";

        $goBack = "back";
    }

    include 'includes/publicitems.inc.php';

    $items = $news;

    if ($itemType == "products"){
        $items = $products;

        $navBar_news= "პროდუქტები";
        $news_header= "პროდუქტები";
        $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        if ($lang == "rus") {
            $navBar_news= "პროდუქტები (რუს)";
            $news_header= "პროდუქტები (რუს)";
            $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        } else if ($lang == "eng") {
            $navBar_news= "Products";
            $news_header= "Products";
            $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        }
    } else if ($itemType == "partners"){
        $items = $partners;

        $navBar_news= "პარტნიორები";
        $news_header= "პარტნიორები";
        $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        if ($lang == "rus") {
            $navBar_news= "პარტნიორები (რუს)";
            $news_header= "პარტნიორები (რუს)";
            $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        } else if ($lang == "eng") {
            $navBar_news= "Partners";
            $news_header= "Partners";
            $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        }
    } else if ($itemType == "members"){
        $items = $members;

        $navBar_news= "გუნდის წევრები";
        $news_header= "გუნდის წევრები";
        $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        if ($lang == "rus") {
            $navBar_news= "გუნდის წევრები (რუს)";
            $news_header= "გუნდის წევრები (რუს)";
            $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        } else if ($lang == "eng") {
            $navBar_news= "Team Members";
            $news_header= "Team Members";
            $news_subheader= "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.";
        }
    }
	
    include 'includes/publicitems.inc.php';

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
            <a class="navbar-brand" href="index.php?lang=<?php echo $lang; ?>">VER<span>MI</span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                    $homePage = "index.php?lang=".$lang;

                    $langSwitch = "<li><a href='?lang=rus&itemType=".$itemType."'>RUS</a></li>\n"."<li><a href='?lang=eng&itemType=".$itemType."'>ENG</a></li>";
                    if ($lang == "rus"){
                        $langSwitch = "<li><a href='?lang=ge&itemType=".$itemType."'>GEO</a></li>\n"."<li><a href='?lang=eng&itemType=".$itemType."'>ENG</a></li>";
                    } else if ($lang == "eng"){
                        $langSwitch = "<li><a href='?lang=ge&itemType=".$itemType."'>GEO</a></li>\n"."<li><a href='?lang=rus&itemType=".$itemType."'>RUS</a></li>";
                    }

                    echo $langSwitch;
                ?>

                <li><a href= <?php echo $homePage; ?> > <?php echo $goBack; ?> </a></li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Navigation bar-->

<!--News-->
<section id ="news" class="section-padding">
    <div class="container">

        <div class="header-section text-center">
            <h2> <?php echo $news_header; ?> </h2>
            <p> <?php echo $news_subheader; ?> </p>
            <hr class="bottom-line">
        </div>

        <?php

            for ($i=0; $i < count($items); ) {

                echo "<div class='row'>";

                for($j=$i; $j<$i+3;$j++){
                    if ($j >= count($items))
                        break;

                    $title = $items[$j]['title_ge'];
                    $intro = $items[$j]['Intro_ge'];
                    $content = $items[$j]['Content_ge'];
                    $description = $items[$j]['Description_ge'];
                    if ($lang ==  "rus") {
                        $title = $items[$j]['title_rus'];
                        $intro = $items[$j]['Intro_rus'];
                        $content = $items[$j]['Content_rus'];
                        $description = $items[$j]['Description_rus'];
                    } else if ($lang ==  "eng") {
                        $title = $items[$j]['title_eng'];
                        $intro = $items[$j]['Intro_eng'];
                        $content = $items[$j]['Content_eng'];
                        $description = $items[$j]['Description_eng'];
                    }
                echo "<div class='col-lg-4 col-md-4 col-sm-4'>
                    <div class='pm-staff-profile-container' >
                        <div class='pm-staff-profile-details text-center'>
                            <p class='pm-staff-profile-name'> ".$title." </p>
                            <p class='pm-staff-profile-title'> ".$intro." </p>
                            <p class='pm-staff-profile-bio'> ".$content." </p>
                            <p class='pm-staff-profile-title'> ".$description." </p>
                        </div>
                    </div>
                </div> ";
                }

                echo "</div>";
                $i+=3;
            }
        ?>

    </div>
</section>
<!--/ News-->

<!--Footer-->
<footer id="footer" class="footer">
    <div class="container text-center">

        <h3>Start Your Free Trial Now!</h3>

        <ul class="social-links">
            <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
        </ul>
        ©2016 Mentor Theme. All rights reserved
        <div class="credits">
            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
            -->
            Designed by <a href="https://bootstrapmade.com/">Free Bootstrap Themes</a>
        </div>
    </div>
</footer>
<!--/ Footer-->

<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>
